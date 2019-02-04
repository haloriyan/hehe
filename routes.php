<?php

/*
	* Embo automate Routing
	* Created by Riyan Satria - (c) 2018
*/

error_reporting(1); // Comment this if you are in development mode and please dont edit this
$role = $_GET['role'];
$bag = $_GET['bag'];

if($role == "" and $bag == "") {
	include 'index.php';
}else if($role == "") {
	$lokasi = 'pages/'.$bag.'.php';
	if(file_exists($lokasi)) {
		include $lokasi;
	}else {
		// header("location: ./error/404");
		include 'pages/read.php';
	}
}else if($bag == "") {
	$lokasi = 'pages/'.$role.'/dasbor.php';
	if(file_exists($lokasi)) {
		include $lokasi;
	}else {
		$lokasi = 'pages/'.$role.'/index.php';
		if(file_exists($lokasi)) {
			include $lokasi;
		}else {
			header("location: ../error/404");
		}
	}
}else {
	$control = $role;
	$controller = "aksi/ctrl/".$control;
	$fungsi = $bag;
	$lokasi = 'pages/'.$role.'/'.$bag.'.php';
	if(file_exists($lokasi)) {
		include $lokasi;
	}else {
		if($role == "pages") {
			include 'pages/readPage.php';
		}else if($role == "profile"){
			include 'pages/profile.php';
		}else if($role == "explore") {
			$tentang = $bag;
			include 'pages/explore.php';
		}else {
			if(file_exists($controller.".php")) {
				include $controller.".php";
				if(method_exists($$control, $fungsi)) {
					$$control->$fungsi();
				}else {
					die('Function not found');
				}
			}else {
				die('Controller not found');
			}
		}
	}
}