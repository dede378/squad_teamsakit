<?php
// INTENTIONAL VULNERABILITY: missing role/authorization check. Lab-only.
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /labs/auth/login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>Access Control Lab</title></head>
<body>
<h1>Access Control Challenge</h1>
<p>This page intentionally checks authentication but not authorization.</p>
<p>Any authenticated lab user can reach this administrative training page.</p>
<p>Expected lesson: authentication proves identity; authorization decides what that identity may access.</p>
</body>
</html>
