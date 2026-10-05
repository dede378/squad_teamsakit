<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: /labs/auth/login.php');
exit;
