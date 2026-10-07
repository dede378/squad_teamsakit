<?php
session_start();
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="SQUAD // CYBER LAB — Web security training platform.">
<title>SQUAD // CYBER LAB</title>
<style>
:root{--bg:#030608;--panel:#071014;--panel2:#0a1519;--text:#dffdf2;--muted:#78918b;--line:rgba(0,255,145,.18);--green:#00ff88;--cyan:#00d9ff;--red:#ff4568;--yellow:#ffd166}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--bg);color:var(--text);font-family:ui-monospace,SFMono-Regular,Consolas,monospace;overflow-x:hidden}
body:before{content:"";position:fixed;inset:0;z-index:-4;background:linear-gradient(rgba(3,6,8,.84),rgba(3,6,8,.94)),url("/assets/images/20210420_153133.jpg") center/cover fixed;filter:saturate(.55)}
body:after{content:"";position:fixed;inset:0;z-index:-3;pointer-events:none;background:linear-gradient(rgba(0,255,136,.025) 50%,transparent 50%);background-size:100% 4px;opacity:.35}
a{color:inherit;text-decoration:none}.wrap{max-width:1200px;margin:auto;padding:0 22px}.top{border-bottom:1px solid var(--line);background:#020506;padding:8px 20px;color:#638078;font-size:11px;display:flex;justify-content:space-between}.online{color:var(--green)}.nav{position:sticky;top:0;z-index:50;background:rgba(3,7,9,.9);backdrop-filter:blur(14px);border-bottom:1px solid var(--line)}.navin{height:68px;display:flex;align-items:center;gap:30px}.brand{font-weight:900;letter-spacing:1px;font-size:18px;white-space:nowrap}.brand i{color:var(--green);font-style:normal}.links{display:flex;gap:22px;font-size:12px;color:#8ca59f}.links a:hover{color:var(--green)}.navstatus{margin-left:auto;color:#607771;font-size:11px}.navstatus b{color:var(--green)}.hero{min-height:650px;display:grid;grid-template-columns:1.15fr .85fr;gap:35px;align-items:center;padding-top:70px;padding-bottom:75px}.kicker{font-size:11px;letter-spacing:3px;color:var(--green);font-weight:800}.hero h1{font-family:Arial,sans-serif;font-size:clamp(52px,8vw,94px);line-height:.88;letter-spacing:-5px;margin:17px 0 22px}.hero h1 span{color:var(--green);text-shadow:0 0 28px rgba(0,255,136,.25)}.hero p{max-width:650px;color:#9bb0aa;line-height:1.8;font-size:14px}.cursor{color:var(--green);animation:blink 1s steps(2,end) infinite}@keyframes blink{50%{opacity:0}}.buttons{display:flex;gap:12px;margin-top:30px;flex-wrap:wrap}.btn{padding:13px 18px;border:1px solid var(--line);font-size:12px;font-weight:800}.primary{background:var(--green);color:#00140b;border-color:var(--green);box-shadow:0 0 25px rgba(0,255,136,.12)}.secondary{background:rgba(5,14,17,.75);color:#b8cec8}.btn:hover{transform:translateY(-2px);box-shadow:0 0 25px rgba(0,255,136,.2)}.terminal{border:1px solid var(--line);background:rgba(4,12,15,.9);box-shadow:0 20px 70px rgba(0,0,0,.45),0 0 35px rgba(0,255,136,.05)}.termbar{height:36px;border-bottom:1px solid var(--line);display:flex;align-items:center;padding:0 12px;gap:6px;color:#648079;font-size:10px}.dot{width:7px;height:7px;border-radius:50%;background:#31443f}.termbody{padding:20px;font-size:12px;line-height:2;color:#88a29a}.prompt{color:var(--green)}.cyan{color:var(--cyan)}.red{color:var(--red)}.termline{display:flex;gap:8px}.terminal .big{color:#dffdf2;font-size:14px;margin:7px 0 12px}.section{padding:65px 0}.sectionhead{display:flex;justify-content:space-between;align-items:end;margin-bottom:25px}.label{font-size:10px;letter-spacing:2px;color:var(--green)}h2{font-family:Arial,sans-serif;font-size:34px;letter-spacing:-1.5px;margin:7px 0}.view{font-size:11px;color:var(--cyan)}.grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}.card{position:relative;background:rgba(6,15,18,.9);border:1px solid var(--line);padding:0;overflow:hidden;transition:.2s}.card:hover{transform:translateY(-4px);border-color:rgba(0,255,136,.55);box-shadow:0 15px 40px rgba(0,0,0,.4),0 0 25px rgba(0,255,136,.07)}.cardtop{height:120px;padding:18px;display:flex;justify-content:space-between;background:linear-gradient(135deg,rgba(0,255,136,.08),transparent)}.num{color:#34534a;font-size:28px;font-weight:900}.status{font-size:9px;color:var(--green);border:1px solid rgba(0,255,136,.25);padding:4px 7px;height:max-content}.cardbody{padding:17px;border-top:1px solid var(--line)}.cardbody h3{font-family:Arial,sans-serif;margin:0 0 8px;font-size:17px}.cardbody p{color:#6f8882;font-size:10px;line-height:1.7;min-height:34px}.difficulty{color:var(--yellow);font-size:10px}.start{display:block;margin-top:15px;color:var(--cyan);font-size:10px;font-weight:800}.dashboard{display:grid;grid-template-columns:1.1fr .9fr;gap:16px}.panel{background:rgba(5,13,16,.9);border:1px solid var(--line);padding:22px}.paneltitle{display:flex;justify-content:space-between;color:#829b94;font-size:10px;border-bottom:1px solid var(--line);padding-bottom:13px;margin-bottom:17px}.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}.stat{border:1px solid rgba(0,255,136,.12);padding:16px}.stat strong{display:block;font-family:Arial;font-size:29px;color:var(--text)}.stat span{font-size:9px;color:#607a73}.activity{font-size:10px;line-height:2;color:#6f8882}.activity b{color:var(--green);font-weight:500}.bars{display:grid;gap:12px}.barrow{font-size:10px}.barrow div:first-child{display:flex;justify-content:space-between;color:#7f9992;margin-bottom:5px}.bar{height:5px;background:#11211f}.bar i{display:block;height:100%;background:var(--green);box-shadow:0 0 8px rgba(0,255,136,.35)}.about{border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:rgba(2,7,9,.88)}.aboutgrid{display:grid;grid-template-columns:1fr 1fr;gap:60px;padding:75px 0}.about h2{font-size:42px}.about p{color:#78918b;line-height:1.9;font-size:13px}.featuregrid{display:grid;grid-template-columns:1fr 1fr;gap:10px}.feature{border:1px solid var(--line);padding:18px;background:rgba(7,16,19,.7)}.feature b{display:block;color:#c9e9df;font-size:11px;margin-bottom:7px}.feature span{color:#607a73;font-size:10px;line-height:1.7}.footer{border-top:1px solid var(--line);background:#020506}.footerin{padding:38px 0;display:flex;justify-content:space-between;gap:30px}.footer p{color:#58716a;font-size:10px;line-height:1.8}.footerlinks{display:flex;gap:20px;color:#668078;font-size:10px}.copy{text-align:center;border-top:1px solid var(--line);padding:14px;color:#3e5650;font-size:9px}
@media(max-width:850px){.hero,.dashboard,.aboutgrid{grid-template-columns:1fr}.grid{grid-template-columns:repeat(2,1fr)}.navstatus{display:none}.hero{padding-top:50px}.terminal{margin-top:10px}}
@media(max-width:520px){.links{display:none}.grid,.stats,.featuregrid{grid-template-columns:1fr}.hero h1{font-size:55px;letter-spacing:-3px}.wrap{padding:0 16px}.top{font-size:9px}.footerin{flex-direction:column}.about h2{font-size:34px}}
</style>
</head>
<body>
<div class="top"><span>SQUAD // CYBER LAB :: WEB SECURITY TRAINING PLATFORM</span><span class="online">● SYSTEM ONLINE</span></div>
<nav class="nav"><div class="wrap navin">
<a class="brand" href="/">SQUAD <i>//</i> TEAMSAKIT</a>
<div class="links"><a href="#labs">LABS</a><a href="#dashboard">DASHBOARD</a><a href="#about">ABOUT</a><a href="/labs/headers/headers.php">HEADERS</a></div>
<div class="navstatus">STATUS: <b>ONLINE</b></div>
</div></nav>

<main>
<section class="wrap hero">
<div><div class="kicker">[ AUTHORIZED SECURITY TRAINING ]</div>
<h1>BREAK.<br><span>LEARN.</span><br>FIX.<span class="cursor">_</span></h1>
<p>Platform latihan keamanan web untuk mempelajari vulnerability, menguji teknik pentest, memahami impact, dan mempraktikkan mitigasi dalam lingkungan yang terkontrol.</p>
<div class="buttons"><a class="btn primary" href="#labs">[ ENTER THE LAB ]</a><a class="btn secondary" href="#dashboard">[ VIEW STATUS ]</a></div></div>
<div class="terminal">
<div class="termbar"><i class="dot"></i><i class="dot"></i><i class="dot"></i><span style="margin-left:6px">squad@cyber-lab:~</span></div>
<div class="termbody">
<div class="termline"><span class="prompt">$</span><span>whoami</span></div><div class="big">security_student</div>
<div class="termline"><span class="prompt">$</span><span>labs --list</span></div>
<div>01 <span class="cyan">SQL INJECTION</span></div>
<div>02 <span class="cyan">REFLECTED XSS</span></div>
<div>03 <span class="cyan">IDOR</span></div>
<div>04 <span class="cyan">OPEN REDIRECT</span></div>
<div>05 <span class="cyan">CSRF</span></div>
<div>06 <span class="cyan">HTTP HEADERS</span></div>
<div class="termline" style="margin-top:8px"><span class="prompt">$</span><span class="cursor">_</span></div>
</div></div>
</section>

<section class="wrap section" id="labs">
<div class="sectionhead"><div><div class="label">// TRAINING MODULES</div><h2>Security Labs</h2></div><a class="view" href="/labs/sqli/product.php?id=1">VIEW ALL →</a></div>
<div class="grid">
<a class="card" href="/labs/sqli/product.php?id=1"><div class="cardtop"><span class="num">01</span><span class="status">● ONLINE</span></div><div class="cardbody"><h3>SQL Injection</h3><p>Parameter-based database injection challenge.</p><div class="difficulty">DIFFICULTY ★★☆☆☆</div><span class="start">START LAB →</span></div></a>
<a class="card" href="/labs/xss/reflected.php?q=Koleksi"><div class="cardtop"><span class="num">02</span><span class="status">● ONLINE</span></div><div class="cardbody"><h3>Reflected XSS</h3><p>Test unsafe input reflection and output handling.</p><div class="difficulty">DIFFICULTY ★★☆☆☆</div><span class="start">START LAB →</span></div></a>
<a class="card" href="/labs/idor/profile.php?id=1"><div class="cardtop"><span class="num">03</span><span class="status">● ONLINE</span></div><div class="cardbody"><h3>IDOR</h3><p>Explore broken object-level authorization.</p><div class="difficulty">DIFFICULTY ★★★☆☆</div><span class="start">START LAB →</span></div></a>
<a class="card" href="/labs/redirect/redirect.php?url=https://example.com"><div class="cardtop"><span class="num">04</span><span class="status">● ONLINE</span></div><div class="cardbody"><h3>Open Redirect</h3><p>Analyze unsafe URL redirection behavior.</p><div class="difficulty">DIFFICULTY ★★☆☆☆</div><span class="start">START LAB →</span></div></a><a class="card" href="/labs/cve/path-traversal.php?file=welcome.txt"><div class="cardtop"><span class="num">05</span><span class="status">● ONLINE</span></div><div class="cardbody"><h3>CVE-Style Path Traversal</h3><p>Analyze unsafe file path construction and traversal.</p><div class="difficulty">DIFFICULTY ★★★☆☆</div><span class="start">START LAB →</span></div></a>
<a class="card" href="/labs/exim/"><div class="cardtop"><span class="num">06</span><span class="status">● ONLINE</span></div><div class="cardbody"><h3>Exim / SMTP Injection</h3><p>Exploit a simulated Exim transport command-injection flaw.</p><div class="difficulty">DIFFICULTY ★★★★☆</div><span class="start">START LAB →</span></div></a>
</div>
</section>

<section class="wrap section" id="dashboard">
<div class="sectionhead"><div><div class="label">// OPERATIONS</div><h2>Lab Dashboard</h2></div></div>
<div class="dashboard">
<div class="panel"><div class="paneltitle"><span>SYSTEM STATUS</span><span class="online">LIVE</span></div>
<div class="stats"><div class="stat"><strong>08</strong><span>ACTIVE LABS</span></div><div class="stat"><strong>04</strong><span>BEGINNER</span></div><div class="stat"><strong>02</strong><span>ADVANCED</span></div></div>
<div class="activity" style="margin-top:20px">
<div>[22:41:03] <b>SESSION</b> initialized</div>
<div>[22:41:07] <b>LAB</b> SQLi module accessed</div>
<div>[22:41:14] <b>SCAN</b> input parameter detected</div>
<div>[22:41:21] <b>LAB</b> challenge ready</div>
<div>[22:41:32] <b>HTTP</b> request intercepted</div>
</div></div>
<div class="panel"><div class="paneltitle"><span>VULNERABILITY MAP</span><span class="red">TRAINING</span></div>
<div class="bars">
<div class="barrow"><div><span>SQL INJECTION</span><span>90%</span></div><div class="bar"><i style="width:90%"></i></div></div>
<div class="barrow"><div><span>XSS</span><span>72%</span></div><div class="bar"><i style="width:72%"></i></div></div>
<div class="barrow"><div><span>IDOR</span><span>58%</span></div><div class="bar"><i style="width:58%"></i></div></div>
<div class="barrow"><div><span>CSRF</span><span>45%</span></div><div class="bar"><i style="width:45%"></i></div></div>
<div class="barrow"><div><span>REDIRECT</span><span>36%</span></div><div class="bar"><i style="width:36%"></i></div></div>
</div></div>
</div>
</section>

<section class="about" id="about"><div class="wrap aboutgrid">
<div><div class="label">// ABOUT THE LAB</div><h2>Learn how vulnerabilities behave.</h2><p>SQUAD // CYBER LAB dibuat untuk latihan keamanan aplikasi web secara aman dan terkontrol. Fokusnya bukan sekadar menemukan celah, tetapi memahami request, input, impact, dan cara memperbaikinya.</p><a class="view" href="/labs/headers/headers.php">EXPLORE HTTP HEADERS →</a></div>
<div class="featuregrid">
<div class="feature"><b>01 // PRACTICE</b><span>Gunakan lab vulnerable untuk membangun pemahaman dari request sampai impact.</span></div>
<div class="feature"><b>02 // TEST</b><span>Uji teknik pentest seperti parameter analysis, XSS, IDOR, dan redirect testing.</span></div>
<div class="feature"><b>03 // ANALYZE</b><span>Amati response, headers, status code, dan perilaku aplikasi.</span></div>
<div class="feature"><b>04 // FIX</b><span>Pelajari mitigasi sehingga setiap vulnerability punya konteks defensif.</span></div>
</div></div></section>
</main>

<footer class="footer"><div class="wrap footerin"><div><a class="brand" href="/">SQUAD <i>//</i> TEAMSAKIT</a><p>Authorized web security training environment.</p></div><div class="footerlinks"><a href="#labs">LABS</a><a href="#dashboard">DASHBOARD</a><a href="#about">ABOUT</a><a href="/labs/parameters/params.php?q=help">PARAMETERS</a></div></div><div class="copy">© 2026 SQUAD // TEAMSAKIT · CYBER SECURITY TRAINING LAB</div></footer>
</body>
</html>