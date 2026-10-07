<?php
$url=$_GET['url']??'';
$flag='SQUAD{SSRF_INTERNAL_SERVICE_2026}';
$result='';
if($url!==''){
 $p=parse_url($url); $host=$p['host']??''; $path=$p['path']??'/';
 if($host==='internal.squad.test' && $path==='/metadata'){
  $result="HTTP/1.1 200 OK\nContent-Type: application/json\n\n{\"service\":\"mock-metadata\",\"flag\":\"$flag\"}";
 }else $result="HTTP/1.1 200 OK\n\n[simulated fetch] host=$host path=$path";
}
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Level 09 // SSRF</title><style>
body{margin:0;background:#030608;color:#dffdf2;font:14px monospace}main{max-width:950px;margin:50px auto;padding:20px}.box{border:1px solid #164b3b;background:#071014;padding:22px;margin:16px 0}h1{color:#00ff88}input{width:75%;padding:12px;background:#020506;color:#dffdf2;border:1px solid #164b3b}button{padding:12px;background:#00ff88;border:0;font-weight:bold}.out{white-space:pre-wrap;color:#00d9ff}.hint{color:#78918b;font-size:12px}a{color:#00d9ff}
</style></head><body><main><p><a href="/">← SQUAD // CYBER LAB</a></p><h1>LEVEL 09 // SSRF</h1>
<div class="box"><p>The application fetches a user-supplied URL through a simulated backend client.</p><form><input name="url" placeholder="https://example.com"><button>Fetch</button></form></div>
<?php if($result):?><div class="box"><b>Backend response</b><div class="out"><?=htmlspecialchars($result)?></div></div><?php endif;?>
<div class="box hint">Goal: discover the internal mock service and retrieve its metadata. No real network request is made.</div>
</main></body></html>