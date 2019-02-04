<?php
include 'users.php';

class campaigns extends users {
	public function detail($id, $kol) {
		$q = EMBO::tabel('campaign')->pilih($kol)->dimana(['title' => $id, 'LIKE'])->eksekusi();
		return EMBO::ambil($q)[$kol];
	}
	public function create() {
		$title = EMBO::pos('title');
		$desc = EMBO::pos('desc');
		$adaDana = EMBO::pos('adaDana');
		$butuhDana = EMBO::pos('butuhDana');
		$iduser = users::me("riyan.satria.619@gmail.com", "iduser");

		$q = EMBO::tabel('campaign')
					->tambah([
						"idcampaign"	=> rand(1, 999),
						"iduser"		=> $iduser,
						"title"			=> $title,
						"description"	=> $desc,
						"ada_dana"		=> $adaDana,
						"butuh_dana"	=> $butuhDana,
						"created_date"	=> date('Y-m-d'),
						"created"		=> time()
					])
					->eksekusi();
		if($q) {
			echo "sukses";
		}
	}
	public function delete() {
		$id = EMBO::pos('id');
		return EMBO::tabel('campaign')->hapus()->dimana(['idcampaign' => $id])->eksekusi();
	}
	public function my() {
		$myId = users::me(users::sesi(), "iduser");
		$q = EMBO::tabel('campaign')->pilih()->dimana(['iduser' => $myId])->urutkan('created', 'DESC')->eksekusi();
		if(EMBO::hitung($q) == 0) {
			echo "Tidak ada campaign. <a href='#'>Buat sekarang</a>";
		}else {
			while($r = EMBO::ambil($q)) {
				echo "<div class='myCampaign'>".
						"<div class='wrap'>".
							"<h3>".$r['title']."</h3>".
							"<div class='persen'><div class='isi'></div></div>".
							"<div class='ket'><span>30%</span> dari Rp 25.000.000</div>".
							"<div class='tombol'>".
								"<button class='hijau' onclick='detail()'><i class='fas fa-eye'></i></button>".
								"<button class='merah' onclick='hapus(`".$r['idcampaign']."`)'><i class='fas fa-trash'></i></button>".
							"</div>".
						"</div>".
					 "</div>";
			}
		}
	}
	public function seeDetail() {
		$id = EMBO::pos('id');
		$q = EMBO::tabel('campaign')->pilih()->dimana(['idcampaign' => $id])->eksekusi();
	}
	public function cari() {
		$key = EMBO::pos('q');
		$q = EMBO::query("SELECT * FROM campaign WHERE title LIKE '%$key%' OR description LIKE '%$key%' ORDER BY created DESC LIMIT 25");
		if(EMBO::hitung($q) == 0) {
			echo "Campaign tidak ditemukan";
		}else {
			while($r = EMBO::ambil($q)) {
				$creator = users::me($r['iduser'], "name");
				$butuhDana = tools::toIdr($r['butuh_dana']);
				$persen = tools::persen("25000", "150000");
				echo "<div class='myCampaign'>".
						"<div class='wrap'>".
							"<h3><a href='../".tools::convertTitle($r['title'])."'>".$r['title']."</a></h3>".
							"<div class='persen'><div class='isi' style='width: ".$persen."'></div></div>".
							"<div class='ket'><span>".$persen."</span> dari ".$butuhDana."</div>".
							"<div class='atribusi'>".
								"oleh <b>".$creator."</b>".
							"</div>".
						"</div>".
					 "</div>";
			}
		}
	}
}

$campaigns = new campaigns();

?>