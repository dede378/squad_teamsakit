<?php
/*
 * SQUAD // CYBER LAB
 * CVE-STYLE PATH TRAVERSAL TRAINING LAB
 *
 * Intentionally vulnerable for authorized training.
 * This simulates the path-traversal vulnerability class without
 * downgrading or weakening the production Apache service.
 */
$base = realpath(__DIR__ . '/files');
$file = $_GET['file'] ?? 'welcome.txt';

$target = $base . '/' . $file;
$content = @file_get_contents($target);

if ($content === false) {
    http_response_code(404);
    $error = 'File not found';
} else {
    $error = null;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>CVE-STYLE // Path Traversal Lab</title>
<style>
body{margin:0;background:#030608;color:#dffdf2;font:14px ui-monospace,SFMono-Regular,Consolas,monospace}
.wrap{max-width:900px;margin:40px auto;padding:20px}.box{border:1px solid #164e3d;background:#071014;padding:24px}
h1{color:#00ff88}code{color:#00d9ff}input{width:70%;padding:12px;background:#020506;border:1px solid #285f50;color:#dffdf2}
button{padding:12px;background:#00ff88;border:0;font-weight:800}pre{white-space:pre-wrap;background:#020506;border:1px solid #164e3d;padding:18px;color:#a9c9bf}
.note{color:#78918b;line-height:1.7}.bad{color:#ff4568}a{color:#00d9ff}
</style>
</head>
<body>
<div class="wrap"><div class="box">
<p>// SQUAD CYBER LAB :: CVE-STYLE TRAINING</p>
<h1>PATH TRAVERSAL</h1>
<p class="note">This lab intentionally concatenates user-controlled <code>file</code> input with a server-side path. It is a safe simulation of the path-traversal vulnerability class. It does not make the Apache service itself vulnerable.</p>
<form method="get">
<input name="file" value="<?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?>">
<button>READ FILE</button>
</form>
<?php if ($error): ?>
<p class="bad">[!] <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php else: ?>
<h3>Server response</h3>
<pre><?= htmlspecialchars($content, ENT_QUOTES, 'UTF-8') ?></pre>
<?php endif; ?>
<p class="note">Training objective: identify the unsafe file path construction, demonstrate traversal using only this lab's own files, then explain how canonical-path validation or an allowlist would mitigate it.</p>
<p><a href="/">← Back to SQUAD // CYBER LAB</a></p>
</div></div>
</body>
</html>
