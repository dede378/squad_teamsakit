<?php
// INTENTIONAL VULNERABILITY: stored XSS. Lab-only.
// The message is stored and rendered without HTML encoding.
$db = new mysqli(
    getenv('DB_HOST') ?: 'db',
    getenv('DB_USER') ?: 'squad_lab',
    getenv('DB_PASSWORD') ?: 'change-this-db-password',
    getenv('DB_NAME') ?: 'squad_lab'
);
if ($db->connect_errno) { http_response_code(500); exit('Database unavailable'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = $_POST['author'] ?? 'guest';
    $message = $_POST['message'] ?? '';
    $stmt = $db->prepare('INSERT INTO comments (author, message) VALUES (?, ?)');
    $stmt->bind_param('ss', $author, $message);
    $stmt->execute();
    header('Location: /labs/xss/stored.php');
    exit;
}
$comments = $db->query('SELECT id, author, message, created_at FROM comments ORDER BY id DESC LIMIT 50');
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>Stored XSS Lab</title></head>
<body>
<h1>Stored XSS Lab</h1>
<p>This lab intentionally stores user input and renders it without output encoding.</p>
<form method="post">
<label>Author <input name="author" maxlength="80"></label><br><br>
<label>Message <textarea name="message"></textarea></label><br><br>
<button type="submit">Post</button>
</form>
<hr>
<?php while ($row = $comments->fetch_assoc()): ?>
<article>
<strong><?= htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8') ?></strong>
<div><?= $row['message'] ?></div>
<small><?= htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8') ?></small>
</article>
<hr>
<?php endwhile; ?>
</body>
</html>
