<?php

	$conn = mysqli_connect('localhost','root','Qwerty@12','studentaccommodation_db');

	if($conn == false){
		echo "Connection not successful";
	}
	
	mysqli_set_charset($conn,"utf8");
?>
