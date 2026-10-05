<?php
// INTENTIONAL LAB: simple authentication with deliberately weak plaintext demo credentials.
// These credentials are synthetic and must never be reused elsewhere.
session_start();

$db = new mysqli(
    getenv('DB_HOST') ?: 'db',
    getenv('DB_USER') ?: 'squad_lab',
    getenv('DB_PASSWORD') ?: 'change-this-db-password',
    getenv('DB_NAME') ?: 'squad_lab'
);
if ($db->connect_errno) { http_response_code(500); exit('Database unavailable'); }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // INTENTIONAL WEAKNESS: direct credential comparison and no rate limiting.
    $stmt = $db->prepare('SELECT id, username, display_name FROM lab_users WHERE username=? AND password=?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user) {
        $_SESSION['user_id'] = (int)$user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['display_name'] = $user['display_name'];
        header('Location: /labs/auth/profile.php');
        exit;
    }
    $error = 'Invalid credentials';
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>Authentication Lab</title></head>
<body>
<h1>Authentication Lab</h1>
<p>Demo accounts are synthetic and intended only for this lab.</p>
<?php if ($error): ?><p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
<form method="post">
<label>Username <input name="username" autocomplete="off"></label><br><br>
<label>Password <input type="password" name="password"></label><br><br>
<button type="submit">Login</button>
</form>
<p>Try the documented demo accounts: <code>alice</code> / <code>alice-lab-pass</code>.</p>
</body>
</html>
