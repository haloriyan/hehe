<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>Dashboard</title>
	<link href='aset/fw/build/fw.css' rel='stylesheet'>
	<link href='aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='aset/css/style.dashboard.css' rel='stylesheet'>
</head>
<body>

<div class="atas">
	<h1 class="judul">Bantu<span>sade</span></h1>
	<form id="formCari">
		<button><i class="fas fa-search"></i></button>
		<input type="text" class="box" id="q" placeholder="Cari campaign...">
	</form>
</div>

<div class="kiri">
	<a href="#"><li aktif='ya'><div class="icon"><i class="fas fa-home"></i></div> Dasbor</li></a>
	<a href="./my-campaigns"><li><div class="icon"><i class="fas fa-briefcase"></i></div> Campaign Saya</li></a>
	<a href="./my-invests"><li><div class="icon"><i class="fas fa-money-bill-wave"></i></div> Invest Saya</li></a>
</div>

<div class="container">
	<div class="bag bag-10">
		<div class="wrap">
			<h2>Overview</h2>
			<hr size="2" color="#aaa">
		</div>
	</div>
</div>

<script src='aset/js/embo.js'></script>
<script src='aset/js/script.dashboard.js'></script>

</body>
</html>