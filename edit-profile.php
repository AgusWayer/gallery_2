<?php 
	session_start();
	require 'utilities/connect.php';
	if(!isset($_SESSION['user']) && isset($_GET['id'])){
		header("location: ./login.php");
	}else{
		$userid = $_GET['id'];
		$selectEditedUser = mysqli_query($conn,"SELECT * FROM user where userid = $userid");
		if(mysqli_num_rows($selectEditedUser)){
			$userEdit = mysqli_fetch_assoc($selectEditedUser);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>EDIT PROFILE | DEEZZ</title>
	<style type="text/css">
		.image-container{
			width: fit-content;
			overflow: hidden;
		}
		.edit-absolute{
			cursor: pointer	;
		}
		#img-container img{
			width: 300px;
			height: 300px;
			object-fit: cover;
		}
	</style>
</head>
<body>
	<?php require 'components/navbar.php'; ?>
	<div class="d-flex justify-content-center align-items-center my-5">
		<form action="utilities/login.php"  method="POST" enctype="multipart/form-data" class=" w-50 mx-auto shadow py-5 px-5 rounded-5">
		<section class="">
			<input type="hidden" hidden name="userid" value="<?=$userEdit['userid'] ?>">
			<h3 class="text-center">Edit Profile</h3>
			<div class="text-center image-container rounded-circle position-relative mx-auto">
				<div class="" id="img-container">
					<img src="./profile/<?= $userEdit['profile'] ?>" class="profile">
				</div>
				<label class="d-block position-absolute text-white bottom-0 w-100 py-2 edit-absolute" style="background-color: rgba(0,0,0,.5);" for="profile">
					<h5>Edit Profile</h5>
				</label>
				<input type="file" hidden name="profile" id="profile"  onchange="previewImage('profile','img-container')">
			</div>
			<div class="mb-4">
				<label for="username" class="mb-3 fs-4">Username</label>
				<input id="username" class="w-100 form-control" type="text" name="username" value="<?= $userEdit['username'] ?>">
			</div>
			<div class="mb-4">
				<label for="email" class="mb-3 fs-4">Email</label>
				<input id="email" class="w-100 form-control" type="text" name="email" value="<?= $userEdit['email'] ?>">
			</div>
			<div class="mb-4">
				<label for="namalengkap" class="mb-3 fs-4">Nama Lengkap</label>
				<input id="namalengkap" class="w-100 form-control" type="text" name="namalengkap" value="<?= $userEdit['namalengkap'] ?>">
			</div>
			<div class="mb-4">
				<label for="alamat" class="mb-3 fs-4">Alamat</label>
				<input id="alamat" class="w-100 form-control" type="text" name="alamat" value="<?= $userEdit['alamat'] ?>">
			</div>
			<div>
				<button type="submit" name="edit-user" class="btn btn-danger">Submit</button>
			</div>
		</section>
		</form>
	</div>
	<script type="text/javascript" src="script/image.js"></script>
</body>
</html>
<?php }
} ?>