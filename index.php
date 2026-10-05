<?php
session_start();
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="KaryaNusa — produk pilihan lokal untuk rumah dan keseharian.">
<title>KaryaNusa — Pilihan Lokal</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<style>
:root{--ink:#18221f;--muted:#69736f;--paper:#f7f5ef;--card:#fff;--line:#e5e3dc;--accent:#236b52}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--paper);color:var(--ink);font-family:"DM Sans",sans-serif}a{text-decoration:none;color:inherit}
.top{background:#18221f;color:#f5f2e9;text-align:center;font-size:13px;padding:9px 16px}
.nav{position:sticky;top:0;z-index:20;background:rgba(247,245,239,.95);backdrop-filter:blur(14px);border-bottom:1px solid var(--line)}
.navin{max-width:1180px;margin:auto;height:72px;padding:0 22px;display:flex;align-items:center;gap:30px}.brand{font-family:"Playfair Display",serif;font-size:25px;font-weight:700}.brand span{color:var(--accent)}
.links{display:flex;gap:25px;font-size:14px;color:#4d5753}.links a:hover{color:var(--accent)}.actions{margin-left:auto;display:flex;align-items:center;gap:10px}
.search{border:1px solid var(--line);background:white;border-radius:30px;padding:10px 15px;width:180px;outline:none}.icon{width:40px;height:40px;border:1px solid var(--line);background:white;border-radius:50%;display:grid;place-items:center}
.hero{max-width:1180px;margin:auto;padding:62px 22px 45px;display:grid;grid-template-columns:1.08fr .92fr;gap:48px;align-items:center}.eyebrow{text-transform:uppercase;letter-spacing:2px;color:var(--accent);font-size:12px;font-weight:700}
.hero h1{font-family:"Playfair Display",serif;font-size:clamp(44px,6vw,72px);line-height:.98;letter-spacing:-2px;margin:16px 0 20px}.hero p{max-width:560px;color:var(--muted);font-size:17px;line-height:1.7}
.buttons{display:flex;gap:12px;margin-top:28px}.btn{padding:13px 20px;border-radius:28px;font-weight:600;font-size:14px}.primary{background:var(--accent);color:white}.secondary{border:1px solid var(--line);background:white}
.heroimg{min-height:470px;border-radius:28px;background:linear-gradient(145deg,#d8e4db,#a8bba9);position:relative;overflow:hidden}.heroimg:before{content:"";position:absolute;width:310px;height:310px;border-radius:50%;background:#ead7a8;right:-65px;top:-65px}.heroimg:after{content:"KARYA\A NUSA";white-space:pre;position:absolute;left:35px;bottom:32px;color:rgba(24,34,31,.68);font-family:"Playfair Display",serif;font-size:55px;line-height:.8}
.section{max-width:1180px;margin:auto;padding:55px 22px}.sectionhead{display:flex;justify-content:space-between;align-items:end;margin-bottom:25px}.section h2{font-family:"Playfair Display",serif;font-size:35px;margin:7px 0}.view{color:var(--accent);font-size:14px;font-weight:600}
.grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}.product{background:var(--card);border:1px solid var(--line);border-radius:18px;overflow:hidden;transition:.2s}.product:hover{transform:translateY(-4px);box-shadow:0 12px 30px rgba(25,35,30,.08)}
.photo{height:210px;display:grid;place-items:center;font-family:"Playfair Display",serif;font-size:28px}.p1{background:#dce8df}.p2{background:#eee0c4}.p3{background:#d9d9df}.p4{background:#e6d6cc}.info{padding:16px}.tag{font-size:11px;text-transform:uppercase;letter-spacing:1.2px;color:var(--accent);font-weight:700}.info h3{margin:7px 0;font-size:16px}.price{font-weight:700}
.story{background:#ebe9e0}.storyin{max-width:1180px;margin:auto;padding:65px 22px;display:grid;grid-template-columns:1fr 1fr;gap:60px}.story h2{font-family:"Playfair Display",serif;font-size:42px;line-height:1.1;margin:10px 0 18px}.story p{color:var(--muted);line-height:1.8}
.features{display:grid;grid-template-columns:1fr 1fr;gap:14px}.feature{background:white;border:1px solid var(--line);border-radius:16px;padding:22px}.feature b{display:block;margin-bottom:8px}.feature span{font-size:13px;color:var(--muted);line-height:1.6}
.newsletter{max-width:760px;margin:auto;text-align:center;padding:65px 22px}.newsletter h2{font-family:"Playfair Display",serif;font-size:38px;margin:8px 0}.newsletter p{color:var(--muted)}.form{display:flex;gap:8px;margin-top:22px}.form input{flex:1;border:1px solid var(--line);padding:14px 18px;border-radius:28px;outline:none}
.footer{background:#18221f;color:#dfe6e2}.footerin{max-width:1180px;margin:auto;padding:48px 22px;display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:35px}.footer h4{margin:0 0 15px;color:white}.footer p,.footer a{font-size:13px;color:#aebbb5;line-height:1.8}.copy{border-top:1px solid #34413c;padding:16px 22px;text-align:center;font-size:12px;color:#82908a}
@media(max-width:850px){.links{display:none}.search{width:130px}.hero,.storyin{grid-template-columns:1fr}.heroimg{min-height:330px}.grid{grid-template-columns:repeat(2,1fr)}.footerin{grid-template-columns:1fr 1fr}}
@media(max-width:520px){.search{display:none}.hero{padding-top:40px}.hero h1{font-size:48px}.grid{grid-template-columns:1fr}.features{grid-template-columns:1fr}.form{flex-direction:column}.footerin{grid-template-columns:1fr}}
</style>
</head>
<body>
<div class="top">Gratis ongkir untuk pesanan di atas Rp300.000 · Pengiriman ke seluruh Indonesia</div>
<nav class="nav"><div class="navin">
<a class="brand" href="/">Karya<span>Nusa</span></a>
<div class="links"><a href="#koleksi">Koleksi</a><a href="#cerita">Cerita Kami</a><a href="#layanan">Layanan</a><a href="#kontak">Kontak</a></div>
<div class="actions"><form action="/labs/parameters/params.php" method="get"><input class="search" name="q" placeholder="Cari produk..."></form><a class="icon" href="/labs/auth/login.php" aria-label="Akun">♙</a><a class="icon" href="/labs/idor/profile.php?id=1" aria-label="Favorit">♡</a></div>
</div></nav>
<main>
<section class="hero"><div><div class="eyebrow">Pilihan lokal, dibuat dengan cerita</div><h1>Hal-hal baik untuk rumah dan keseharian.</h1><p>Kami mengumpulkan produk pilihan dari pembuat lokal yang punya perhatian pada bahan, proses, dan detail kecil yang membuat sesuatu terasa istimewa.</p><div class="buttons"><a class="btn primary" href="#koleksi">Lihat koleksi</a><a class="btn secondary" href="#cerita">Tentang KaryaNusa</a></div></div><div class="heroimg" role="img" aria-label="Koleksi produk KaryaNusa"></div></section>
<section class="section" id="koleksi"><div class="sectionhead"><div><div class="eyebrow">Pilihan minggu ini</div><h2>Favorit pelanggan</h2></div><a class="view" href="/labs/sqli/product.php?id=1">Lihat semua →</a></div>
<div class="grid">
<a class="product" href="/labs/sqli/product.php?id=1"><div class="photo p1">Linen Set</div><div class="info"><div class="tag">Rumah</div><h3>Set Linen Natural</h3><div class="price">Rp289.000</div></div></a>
<a class="product" href="/labs/xss/reflected.php?q=Koleksi"><div class="photo p2">Ceramic</div><div class="info"><div class="tag">Dapur</div><h3>Cangkir Keramik Aruna</h3><div class="price">Rp129.000</div></div></a>
<a class="product" href="/labs/redirect/redirect.php?url=https://example.com"><div class="photo p3">Daily Bag</div><div class="info"><div class="tag">Aksesori</div><h3>Tas Kanvas Harian</h3><div class="price">Rp219.000</div></div></a>
<a class="product" href="/labs/idor/profile.php?id=1"><div class="photo p4">Wood Tray</div><div class="info"><div class="tag">Rumah</div><h3>Nampan Kayu Jati</h3><div class="price">Rp179.000</div></div></a>
</div></section>
<section class="story" id="cerita"><div class="storyin"><div><div class="eyebrow">Dibuat untuk bertahan lama</div><h2>Kami percaya benda sehari-hari boleh punya makna.</h2><p>KaryaNusa berangkat dari keinginan sederhana: menemukan barang yang terasa dekat, berguna, dan dibuat dengan niat baik. Dari studio kecil hingga pengrajin keluarga, setiap produk dipilih satu per satu.</p><a class="view" href="/labs/headers/headers.php">Pelajari lebih lanjut →</a></div>
<div class="features" id="layanan"><div class="feature"><b>Kurasi pilihan</b><span>Produk dipilih berdasarkan kualitas bahan dan proses pembuatannya.</span></div><div class="feature"><b>Pengiriman aman</b><span>Kami mengemas setiap pesanan dengan perhatian agar tiba dalam kondisi terbaik.</span></div><div class="feature"><b>Dukungan lokal</b><span>Belanja Anda ikut membantu studio dan usaha kecil di berbagai daerah.</span></div><div class="feature"><b>Layanan ramah</b><span>Tim kami siap membantu sebelum dan sesudah pesanan diterima.</span></div></div></div></section>
<section class="newsletter" id="kontak"><div class="eyebrow">Tetap terhubung</div><h2>Cerita baru, langsung ke inbox.</h2><p>Dapatkan kabar tentang koleksi baru, cerita pembuat, dan penawaran khusus.</p><form class="form" action="/labs/csrf/email.php" method="post"><input name="email" type="email" placeholder="Alamat email Anda" required><button class="btn primary" type="submit">Daftar</button></form></section>
</main>
<footer class="footer"><div class="footerin"><div><a class="brand" href="/" style="color:white">Karya<span>Nusa</span></a><p>Produk pilihan lokal untuk rumah dan keseharian yang lebih berarti.</p></div><div><h4>Belanja</h4><a href="#koleksi">Koleksi baru</a><br><a href="#koleksi">Rumah</a><br><a href="#koleksi">Aksesori</a></div><div><h4>Bantuan</h4><a href="/labs/auth/login.php">Akun</a><br><a href="/labs/parameters/params.php?q=bantuan">Pusat bantuan</a><br><a href="#kontak">Hubungi kami</a></div><div><h4>Informasi</h4><a href="#cerita">Tentang kami</a><br><a href="/labs/headers/headers.php">Pengiriman</a><br><a href="/labs/redirect/redirect.php?url=https://example.com">Kebijakan</a></div></div><div class="copy">© 2026 KaryaNusa. Semua hak dilindungi.</div></footer>
</body>
</html>