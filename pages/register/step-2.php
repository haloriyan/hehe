<?php
include 'aksi/ctrl/users.php';

// Verifikasi apakah dari form regist atau tidak
$token = $_COOKIE['register'];
$a = $users->me($token, "status");
if($a != 0 or $token == "") {
	die('error');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>Login</title>
	<link href='../aset/fw/build/fw.css' rel='stylesheet'>
	<link href='../aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='../aset/css/style.auth.css' rel='stylesheet'>
</head>
<body>

<div class="tutup"></div>
<div class="container">
	<form id="formVerif">
		<div class="wrap">
			<h3>Verifikasi</h3>
			<p>
				Sebelum bisa membuat campaign, Anda harus memverifikasikan data diri dengan mengunggah foto dan KTP melalui form berikut ini
			</p>
			<input type="hidden" id="foto">
			<input type="hidden" id="ktp">
			<div class="isi">Foto :</div>
			<input type="file" id="inputFoto" class="box" required>
			<div class="isi">KTP :</div>
			<input type="file" id="inputKtp" class="box" required>
			<button>VERIFIKASI</button>
		</div>
	</form>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="notif">
	<div class="popup">
		<div class="wrap">
			<div class="ke-kanan" id="xNotif"><i class="fas fa-times"></i></div>
			<p id="isiNotif"></p>
			<button class="tbl hijau" onclick="mengarahkan('../')">Kembali ke homepage</button>
		</div>
	</div>
</div>

<script src="../aset/js/embo.js"></script>
<script src="../aset/js/upload.js"></script>
<script>
	function setNotif(notif) {
		munculPopup("#notif", $("#notif").pengaya("top: 180px"))
		$("#isiNotif").tulis(notif)
	}
	function getExt(val) {
		let re =/(?:\.([^.]+))?$/
		let ext = re.exec(val)[1]
		return ext
	}
	function sukses(res) {
		console.log(res)
	}
	$("#inputFoto").di('ganti', function(the) {
		let allowed = ["jpg","jpeg","png","bmp"]
		var file = the.srcElement.files[0]
		var cover = $("#inputFoto").isi();
		var c = cover.split("fakepath");
		var cov = c[1].substr(1, 2599);
		$("#foto").isi(cov);
		let coverExt = getExt(cov)
		if(!inArray(coverExt, allowed)) {
			$("#foto").isi('')
			document.querySelector("#inputFoto").value = ""
			setNotif("Image format not allowed")
			return false
		}
		var upload = new Upload(file);
		upload.doUpload("../aksi/unggah.php");
	})
	$("#inputKtp").di('ganti', function(the) {
		let allowed = ["jpg","jpeg","png","bmp"]
		var file = the.srcElement.files[0]
		var cover = $("#inputKtp").isi();
		var c = cover.split("fakepath");
		var cov = c[1].substr(1, 2599);
		$("#ktp").isi(cov);
		let coverExt = getExt(cov)
		if(!inArray(coverExt, allowed)) {
			$("#ktp").isi('')
			document.querySelector("#inputKtp").value = ""
			setNotif("Image format not allowed")
			return false
		}
		var upload = new Upload(file);
		upload.doUpload("../aksi/unggah.php");
	})

	submit("#formVerif", () => {
		let foto = $("#foto").isi()
		let ktp = $("#ktp").isi()
		let verif = "foto="+foto+"&ktp="+ktp+"&bag=verif"
		pos("../users/edit", verif, (res) => {
			setNotif(res)
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