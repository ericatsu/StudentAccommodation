<?php

	$con = mysqli_connect('localhost','root','Qwerty@12','studentaccommodation_db');

	if($con == false){
		echo "Connection not successful";
	}
	
	mysqli_set_charset($con,"utf8");
?>
