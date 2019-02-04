<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>dashboard</title>
	<link href='aset/fw/build/fw.css' rel='stylesheet'>
	<link href='aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='aset/css/style.dashboard.css' rel='stylesheet'>
	<style>
		#load,#detail { margin-top: 25px; }
		#detail > div {
			margin-bottom: 15px;
			color: #555;
		}
		#bagDetail { display: block;padding: 1px; }
	</style>
</head>
<body>

<div class="atas">
	<h1 class="judul">Bantu<span>sade</span></h1>
	<form id="formCari">
		<button><i class="fas fa-search"></i></button>
		<input type="text" class="box" id="q" placeholder="Cari campaign...">
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

<div class="kiri">
	<a href="./dashboard"><li><div class="icon"><i class="fas fa-home"></i></div> Dasbor</li></a>
	<a href="#"><li aktif='ya'><div class="icon"><i class="fas fa-briefcase"></i></div> Campaign Saya</li></a>
	<a href="./my-invests"><li><div class="icon"><i class="fas fa-money-bill-wave"></i></div> Invest Saya</li></a>
</div>

<div class="container">
	<div class="bag bag-10" id="bagDetail">
		<div class="wrap">
			<h2>Detail Campaign</h2>
			<hr size="2" color="#aaa">
			<div id="detail">
				<div class="bag-5">
					Butuh dana : Rp 25.000.000
				</div>
				<div>
					Dana terkumpul : Rp 15.000.000
				</div>
				<h3>List investor</h3>
				<hr size="2" color="#aaa">
			</div>
		</div>
	</div>
	<div class="bag bag-10">
		<div class="wrap">
			<h2>Campaign Saya</h2>
			<hr size="2" color="#aaa">
			<div id="load"></div>
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="bagHapus">
	<div class="popup">
		<div class="wrap">
			<h3>Hapus Campaign
				<div class="ke-kanan" id="xHapus"><i class="fas fa-times"></i></div>
			</h3>
			<p>
				Yakin ingin menghapus campaign ini?
			</p>
			<form id="hapusCampaign">
				<input type="hidden" id="idcampaign">
				<div class="bag-tombol">
					<button class="merah">Ya, hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<button onclick="mengarahkan('./create-campaign')" id="createCampaign"><i class="fas fa-plus"></i></button>

<script src='aset/js/embo.js'></script>
<script>
	function load() {
		ambil("./campaigns/my", (res) => {
			$("#load").tulis(res)
		})
	}
	load()

	function hapus(id) {
		$("#idcampaign").isi(id)
		munculPopup("#bagHapus", $("#bagHapus").pengaya("top: 140px"))
	}
	function detail() {
		$("#bagDetail").muncul()
		scrollKe("#bagDetail")
	}

	submit("#hapusCampaign", () => {
		let id = $("#idcampaign").isi()
		let del = "id="+id
		pos("./campaigns/delete", del, (res) => {
			hilangPopup("#bagHapus")
			load()
		})
		return false
	})

	tekan("Escape", () => {
		hilangPopup("#bagHapus")
	})
</script>

</body>
</html>