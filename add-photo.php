<?php 
	session_start();
	require 'utilities/connect.php';
	if(!isset($_SESSION['user'])){
		header("location: ./login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>UPLOAD IMAGE | DEEZZ</title>
	<style type="text/css">
		.upload{
			border-style: dashed !important;
			width: 100%;
			height: 100%;
		}
		.image-preview{
			height: 100%;
			width: 100%;
			object-fit: contain;
		}
	</style>
</head>
<body>
	<?php require 'components/navbar.php'; ?>
	<div class="d-flex justify-content-center align-items-center">
		<form action="utilities/image.php" enctype="multipart/form-data" method="POST" class="row w-75 mx-auto shadow py-5 px-5">
			<input type="hidden" hidden name="userid" value="<?= $_SESSION['user']['userid'] ?>">
		<section class="col-6">
			<label class="border border-3 rounded-3 upload d-flex justify-content-center align-items-center h-100 text-secondary" for="photo" id="img-container">
				<div class="text-center">
					<i class="fa-solid mb-3 fa-upload fs-1"></i>
					<p>Upload a Photo</p>
				</div>
			</label>
			<input type="file" name="lokasifile" hidden id="photo" onchange="previewImage('photo','img-container')">
		</section>
		<section class="col-6">
			<h3>Upload Foto</h3>
			<div class="mb-4">
				<label for="judulfoto" class="mb-3 fs-4">Judul</label>
				<input id="judulfoto" class="w-100 form-control" type="text" name="judulfoto" required>
			</div>
			<div class="mb-4">
				<label for="deksripsi" class="mb-3 fs-4">Deskripsi</label>
				<input id="deskripsi" class="w-100 form-control" type="text" name="deskripsifoto" required>
			</div>
			<div >
				<label for="album" class="mb-3 fs-4">Album</label>
				<select name="albumid" class="form-control mb-4" id="album" required>
					<option selected hidden>Album</option>
					<?php 
						$selectAlbums = mysqli_query($conn,"SELECT * FROM album where userid =".$_SESSION['user']['userid']);
						if(mysqli_num_rows($selectAlbums)){
							foreach($selectAlbums as $album){
					 ?>
					 	<option value="<?= $album['albumid'] ?>"><?= $album['namaalbum'] ?></option>
					 <?php 							
							}
						} ?>
				</select>
			</div>
			<div>
				<button type="submit" name="addPhoto" class="btn btn-danger">Submit</button>
			</div>
		</section>
		</form>
	</div>
	<script type="text/javascript" src="script/image.js"></script>
</body>
</html>