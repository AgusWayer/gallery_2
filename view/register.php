<form action="./utilities/login.php" method="POST" enctype="multipart/form-data" class="w-100">
<div class="row w-100 p-4">

		<section class="col-6 ">
			<label class="border border-3 rounded-3 upload d-flex justify-content-center align-items-center h-100 text-secondary" for="photo" id="img-container">
				<div class="text-center">
					<i class="fa-solid mb-3 fa-upload fs-1"></i>
					<p>Upload a Profile</p>
				</div>
			</label>
			<input type="file" name="profile" hidden id="photo" onchange="previewImage('photo','img-container')">
		</section>
	<section class="input col-6 d-flex align-items-center">
		<div class="w-75">
			<h1>Register </h1>
			
				<div>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control mb-4">
				</div>
				<div>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control mb-4">
				</div>
				<div>
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control mb-4">
				</div>
				<div>
					<label for="namalengkap">Nama Lengkap</label>
					<input type="text" name="namalengkap" id="namalengkap" class="form-control mb-4">
				</div>
				<div>
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control mb-4">
				</div>
				<div>
					<button type="submit" class="btn btn-primary px-4 py-2 fw-semibold mb-3" name="register">Register</button>
				</div>
			</form>
			<div>
				<p>Already Have Account? <a href="./login.php">Login</a> Here</p>
			</div>
		</div>
		
	</section>
</div>