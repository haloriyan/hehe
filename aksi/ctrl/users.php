<?php
include 'tools.php';

class users extends tools {
	public function me($e, $kol) {
		$q = EMBO::tabel('user')->pilih($kol)->dimana(['email' => $e])->eksekusi();
		if(EMBO::hitung($q) == 0) {
			$q = EMBO::tabel('user')->pilih($kol)->dimana(['iduser' => $e])->eksekusi();
		}
		return EMBO::ambil($q)[$kol];
	}
	public function update($id, $kol, $val) {
		return EMBO::tabel('user')->ubah([$kol => $val])->dimana(['email' => $id])->eksekusi();
	}
	public function edit() {
		$bag = EMBO::pos('bag');
		if($bag == "verif") {
			$e = $_COOKIE['register'];
			$foto = EMBO::pos('foto');
			$ktp = EMBO::pos('ktp');
			$this->update($e, "photo", $foto);
			$this->update($e, "ktp", $ktp);

			echo "Akun masih dalam proses peninjauan. Akun Anda akan diverifikasi dalam maksimal 2 hari setelah sekarang dan Anda akan mendapatkan notifikasi melalui email";
		}
	}
	public function sesi($auth = NULL) {
		global $baseUrl;
		session_start();
		$sesi = $_SESSION['udana'];
		if($auth != "") {
			if(empty($sesi)) {
				header("location: ".$baseUrl."/auth");
			}
		}
		return $sesi;
	}
	public function login() {
		$e = EMBO::pos('email');
		$p = EMBO::pos('pwd');
		$em = $this->me($e, 'email');
		$pw = $this->me($e, 'password');

		if($e == $em && $p == $pw) {
			session_start();
			$_SESSION['udana']=$e;
			echo "sukses";
		}else {
			echo "Email / Password salah!";
		}
	}
	public function register() {
		$name = EMBO::pos('name');
		$email = EMBO::pos('email');
		$pwd = EMBO::pos('pwd');

		$q = EMBO::tabel('user')
					->tambah([
						'iduser'		=> rand(1, 999),
						'name'			=> $name,
						'email'			=> $email,
						'password'		=> $pwd,
						'registered'	=> time()
					])
					->eksekusi();
		setcookie('register', $email, time() + (3600 * 24), '/');
	}
}

$users = new users();

?>