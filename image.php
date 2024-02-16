<?php
	session_start(); 
	require 'utilities/connect.php';
	if(isset($_GET['id']) && isset($_SESSION['user'])){
		$id = $_GET['id'];
		$getImage = mysqli_query($conn,"SELECT foto.fotoid,foto.judulfoto,foto.deskripsifoto,foto.tanggalunggah,foto.lokasifile,user.userid,user.username,user.namalengkap,user.profile from foto inner join user on foto.userid = user.userid WHERE fotoid = $id");
		if(mysqli_num_rows($getImage)){
			foreach($getImage as $image){
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>IMAGE | DEEZ GALLERY</title>
		<style type="text/css">
			.image-container{
				overflow: hidden;
			}
		</style>
	</head>
	<body>
		<?php require 'components/navbar.php'; ?>
		<div class="d-flex justify-content-center align-items-center ">
			<div class="row w-75 mx-auto shadow rounded-4 mt-5 image-container">
				<section class="col-6 p-0 m-0 ">
					<img src="./images/<?=$image['lokasifile'] ?>" class="w-100 h-100" style="object-fit: cover;">
				</section>
				<section class="col-6 p-5 position-relative">
					<h1><?=$image['judulfoto'] ?></h1>
					<p class=""><?= $image['deskripsifoto'] ?></p>	
					<div class="row">
							 		<section class="col-2">
							 			<a href="./profile.php?id=<?=$image['userid'] ?>"><img src="./profile/<?=$image['profile'] ?>" class="rounded-circle" width="60" height="60" ></a>
							 		</section>
							 		<section class="col-8">
							 			<h5><?= $image['username'] ?></h5>
							 			<p><?= $image['namalengkap'] ?></p>
							 			<span class="text-secondary mt-0"><?=$image['tanggalunggah'] ?></span>
							 		</section>			
					<div class="d-flex justify-content-between mt-5">
					<?php 
						$jumlahKomen = mysqli_query($conn,"SELECT COUNT(komentarid) as jumlahkomen FROM komentarfoto INNER JOIN foto on komentarfoto.fotoid = foto.fotoid WHERE foto.fotoid = $id");
						if(mysqli_num_rows($jumlahKomen)){
							$jumlah = mysqli_fetch_assoc($jumlahKomen)
						
					 ?>
						<h4 class="fw-bold"><?=$jumlah['jumlahkomen'] ?> Comments</h4>
					<?php } ?>
					</div>
					<div class="pb-5">
							<?php 
								$selectComments = mysqli_query($conn,"SELECT * FROM komentarfoto INNER JOIN user on komentarfoto.userid = user.userid WHERE komentarfoto.fotoid = $id ORDER BY tanggalkomentar DESC");
								if(mysqli_num_rows($selectComments)){
									foreach($selectComments as $cmt){
							 ?>
							 	<div class="row">
							 		<section class="col-2">
							 			<a href="./profile.php?id=<?=$cmt['userid'] ?>"><img src="./profile/<?=$cmt['profile'] ?>" class="rounded-circle" width="60" height="60" ></a>
							 		</section>
							 		<section class="col-8">
							 			<h5><?= $cmt['username'] ?></h5>
							 			<p><?= $cmt['isikomentar'] ?></p>
							 			<span class="text-secondary mt-0"><?=$cmt['tanggalkomentar'] ?></span>
							 		</section>
							 		<?php 
							 			if($cmt['userid'] == $_SESSION['user']['userid']){
							 		 ?>
							 		<section class="col-2">
							 			<a href="utilities/comment.php?action=delete&foto=<?=$id ?>&id=<?=$cmt['komentarid'] ?>" class="text-danger" onclick="return alert('Are you sure?')">
							 				<i class="fa-solid fa-trash"></i>
							 			</a>
							 		</section>
							 	<?php } ?>
							 	</div>
							<?php }} ?>
						</div>
					<div class="position-absolute w-100 start-0 px-4 bottom-0 pb-4 bg-white ">
						<section class="">
							<div></div>
							<?php 
								$jumlahlike = mysqli_query($conn,"SELECT COUNT(likeid) as jumlahlike FROM likefoto INNER JOIN foto on likefoto.fotoid = foto.fotoid WHERE foto.fotoid = ".$image['fotoid']);
								$selectUserLike = mysqli_query($conn,"SELECT likefoto.likeid,likefoto.fotoid,likefoto.userid FROM likefoto INNER JOIN foto on likefoto.fotoid = foto.fotoid WHERE likefoto.fotoid = ".$image['fotoid']." AND likefoto.userid = ".$_SESSION['user']['userid']);
								if(mysqli_num_rows($jumlahlike)){
									$jumlah = mysqli_fetch_assoc($jumlahlike);
									
							 ?>
							 <div class="d-flex align-items-center justify-content-end mb-2">
							 	<h4 class="fw-bold"><?=$jumlah['jumlahlike'] ?></h4>
							 	<form action="utilities/like.php" method="POST">
							 		<input type="hidden"hidden value="<?= $image['fotoid'] ?>" name="fotoid">
							 		<input type="hidden"hidden value="<?= $_SESSION['user']['userid'] ?>" name="userid">
							 		<?php
							 		if(mysqli_num_rows($selectUserLike)){
							 			$userLike = mysqli_fetch_assoc($selectUserLike);
							 			if($userLike['userid'] == $_SESSION['user']['userid']){
							 		?>
							 			<input type="hidden" hidden name="likeid" value="<?= $userLike['likeid'] ?>">
							 			<button type="submit" class="btn" name="remove-like"><i class="fa-solid fa-heart fs-3 "></i></button>
							 		<?php }}else{
							 		?>
							 			<button type="submit" class="btn" name="add-like"><i class="fa-regular fa-heart fs-3"></i></button>
							 		<?php
							 		}?>
							 	</form>
							 </div>
								
							<?php } ?>
							<form class="d-flex w-100 justify-content-between align-items-center" action="utilities/comment.php" method="POST">
								<input type="hidden" hidden name="fotoid" value="<?=$image['fotoid'] ?>"> 
								<input type="hidden" hidden name="userid" value="<?=$_SESSION['user']['userid'] ?>">
								<?php 
									$selectUser = mysqli_query($conn,"SELECT * FROM user WHERE userid = ".$_SESSION['user']['userid']);
									if(mysqli_num_rows($selectUser)){
										foreach($selectUser as $user){
								 ?>
								<div>
									<a href="./profile.php?id=<?=$user['userid'] ?>"><img src="./profile/<?=$user['profile'] ?>" class="rounded-circle" width="60" height="60" ></a>
								</div>
								<?php }
								} ?>
								<div class="w-75">
									<input type="text" name="isikomentar" class="form-control w-100 rounded-pill">
								</div>
								<div>
									<button type="submit" name="add-komentar" class="btn"><i class="fa-solid fa-paper-plane fs-4"></i></button>
								</div>
							</form>
						</section>
					</div>
				</section>
			</div>
		</div>
	</body>
	</html>
<?php
		} 
	}
} ?>