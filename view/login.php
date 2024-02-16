<div class="row w-100 ">
	<section class="image col-6">
		<img src="./assets/image-login.jpg" class="img">
	</section>
	<section class="input col-6 d-flex align-items-center">
		<div class="w-75">
			<h1>Login First</h1>
			<form action="./utilities/login.php" method="POST">
				<div>
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control mb-4">
				</div>
				<div>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control mb-4">
				</div>
				<div>
					<button type="submit" class="btn btn-primary px-4 py-2 fw-semibold mb-4" name="login">Login</button>
				</div>	
			</form>
			<div>
				<p>Don't have an account yet? <a href="./login.php?view=register">Register</a> Here</p>
			</div>
		</div>
	</section>
</div>