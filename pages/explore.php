<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>explore</title>
	<link href='../aset/fw/build/fw.css' rel='stylesheet'>
	<link href='../aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='../aset/css/style.dashboard.css' rel='stylesheet'>
	<link href='../aset/css/style.explore.css' rel='stylesheet'>
</head>
<body>

<div class="atas">
	<h1 class="judul">Bantu<span>sade</span></h1>
	<form id="formCari">
		<button><i class="fas fa-search"></i></button>
		<input type="text" class="box" id="q" placeholder="Cari campaign..." oninput="cari(this.value)">
	</form>
	<div class="menu">
		<a href="#"><li><i class="fas fa-user"></i>
			<ul class="sub">
				<a href="./create-campaign"><li>Buat Campaign</li></a>
				<a href="./settings"><li>Pengaturan</li></a>
				<a href="./logout"><li>Logout</li></a>
			</ul>
		</li></a>
	</div>
</div>

<div class="container">
	<!-- <div class="myCampaign">
		<div class="wrap">
			<h3>Test Campaign</h3>
			<div class="persen"><div class="isi" style="width: 20%"></div></div>
			<div class="ket"><span>30%</span> dari Rp 25.000.000</div>
			<div class="atribusi">
				oleh <b>Riyan Satria</b>
			</div>
		</div>
	</div> -->
	<div id="load"></div>
</div>

<script src='../aset/js/embo.js'></script>
<script src='../aset/js/script.explore.js'></script>

</body>
</html>