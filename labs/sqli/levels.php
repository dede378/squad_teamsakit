<?php
// INTENTIONAL SQL INJECTION TRAINING LAB.
// Read-only SELECT queries only. Keep this endpoint behind Basic Auth.
// Do not copy these unsafe query patterns into production.
mysqli_report(MYSQLI_REPORT_OFF);

$db = new mysqli(
    getenv('DB_HOST') ?: 'db',
    getenv('DB_USER') ?: 'squad_lab',
    getenv('DB_PASSWORD') ?: 'change-this-db-password',
    getenv('DB_NAME') ?: 'squad_lab'
);

if ($db->connect_errno) {
    http_response_code(503);
    exit('Lab database unavailable. Configure DB_HOST, DB_USER, DB_PASSWORD and DB_NAME.');
}
$db->set_charset('utf8mb4');

$level = (int)($_GET['level'] ?? 1);
$rows = [];
$error = '';
$sql = '';

switch ($level) {
    case 1:
        // EASY: numeric parameter concatenation.
        $id = $_GET['id'] ?? '1';
        $sql = "SELECT id, name, price FROM products WHERE id = $id";
        break;
    case 2:
        // MEDIUM: string parameter concatenation.
        $q = $_GET['q'] ?? '';
        $sql = "SELECT id, name, price FROM products WHERE name LIKE '%$q%'";
        break;
    case 3:
        // MEDIUM-HARD: boolean-based inference; response only reveals whether a row exists.
        $id = $_GET['id'] ?? '1';
        $sql = "SELECT id FROM products WHERE id = $id";
        $result = $db->query($sql);
        if ($result === false) {
            http_response_code(400);
            $error = 'Query rejected by database.';
        } else {
            $exists = $result->num_rows > 0;
            ?><!doctype html><html lang="en"><head><meta charset="utf-8"><title>SQLi Level 3</title></head><body>
            <h1>Level 3 — Boolean inference</h1><p>Result: <strong><?= $exists ? 'Product found' : 'No product found' ?></strong></p>
            <p>Only a yes/no result is shown.</p><p><a href="?level=1&id=1">Level 1</a> | <a href="?level=2&q=phone">Level 2</a> | <a href="?level=3&id=1">Level 3</a> | <a href="?level=4&id=1">Level 4</a></p>
            </body></html><?php
            exit;
        }
        break;
    case 4:
        // HARD: UNION-oriented practice against this lab's products table only.
        $id = $_GET['id'] ?? '1';
        $sql = "SELECT id, name, price FROM products WHERE id = $id";
        break;
    default:
        http_response_code(400);
        exit('Unknown level. Choose level=1, 2, 3, or 4.');
}

$result = $db->query($sql);
if ($result === false) {
    http_response_code(400);
    $error = 'Query error: ' . $db->error;
} else {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>SQL Injection Levels</title></head>
<body>
<h1>SQL Injection Training — Level <?= htmlspecialchars((string)$level, ENT_QUOTES, 'UTF-8') ?></h1>
<ul>
<li>Level 1 — Easy: numeric parameter (<code>id</code>)</li>
<li>Level 2 — Medium: string search (<code>q</code>)</li>
<li>Level 3 — Medium-hard: boolean inference (<code>id</code>)</li>
<li>Level 4 — Hard: UNION query practice (<code>id</code>)</li>
</ul>
<?php if ($error !== ''): ?><p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
<?php if ($rows): ?>
<table border="1" cellpadding="6"><tr><th>ID</th><th>Name</th><th>Price</th></tr>
<?php foreach ($rows as $row): ?><tr>
<td><?= htmlspecialchars((string)($row['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
<td><?= htmlspecialchars((string)($row['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
<td><?= htmlspecialchars((string)($row['price'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
</tr><?php endforeach; ?></table>
<?php else: ?><p>No matching products.</p><?php endif; ?>
<p><a href="?level=1&id=1">Level 1</a> | <a href="?level=2&q=phone">Level 2</a> | <a href="?level=3&id=1">Level 3</a> | <a href="?level=4&id=1">Level 4</a></p>
</body></html>
