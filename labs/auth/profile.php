<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /labs/auth/login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>Lab Profile</title></head>
<body>
<h1>Lab Profile</h1>
<p>Logged in as <strong><?= htmlspecialchars($_SESSION['display_name'], ENT_QUOTES, 'UTF-8') ?></strong>.</p>
<p>Username: <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?></p>
<a href="/labs/idor/profile.php?id=1">Open IDOR lab</a>
</body>
</html>
