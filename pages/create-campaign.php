<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>Create Campaign</title>
	<link href='aset/fw/build/fw.css' rel='stylesheet'>
	<link href='aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='aset/css/style.auth.css' rel='stylesheet'>
	<link href='aset/css/style.create-campaign.css' rel='stylesheet'>
</head>
<body>

<div class="tutup"></div>
<div class="container">
	<h1>Buat Campaign</h1>
	<form id="formTujuan" class="bagian">
		<div class="wrap">
			<div>Saya ingin...</div>
			<select class="box" style="width: 100%;" id="tujuan">
				<option>Membuat usaha baru</option>
				<option>Memperbesar usaha</option>
			</select>
			<button>Selanjutnya</button>
		</div>
	</form>
	<form class="bagian" id="next">
		<div class="wrap">
			<div class="isi">Nama Usaha :</div>
			<input type="text" class="box" id="title">
			<div class="isi">Jelaskan Konsep Usaha :</div>
			<!-- <textarea class="box" id="description"></textarea> -->
			<div id="deskripsi" contenteditable="true"></div>
			<div class="bag bag-5">
				<div class="isi">Sudah Ada Dana :</div>
				<input type="number" class="box" id="adaDana">
			</div>
			<div class="bag bag-5">
				<div class="isi">Membutuhkan Dana :</div>
				<input type="number" class="box" id="butuhDana">
			</div>
			<button>Buat</button>
		</div>
	</form>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="notif">
	<div class="popup">
		<div class="wrap">
			<div class="ke-kanan" id="xNotif"><i class="fas fa-times"></i></div>
			<p id="isiNotif"></p>
		</div>
	</div>
</div>

<script src='aset/js/embo.js'></script>
<script>
	function setNotif(notif) {
		munculPopup("#notif", $("#notif").pengaya("top: 180px"))
		$("#isiNotif").tulis(notif)
	}
	submit('#formTujuan', () => {
		let tujuan = $("#tujuan").isi()
		$("#formTujuan").hilang()
		$("#next").muncul()
		$(".container").pengaya("top: 70px")
		$("h1").tulis(tujuan)
		return false
	})
	submit('#next', () => {
		let title 		= $("#title").isi()
		let deskripsi 	= $("#deskripsi").tulis()
		let adaDana 	= $("#adaDana").isi()
		let butuhDana 	= $("#butuhDana").isi()
		let create 		= "title="+title+"&desc="+deskripsi+"&adaDana="+adaDana+"&butuhDana="+butuhDana
		pos("./campaigns/create", create, (res) => {
			if(res == "sukses") {
				mengarahkan("my-campaigns")
			}else {
				setNotif(res)
			}
		})
		return false
	})
	tekan('Escape', () => {
		hilangPopup("#notif")
	})
	$("#xNotif").klik(() => {
		hilangPopup("#notif")
	})
</script>

</body>
</html>