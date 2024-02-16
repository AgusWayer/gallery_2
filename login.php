<?php 
	session_start();
	require('utilities/connect.php');
	if(isset($_SESSION['user'])){
		header("location: ./index.php");
	}else{
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Gallery</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<body>
	<div class="d-flex align-items-center vh-100">
		<div class="body-contain shadow mx-auto rounded-5  d-flex align-items-center">
			<?php 
			if(!isset($_GET['view'])){
				require('view/login.php') ;
			}else{
				require('view/register.php');
			}
			
			?>
		</div>
	</div>
	<script type="text/javascript" src="script/image.js"></script>
</body>
</html>
<?php } ?>