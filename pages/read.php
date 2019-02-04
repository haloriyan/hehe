<?php
include 'aksi/ctrl/invests.php';

$title = $tools->convertTitle($bag);
$titles = $campaigns->detail($title, "title");
$idcampaign = $campaigns->detail($title, "idcampaign");
$description = $campaigns->detail($title, "description");
$butuhDana = $campaigns->detail($title, "butuh_dana");
$danaTerkumpul = $campaigns->detail($title, "dana_terkumpul");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title></title>
	<link href='aset/fw/build/fw.css' rel='stylesheet'>
	<link href='aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='aset/css/style.dashboard.css' rel='stylesheet'>
	<style>
		.kiri {
			width: 25%;
		}
		.container { width: 60%; }
		.atribusi {
			font-size: 15px;
			color: #666;
			margin-top: -5px;
			margin-bottom: 25px;
		}
		.atribusi b,.kiri .ket b {
			font-family: ProBold;
			color: #27ae60;
		}
		.kiri .wrap { margin: 10%; }
		.kiri > .wrap > div {
			margin-bottom: 20px;
		}
		.container {
			left: 0px;right: 0px;top: 65px;
			width: auto;
		}
	</style>
</head>
<body>

<input type="hidden" id="idcampaign" value="<?php echo $idcampaign; ?>">

<div class="atas">
	<h1 class="judul">Bantu<span>sade</span></h1>
	<form id="formCari">
		<button><i class="fas fa-search"></i></button>
		<input type="text" class="box" id="q" placeholder="Cari campaign...">
	</form>
</div>

<div class="container">
	<div class="kiri">
		<div class="wrap">
			<div class="persen"><div class="isi"></div></div>
			<div class="ket">
				<b>30%</b> dari <?php echo $tools->toIdr($butuhDana); ?>
			</div>
			<div>
				Dana terkumpul : <?php echo $tools->toIdr($danaTerkumpul); ?>
			</div>
			<button class="tbl hijau" id="invest">Invest Campaign</button>
		</div>
	</div>
	<div class="wrap">
		<div class="bag bag-4" style="box-shadow: none;"></div>
		<div class="bag bag-6">
			<div class="wrap">
				<h2><?php echo $titles; ?></h2>
				<div class="atribusi">oleh <b>Riyan Satria</b></div>
				<p>
					<?php echo $description; ?>
				</p>
				<div id="loadInvest"></div>
			</div>
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="bagInvest">
	<div class="popup">
		<div class="wrap">
			<h3>hehe
				<div class="ke-kanan" id="xInvest"><i class="fas fa-times"></i></div>
			</h3>
		</div>
	</div>
</div>

<script src="aset/js/embo.js"></script>
<script>
	let campaignId = $("#idcampaign").isi()
	function loadInvest() {
		pos("./invests/show", "idcampaign="+campaignId, (res) => {
			$("#loadInvest").tulis(res)
		})
	}
	loadInvest()
	$("#invest").klik(() => {
		munculPopup("#bagInvest", $("#bagInvest").pengaya("top: 125px"))
	})
	tekan("Escape", () => {
		hilangPopup("#bagInvest")
	})
	$("#xInvest").klik(() => {
		hilangPopup("#bagInvest")
	})
</script>

</body>
</html>