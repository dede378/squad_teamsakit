<?php
$stage=$_GET['stage']??'recon'; $token=$_GET['token']??'';
$flag='SQUAD{MULTI_STAGE_EXPLOIT_CHAIN_2026}';
if($stage==='recon') $out="Public endpoint discovered.\nNext target: /labs/level10-chain/?stage=internal";
elseif($stage==='internal' && $token==='') $out="Internal service response:\nX-Lab-Token: CHAIN-7F4A";
elseif($stage==='internal' && $token==='CHAIN-7F4A') $out="Token accepted.\nNext target: /labs/level10-chain/?stage=execute&token=CHAIN-7F4A";
elseif($stage==='execute' && $token==='CHAIN-7F4A') $out="Simulated command execution context reached.\nFLAG: $flag";
else $out="403 simulated challenge response";
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Level 10 // Exploit Chain</title><style>
body{margin:0;background:#030608;color:#dffdf2;font:14px monospace}main{max-width:950px;margin:50px auto;padding:20px}.box{border:1px solid #164b3b;background:#071014;padding:22px;margin:16px 0}h1{color:#ff4568}pre{white-space:pre-wrap;color:#00d9ff}a{color:#00d9ff}.warn{color:#ffd166}
</style></head><body><main><p><a href="/">← SQUAD // CYBER LAB</a></p><h1>LEVEL 10 // EXPLOIT CHAIN</h1><div class="box"><p class="warn">EXPERT CHALLENGE — combine discovery, trust-boundary analysis and controlled exploitation.</p><pre><?=htmlspecialchars($out)?></pre></div><div class="box">No shell is executed. The final execution stage is a simulated sink that returns only the training flag.</div></main></body></html>