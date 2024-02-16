<?php 
	session_start();
	require 'utilities/connect.php';
	if(!isset($_SESSION['user']) && !isset($_GET['id'])){
		header("location: ./login.php");
	}else{
		$albumid = $_GET['id'];
		$getAlbum = mysqli_query($conn,"SELECT * FROM album where albumid = $albumid");
		if(mysqli_num_rows($getAlbum)){
			$album = mysqli_fetch_assoc($getAlbum);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>ADD ALBUM | DEEZZ</title>
	<style type="text/css">

	</style>
</head>
<body>
	<?php require 'components/navbar.php'; ?>
	<div class="d-flex justify-content-center align-items-center">
		<form action="utilities/album.php"  method="POST" class=" w-50 mx-auto shadow py-5 px-5">
			<input type="hidden" hidden name="albumid" value="<?= $_GET['id'] ?>">
			<input type="hidden" hidden name="userid" value="<?= $_SESSION['user']['userid'] ?>">
		<section class="">
			<h3 class="text-center">Edit Album</h3>
			<div class="mb-4">
				<label for="judulfoto" class="mb-3 fs-4">Nama Album</label>
				<input id="judulfoto" class="w-100 form-control" type="text" name="namaalbum" value="<?= $album['namaalbum'] ?>" required>
			</div>
			<div class="mb-4">
				<label for="deksripsi" class="mb-3 fs-4">Deskripsi</label>
				<input id="deskripsi" class="w-100 form-control" type="text" name="deskripsi" value="<?= $album['deskripsi'] ?>" required>
			</div>
			<div>
				<button type="submit" name="edit-album" class="btn btn-danger">Submit</button>
			</div>
		</section>
		</form>
	</div>
	<script type="text/javascript" src="script/image.js"></script>
</body>
</html>
<?php 
	}
} ?>