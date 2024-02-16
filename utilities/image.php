<?php 
	require('connect.php');
	if(isset($_POST['addPhoto']) && isset($_FILES['lokasifile'])){
		$fotoid = rand(1000,5000);
		$judulfoto = $_POST['judulfoto'];
		$deskripsifoto = $_POST['deskripsifoto'];
		$tanggalunggah = date('d-m-Y');
		$albumid = $_POST['albumid'];
		$userid = $_POST['userid'];
		$tmp_name = $_FILES['lokasifile']['tmp_name'];
		$name = $_FILES['lokasifile']['name'];
		$filetype = explode('.', strtolower($name));
		$size = $_FILES['lokasifile']['size'];
		$types = ['jpg','jpeg','png','webp'];
		if(!in_array(end($filetype), $types)){
			echo "Bukan Image!";
		}else{
			if($size > 500000){
				echo "Size Kegedean!";
			}else{
				$lokasifile = date('Y-m-d')."$name";
				move_uploaded_file($tmp_name, '../images/'.$lokasifile);
				$insertImage = mysqli_query($conn,"INSERT INTO foto VALUES($fotoid,'$judulfoto','$deskripsifoto','$tanggalunggah','$lokasifile',$albumid,$userid)");
				if($insertImage){
					header("location: ../index.php");
				}else{
					mysqli_error($conn);
				}
			}
		}
		
		// mysqli_query($conn,"INSERT")
	}
	if(isset($_GET['action']) && $_GET['action'] == "delete" && isset($_GET['id'])){
		$fotoid = $_GET['id'];
		$deleteFoto = mysqli_query($conn,"DELETE foto FROM foto  WHERE foto.fotoid = $fotoid ");
		if($deleteFoto){
			header("location: ../index.php");
		}else{
			echo mysqli_error($conn);
		}
	}
 ?>