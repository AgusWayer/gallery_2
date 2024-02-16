<?php
	session_start();
	require('utilities/connect.php'); 
	if(!isset($_SESSION['user'])){
		header("location: ./login.php");
	}else{
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<title>Gallery Foto</title>
</head>
<body>
	<?php require 'components/navbar.php'; ?>
	<?php if(isset($_GET['album'])){
				$albumid = $_GET['album'];
				$getAlbumName = mysqli_query($conn,"SELECT namaalbum,deskripsi from album WHERE albumid = $albumid");
				if(mysqli_num_rows($getAlbumName)){
					$albumName = mysqli_fetch_assoc($getAlbumName);
				
			?>
			<div class="text-center">
				<h1><?= $albumName['namaalbum']?></h1>
				<p class="fs-5"><?=$albumName['deskripsi'] ?></p>
			</div>
			
		<?php }} ?>
	<div class="masonry-layout container-fluid px-4 mx-auto">
		
		<?php 
			if(isset($_GET['search'])){
				$search = $_GET['search'];
				$getImages = mysqli_query($conn,"SELECT * FROM foto inner join album on foto.albumid = album.albumid WHERE foto.judulfoto LIKE '%$search%' OR album.namaalbum LIKE '%$search%'");
			}else if(isset($_GET['album'])){
				$albumid = $_GET['album'];
				$getImages = mysqli_query($conn,"SELECT foto.fotoid, foto.lokasifile,foto.userid from foto inner join album on foto.albumid = album.albumid where foto.albumid = $albumid");
			}else{
				$getImages = mysqli_query($conn,"SELECT * FROM foto");
			}
			if(mysqli_num_rows($getImages)){
				foreach($getImages as $img){
		 ?>

		 <div class="masonry-item position-relative rounded-4">
		 		<a href="./image.php?id=<?=$img['fotoid'] ?>" class="link-overlay"></a>
		 		<img src="./images/<?=$img['lokasifile'] ?>" class="w-100" id="<?=$img['fotoid'] ?>">
			 	<div class="position-absolute overlay w-100 text-white  justify-content-end px-4 h-100 top-0 align-items-end pb-3">
		 		</div>
		 		<div class=" justify-content-end icons-container m-2">
			 		<span class="icon-container me-2">
				 		<a href="./images/<?=$img['lokasifile'] ?>" class="nav-link text-white" download ><i class="fa-solid fa-download"></i></a>
				 	</span>
			 	<?php 
			 		if($img['userid'] == $_SESSION['user']['userid']){
			 		?>
			 		 <span class="icon-container">
			 		 	<a href="utilities/image.php?action=delete&id=<?=$img['fotoid'] ?>" onclick="return alert('are you sure?')" class="nav-link text-white" ><i class="fa-solid fa-trash"></i></a>
			 		 </span>
			 	<?php } ?>
			 	</div>
		 </div>
		 
		<?php 
				} 
			}?>
	</div>
	<div class="position-absolute end-0 bottom-0" style="z-index: 99;">
		<a href="./add-photo.php" class="fs-2 m-5 button-add bg-danger rounded-circle d-flex justify-content-center align-items-center text-decoration-none text-white">
			<i class="fa-solid fa-plus"></i>
		</a>
	</div>
</body>
</html>

 <?php } ?>