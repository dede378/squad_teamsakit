<?php
/*
 * SQUAD // CYBER LAB :: EXIM SECURITY LAB
 *
 * Intentionally vulnerable SMTP/Exim-style command-injection simulator.
 * The exploit is real against this lab's application logic, but it never
 * invokes an operating-system shell and cannot execute commands on Render.
 */
session_start();

$flag = 'SQUAD{EXIM_LAB_COMMAND_INJECTION_2026}';
$recipient = $_POST['recipient'] ?? '';
$stage = $_POST['stage'] ?? 'connect';
$result = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($stage === 'rcpt') {
        // Deliberately vulnerable parser: an attacker-controlled address is
        // interpreted as if it were an Exim transport argument.
        if (preg_match('/(?:;|&&|\|)\s*(?:cat|type)\s+(?:\/|[A-Za-z]:\\)?(?:flag|tmp\/flag|etc\/squad_flag)/i', $recipient)) {
            $result = "250 OK\n[simulated exim transport] command injection accepted\nFLAG: {$flag}";
            $success = true;
        } elseif (preg_match('/(?:;|&&|\|)\s*(?:id|whoami|uname)/i', $recipient)) {
            $result = "250 OK\n[simulated exim transport]\nuid=1000(exim) gid=1000(exim)";
        } else {
            $result = "250 OK\n[simulated exim transport] recipient accepted";
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>EXIM // SMTP Security Lab</title>
<style>
:root{--bg:#030608;--panel:#071014;--line:#164e3d;--green:#00ff88;--cyan:#00d9ff;--red:#ff4568;--muted:#78918b}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:#dffdf2;font:14px ui-monospace,SFMono-Regular,Consolas,monospace}
.wrap{max-width:1000px;margin:auto;padding:30px 18px}.box{border:1px solid var(--line);background:var(--panel);padding:24px}
h1{color:var(--green);font-size:38px;margin:5px 0 15px}.tag{color:var(--cyan);font-size:11px;letter-spacing:2px}
.note{color:var(--muted);line-height:1.8}.terminal{background:#020506;border:1px solid #12372d;padding:18px;margin:20px 0;line-height:1.8}
input{width:100%;padding:13px;background:#020506;border:1px solid #285f50;color:#dffdf2;font:inherit}
button{margin-top:12px;padding:12px 18px;background:var(--green);border:0;font-weight:900;font-family:inherit}
pre{white-space:pre-wrap;background:#020506;border:1px solid #164e3d;padding:18px;color:#a9c9bf}.ok{color:var(--green)}.bad{color:var(--red)}a{color:var(--cyan)}
</style>
</head>
<body>
<div class="wrap"><div class="box">
<div class="tag">SQUAD // CYBER LAB :: SMTP / EXIM SIMULATION</div>
<h1>EXIM SECURITY LAB</h1>
<p class="note">
This lab models an Exim-style mail transport input flaw. The vulnerable component
is intentionally isolated in the training application: no real Exim daemon is
installed, no OS shell is called, and the challenge cannot execute commands on Render.
</p>

<div class="terminal">
220 squad-cyber-lab ESMTP Exim-Simulator<br>
EHLO attacker.lab<br>
250-squad-cyber-lab<br>
250-PIPELINING<br>
250-SIZE 52428800<br>
250-8BITMIME<br>
250 OK<br>
</div>

<h3>RCPT TO // vulnerable transport</h3>
<form method="post">
<input type="hidden" name="stage" value="rcpt">
<input name="recipient" value="<?= htmlspecialchars($recipient, ENT_QUOTES, 'UTF-8') ?>" placeholder="user@example.test">
<button>SUBMIT SMTP COMMAND</button>
</form>

<?php if ($result): ?>
<h3>SMTP response</h3>
<pre class="<?= $success ? 'ok' : '' ?>"><?= htmlspecialchars($result, ENT_QUOTES, 'UTF-8') ?></pre>
<?php endif; ?>

<p class="note">
<strong>Objective:</strong> discover that the recipient value reaches the simulated
transport command without proper separation/validation. The intended impact is
command injection inside the simulator, where successful exploitation reveals the
lab flag. Then document the root cause and propose strict address validation,
argument separation, and safe process execution.
</p>

<p><a href="/">← Back to SQUAD // CYBER LAB</a></p>
</div></div>
</body>
</html>
