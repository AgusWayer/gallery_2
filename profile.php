<?php 
	session_start();
	require 'utilities/connect.php';	
	if(isset($_SESSION['user']) && isset($_GET['id'])){
		$id = $_GET['id'];
		$selectUser = mysqli_query($conn,"SELECT * FROM user WHERE userid = $id");
		if(mysqli_num_rows($selectUser)){
			$user = mysqli_fetch_assoc($selectUser);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>PROFILE</title>
	<style type="text/css">
		.profile{
			width: 300px;
			height: 300px;
			border-radius: 100%;
			object-fit: cover;
		}
		.button-add{
			width: 80px;
			height: 80px;
		}
		.album-container{
			height: 300px;
			overflow: hidden;
		}
		.album-container img {
			object-fit: cover;
		}
		.overlay{
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, .5);
			top: 0;

		}
	</style>
</head>
<body>
	<?php require 'components/navbar.php'; ?>
	<div class="container my-5">
		<div class="text-center">
			<img src="./profile/<?= $user['profile'] ?>" class="profile">
			<h1><?= $user['namalengkap'] ?></h1>
			<p class="text-secondary fs-5"><?= $user['username'] ?></p>
			<?php
				if($user['userid'] == $_SESSION['user']['userid']){
			 ?>
				<div>
					<a href="./edit-profile.php?id=<?= $user['userid']?>" class="btn  rounded-pill px-4 py-2 fs-5 fw-semibold ">Edit Profile</a>
					<a href="./utilities/logout.php" class="btn btn-danger rounded-pill px-4 py-2 fs-5 fw-semibold ">Logout</a>
				</div>
			<?php } ?>
		</div>
		<div class="mt-5">
			<h5 class="text-center ">Album Created</h5>
			<div class="row gap-2">
				<?php
				$selectAlbums = mysqli_query($conn,"SELECT * FROM album where album.userid = $id");
				if(mysqli_num_rows($selectAlbums)){
					foreach($selectAlbums as $album){
				 ?>
				<section class="col-3">
					<?php 
						$selectThumb = mysqli_query($conn,"SELECT foto.fotoid,foto.lokasifile,album.albumid,album.namaalbum FROM foto inner join album on  foto.albumid = album.albumid inner join user on foto.userid = user.userid where user.userid = $id AND album.albumid = ".$album['albumid']." LIMIT 3");
						if(mysqli_num_rows($selectThumb)){
							$thumbs = [];
							foreach ($selectThumb as $thumb) {
								array_push($thumbs, $thumb);
							}
					 ?>
					 <a class=""href="./index.php?album=<?= $album['albumid'] ?>">
					 		<div class="row album-container rounded-4 position-relative">
								<section class="col-6 p-0 h-100">
									<img src="./images/<?=$thumbs[0]['lokasifile'] ?>" class="h-100 w-100">
								</section>
								<section class="col-6 p-0 h-100">
									<div class="d-flex flex-column h-100">
										<img src="./images/<?php
										if(isset($thumbs[1])){
											echo $thumbs[1]['lokasifile'];
										}else{
											echo "no-profile.jpg	";
										}
										 ?>" class="h-100 w-100">
										<img src="./images/<?php
										if(isset($thumbs[2])){
											echo $thumbs[2]['lokasifile'];
										}else{
											echo "no-profile.jpg	";
										}
										 ?>" class="h-100 w-100">
									</div>
								</section>
								
							</div>
							
					 </a>
				<?php 
				} ?>
					<div class="d-flex align-items-center mt-3">
						<p class="fs-5 m-0"><?= $album['namaalbum'] ?></p>
						<?php 
							if($_SESSION['user']['userid'] == $_GET['id']){
						 ?>
						<a href="./edit-album.php?id=<?=$album['albumid'] ?>" class="ms-4 text-black"><i class="fa-solid fa-pen fs-5"></i></a>
						<a href="utilities/album.php?action=delete&id=<?=$album['albumid'] ?>&user=<?=$_GET['id'] ?>" class="ms-4 text-danger" onclick="return confirm('are you sure? This Will Delete The Entire Photos')"><i class="fa-solid fa-trash fs-5"></i></a>
						<?php } ?>
					</div>
					<div></div>
				</section>
				<?php 
					}
				}
				 ?>
			</div>
		</div>
	</div>
	<div class="position-absolute end-0 bottom-0">
		<a href="./add-album.php" class="fs-2 m-5 button-add bg-warning rounded-circle d-flex justify-content-center align-items-center text-decoration-none text-white">
			<i class="fa-solid fa-plus"></i>
		</a>
	</div>
</body>
</html>
<?php }
} ?>