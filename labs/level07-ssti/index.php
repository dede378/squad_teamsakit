<?php
$input=$_GET['name']??'security_student';
$flag='SQUAD{SSTI_TEMPLATE_CONTEXT_2026}';
if(preg_match('/\{\{\s*config\.secret\s*\}\}/i',$input)){
 $rendered='Welcome security_student — template context leaked: '.$flag;
}else{
 $rendered=str_replace(['{{name}}','{{7*7}}'],[$input,'49'],'Welcome {{name}} — template check: {{7*7}}');
}
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Level 07 // SSTI</title><style>
body{margin:0;background:#030608;color:#dffdf2;font:14px monospace}main{max-width:900px;margin:50px auto;padding:20px}.box{border:1px solid #164b3b;background:#071014;padding:22px;margin:16px 0}h1{color:#00ff88}input{width:75%;padding:12px;background:#020506;color:#dffdf2;border:1px solid #164b3b}button{padding:12px;background:#00ff88;border:0;font-weight:bold}.out{white-space:pre-wrap;color:#00d9ff}.hint{color:#78918b;font-size:12px}a{color:#00d9ff}
</style></head><body><main><p><a href="/">← SQUAD // CYBER LAB</a></p><h1>LEVEL 07 // SSTI</h1>
<div class="box"><p>Template rendering challenge. Your input is placed into a simulated template context.</p><form><input name="name" value="<?=htmlspecialchars($input,ENT_QUOTES)?>"><button>Render</button></form></div>
<div class="box"><b>Rendered response</b><div class="out"><?=htmlspecialchars($rendered)?></div></div>
<div class="box hint">Goal: prove template expression evaluation and reach the lab flag. This simulator never executes PHP or system commands.</div>
</main></body></html>