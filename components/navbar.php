<nav class="d-flex container py-3 justify-content-between align-items-center">
	<div>
		<a href="./" class="nav-link fw-semibold fs-4">DEEZ GALLERY</a>
	</div>
	<div class="w-50">
		<form action="./index.php">
			<div class="d-flex form-control rounded-pill">
				<input type="text" name="search" class=" w-100 border-0">
				<button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
			
		</form>
		
	</div>
	<div>
		<?php 
		$selectUser = mysqli_query($conn,"SELECT * FROM user WHERE userid = ".$_SESSION['user']['userid']);
		if(mysqli_num_rows($selectUser)){
			$usr = mysqli_fetch_assoc($selectUser);
		?>
			<a href="./profile.php?id=<?=$usr['userid'] ?>">
				<img src="./profile/<?=$usr['profile'] ?> ?>" width="50" height="50" class="rounded-circle" style="object-fit: cover;">
			</a>
		<?php
		}
		 ?>
		
	</div>
</nav>