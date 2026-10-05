<?php
// INTENTIONAL VULNERABILITY: SQL injection. Lab-only.
// Do not reuse this pattern in production code.
$id = $_GET['id'] ?? '1';

$db = new mysqli(
    getenv('DB_HOST') ?: 'db',
    getenv('DB_USER') ?: 'squad_lab',
    getenv('DB_PASSWORD') ?: 'change-this-db-password',
    getenv('DB_NAME') ?: 'squad_lab'
);

if ($db->connect_errno) {
    http_response_code(500);
    exit('Database unavailable');
}

$result = $db->query("SELECT id, name, price FROM products WHERE id=$id");

if ($result === false) {
    http_response_code(400);
    exit('Query error');
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>SQL Injection Lab</title></head>
<body>
<h1>SQL Injection Lab</h1>
<p>This endpoint intentionally concatenates <code>id</code> into SQL.</p>
<p>Normal request: <code>?id=1</code></p>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Name</th><th>Price</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?></td>
<td><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></td>
<td><?= htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') ?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
