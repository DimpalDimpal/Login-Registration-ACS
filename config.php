<?php
	$server = "localhost";
	$user = "root";
	$psw = "";
	$database = "userregistration";

	$con = new mysqli($server, $user, $psw, $database);

	if(!$con){
		echo "error while establishing db conn";
		exit();
	}
	
?>