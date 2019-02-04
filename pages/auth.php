<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>Login</title>
	<link href='aset/fw/build/fw.css' rel='stylesheet'>
	<link href='aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='aset/css/style.auth.css' rel='stylesheet'>
</head>
<body>

<div class="tutup"></div>

<div class="container">
	<form id="formLogin">
		<div class="wrap">
			<h3>LOGIN</h3>
			<div class="isi">Email :</div>
			<input type="email" class='box' id='emailLog'>
			<div class="isi">Password :</div>
			<input type="password" class='box' id='pwdLog'>
			<div class="bag bag-5">
				<button>LOGIN</button>
			</div>
			<div class="bag bag-5">
				<button class='nonCta' type='button' id='tblReg'>OR REGISTER</button>
			</div>
			<div class="bag bag-10 rata-tengah">
				<a href="#">forgot your password?</a>
			</div>
		</div>
	</form>
	<form id="formReg">
		<div class="wrap">
			<h3>REGISTER</h3>
			<div class="isi">Nama :</div>
			<input type="text" class='box' id='nameReg'>
			<div class="isi">Email :</div>
			<input type="email" class='box' id='emailReg'>
			<div class="isi">Password :</div>
			<input type="password" class='box' id='pwdReg'>
			<div style='margin: 10px 0px;'>
				<input type="checkbox" required id='agree'> <label for="agree">Saya setuju dengan syarat & ketentuan</label>
			</div>
			<div class="bag bag-5">
				<button>REGISTER</button>
			</div>
			<div class="bag bag-5">
				<button class='nonCta' type='button' id='tblLog'>OR LOGIN</button>
			</div>
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
	$("#tblLog").klik(() => {
		$("#formReg").hilang()
		$("#formLogin").muncul()
	})
	$("#tblReg").klik(() => {
		$("#formReg").muncul()
		$("#formLogin").hilang()
	})
	submit('#formReg', () => {
		let name 	= $("#nameReg").isi()
		let email 	= $("#emailReg").isi()
		let pwd 	= $("#pwdReg").isi()
		let regist	= "name="+name+"&email="+email+"&pwd="+pwd
		pos("./users/register", regist, (res) => {
			mengarahkan("./register/step-2")
		})
		return false
	})
	submit('#formLogin', () => {
		let email 	= $("#emailLog").isi()
		let pwd 	= $("#pwdLog").isi()
		let login 	= "email="+email+"&pwd="+pwd
		pos("./users/login", login, (res) => {
			if(res == "sukses") {
				mengarahkan("./")
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