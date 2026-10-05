<?php
// INTENTIONAL VULNERABILITY: open redirect. Lab-only.
$url = $_GET['url'] ?? '/';
header('Location: ' . $url);
exit;
