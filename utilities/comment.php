<?php 
	require 'connect.php';
	if(isset($_POST['add-komentar'])){
		
		$fotoid = $_POST['fotoid'];
		$userid = $_POST['userid'];
		$isikomentar = $_POST['isikomentar'];
		$tanggalkomentar = date('Y-m-d');
		$addComment = mysqli_query($conn,"INSERT INTO komentarfoto VALUES('',$fotoid,$userid,'$isikomentar','$tanggalkomentar')");
		if($addComment){
			header("location: ../image.php?id=".$fotoid);
		}
	}
	
	if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete' && isset($_GET['foto'])){
		$komentarid = $_GET['id'];
		$fotoid = $_GET['foto'];
		$deleteKomen = mysqli_query($conn,"DELETE FROM komentarfoto WHERE komentarid = $komentarid");
		if($deleteKomen){
			header("location: ../image.php?id=$fotoid");
		}
	}
 ?>