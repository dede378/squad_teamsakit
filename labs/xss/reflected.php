<?php
// INTENTIONAL VULNERABILITY: reflected XSS. Lab-only.
$q = $_GET['q'] ?? '';
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>Reflected XSS Lab</title></head>
<body>
<h1>Reflected XSS Lab</h1>
<p>This page intentionally reflects q without HTML encoding.</p>
<p>Query: <?= $q ?></p>
<p>Try: <code>?q=test</code></p>
</body>
</html>
