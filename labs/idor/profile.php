<?php
// INTENTIONAL VULNERABILITY: IDOR / broken object-level authorization. Lab-only.
// The authenticated user can request another user's profile by changing id.
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

$id = (int)($_GET['id'] ?? $_SESSION['user_id']);
$stmt = $db->prepare('SELECT id, username, display_name, email FROM lab_users WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) { http_response_code(404); exit('User not found'); }
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>IDOR Lab</title></head>
<body>
<h1>IDOR / Broken Access Control Lab</h1>
<p>This page intentionally fails to verify that the requested object belongs to the logged-in user.</p>
<dl>
<dt>ID</dt><dd><?= (int)$user['id'] ?></dd>
<dt>Username</dt><dd><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></dd>
<dt>Name</dt><dd><?= htmlspecialchars($user['display_name'], ENT_QUOTES, 'UTF-8') ?></dd>
<dt>Email</dt><dd><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></dd>
</dl>
<p>Logged-in user ID: <?= (int)$_SESSION['user_id'] ?></p>
</body>
</html>
