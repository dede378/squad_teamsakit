<?php
// INTENTIONAL VULNERABILITY: missing CSRF protection. Lab-only.
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /labs/auth/login.php');
    exit;
}

$db = new mysqli(
    getenv('DB_HOST') ?: 'db',
    getenv('DB_USER') ?: 'squad_lab',
    getenv('DB_PASSWORD') ?: 'change-this-db-password',
    getenv('DB_NAME') ?: 'squad_lab'
);
if ($db->connect_errno) { http_response_code(500); exit('Database unavailable'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $stmt = $db->prepare('UPDATE lab_users SET email=? WHERE id=?');
    $stmt->bind_param('si', $email, $_SESSION['user_id']);
    $stmt->execute();
    header('Location: /labs/csrf/email.php?updated=1');
    exit;
}
$stmt = $db->prepare('SELECT email FROM lab_users WHERE id=?');
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>CSRF Lab</title></head>
<body>
<h1>CSRF Lab</h1>
<p>This state-changing form intentionally has no CSRF token.</p>
<?php if (isset($_GET['updated'])): ?><p>Email updated.</p><?php endif; ?>
<form method="post">
<label>Email <input name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>"></label>
<button type="submit">Change email</button>
</form>
<p>Logged in as <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?></p>
</body>
</html>
