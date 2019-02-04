<?php
include 'EMBO.php';

class tools extends EMBO {
	public function toIdr($angka) {
		return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
	}
	public function persen($needle, $haystack) {
		$hitung = $needle / $haystack * 100;
		$h = explode(".", $hitung);
		return $h[0].".".substr($h[1], 0,2)."%";
	}
	public function convertTitle($title) {
		$cek = strpos($title, "-");
		if($cek > 0) {
			$res = implode(" ", explode("-", $title));
		}else {
			$res = implode("-", explode(" ", $title));
			$res = strtolower($res);
		}
		return $res;
	}
}

$tools = new tools();

?>