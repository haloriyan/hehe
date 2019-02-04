<?php
include 'campaigns.php';

class invests extends campaigns {
	public function show() {
		$id = EMBO::pos('idcampaign');
		$q = EMBO::tabel('invest')->pilih()->dimana(['idcampaign' => $id])->eksekusi();
	}
}

$invests = new invests();

?>