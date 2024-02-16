<?php 
	require 'connect.php';
	if(isset($_POST['add-album'])){
		$albumid = rand(1000,5000);
		$namaalbum = $_POST['namaalbum'];
		$userid = $_POST['userid'];
		$deskripsi = $_POST['deskripsi'];
		$tanggaldibuat = date('Y-m-d');
		$addAlbum = mysqli_query($conn,"INSERT INTO album VALUES($albumid,'$namaalbum','$deskripsi','$tanggaldibuat',$userid)");
		if($addAlbum){
			header("location: ../profile.php?id=".$userid);
		}else{
			echo mysqli_error($conn);
		}
	}
	if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])){
		$albumid = $_GET['id'];
		$userid = $_GET['user'];
		$deleteAlbum = mysqli_query($conn,"DELETE foto,album FROM album INNER JOIN foto ON album.albumid = foto.albumid WHERE album.albumid = $albumid");
		if($deleteAlbum){
			header('location: ../profile.php?id='.$userid);
		}else{
			echo mysqli_error($conn);
		}
	}
	if(isset($_POST['edit-album'])){
		$albumid = $_POST['albumid'];
		$namaalbum = $_POST['namaalbum'];
		$userid = $_POST['userid'];
		$deskripsi = $_POST['deskripsi'];
		$addAlbum = mysqli_query($conn,"UPDATE album set namaalbum = '$namaalbum',deskripsi = '$deskripsi' WHERE albumid = $albumid");
		if($addAlbum){
			header("location: ../profile.php?id=".$userid);
		}else{
			echo mysqli_error($conn);
		}
	}
 ?>