<?php 
	$host = 'localhost';
	$username = 'root';
	$pw = '';
	$db = 'gallery';
	$conn = mysqli_connect($host,$username,$pw,$db);
	if(!$conn){
		echo mysqli_error($conn);
	}

 ?>