<?php 
	require 'connect.php';
	if(isset($_POST['add-like'])){
		$likeid = rand(1000,5000);
		$fotoid = $_POST['fotoid'];
		$userid = $_POST['userid'];
		$tanggallike = date('Y-m-d');
		$upLike = mysqli_query($conn,"INSERT INTO likefoto VALUES($likeid,$fotoid,$userid,'$tanggallike')");
		if($upLike){
			header('location: ../image.php?id='.$fotoid);
		}
	}
	if(isset($_POST['remove-like'])){
		$likeid = $_POST['likeid'];
		$fotoid = $_POST['fotoid'];
		echo "$likeid";
		$delete = mysqli_query($conn,"DELETE FROM likefoto WHERE likeid = $likeid");
		if($delete){
			header("location: ../image.php?id=".$fotoid = $_POST['fotoid']);
		}
	}

 ?>