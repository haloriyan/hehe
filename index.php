<?php
include 'aksi/ctrl/users.php';
$sesi = $users->sesi();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Bantusade</title>
	<link href="aset/fw/build/fw.css" rel="stylesheet">
	<link href="aset/fw/build/fontawesome-all.min.css" rel="stylesheet">
	<link href="aset/css/style.index.css" rel="stylesheet">
</head>
<body>

<div class="atas">
	<h1 class="judul">Bantu<span>sade</span></h1>
	<div class="menu ke-kanan">
		<?php if($sesi == "") { ?>
			<a href="./auth"><li>LOGIN</li></a>
		<?php }else { ?>
			<!-- <a href="./create-campaign"><li>Buat Campaign</li></a> -->
			<a href="#"><li><i class="fas fa-user"></i>
				<ul class="sub">
					<a href="./create-campaign"><li>Buat Campaign</li></a>
					<a href="./dashboard"><li>Dashboard</li></a>
					<a href="./settings"><li>Pengaturan</li></a>
					<a href="./logout"><li>Logout</li></a>
				</ul>
			</li></a>
		<?php } ?>
	</div>
</div>

<div class="illustration">
	<!-- <img src="aset/img/launching.png" alt="Galangdana"> -->
</div>

<div class="container">
	<h2>Cari partner untuk wujudkan usahamu sekarang!</h2>
	<p>
		Jelaskan konsep usahamu dan dapatkan modal usaha dengan mudah
	</p>
	<br />
	<button id="cta" class='hijau'>MULAI</button>
	<br />
	<button id="more">SELENGKAPNYA</button>
</div>

<div class="bawah">
	<div class="bagian rata-tengah" id="about">
		<div class="wrap">
			<h3>Apa itu Bantu<span>sade</span>?</h3>
			<p>Bantusade adalah media yang menghubungkan orang yang ingin memulai usaha tetapi terkendala dengan dana dan orang yang ingin membantunya. Karena dengan saling bersama, kita hebat.</p>
			<br />
			<button class="tbl hijau">Cari Tahu Lebih Banyak &nbsp; <i class="fas fa-angle-double-right"></i></button>
		</div>
	</div>
	<div class="bagian rata-tengah" id="how">
		<div class="wrap">
			<h3>Bagaimana caranya?</h3>
			<div class="cara"><div>Mendaftar</div></div>
			<div class="cara"><div>Buat Campaign</div></div>
			<div class="cara"><div>Mulai Usaha</div></div>
		</div>
	</div>
	<footer>
		<div class="bag bag-3">
			<div class="wrap">
				<h3>PAGES</h3>
				<hr size="3" color="#fff" width="20%" align="left">
				<a href="#"><li>About</li></a>
				<a href="#"><li>About</li></a>
				<a href="#"><li>About</li></a>
			</div>
		</div>
		<div class="bag bag-3">
			<div class="wrap">
				<h3>PAGES</h3>
				<hr size="3" color="#fff" width="20%" align="left">
				<a href="#"><li>About</li></a>
				<a href="#"><li>About</li></a>
				<a href="#"><li>About</li></a>
			</div>
		</div>
		<div class="bag bag-3">
			<div class="wrap">
				<h3>PAGES</h3>
				<hr size="3" color="#fff" width="20%" align="left">
				<a href="#"><li>About</li></a>
				<a href="#"><li>About</li></a>
				<a href="#"><li>About</li></a>
			</div>
		</div>
	</footer>
</div>

<script src="aset/js/embo.js"></script>
<script>
	$("#more").klik(() => {
		scrollKe("#about")
	})
</script>

</body>
</html>
