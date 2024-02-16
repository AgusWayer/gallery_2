<?php 
	session_start();
	require('connect.php');
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$getUser = mysqli_query($conn,"SELECT * FROM user where username = '$username' AND password = '$password'");
		if(mysqli_num_rows($getUser)){
			$_SESSION['user'] = mysqli_fetch_assoc($getUser);
			header("location: ../index.php");
		}else{	
			echo "Username atau Password Salah";
		}
	}
	if(isset($_POST['register']) && isset($_FILES['profile'])){
		$userid = rand(1000,5000);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$namalengkap = $_POST['namalengkap'];
		$alamat = $_POST['alamat'];
		$tmp_name = $_FILES['profile']['tmp_name'];
		$types = ['jpg','jpeg','png','webp'];
		$name = $_FILES['profile']['name'];
		$filetype = explode('.', strtolower($name));
		$getusername = mysqli_query($conn,"SELECT * from user where username = '$username'");
		if(mysqli_num_rows($getusername)){
			echo "Username sudah ada";
		}else{
			if(in_array(end($filetype), $types)){
					$profile = date('Y-m-d')."$name";
					move_uploaded_file($tmp_name, '../profile/'.$profile);
					$addUser = mysqli_query($conn,"INSERT INTO user VALUES($userid,'$username','$password','$profile','$email','$namalengkap','$alamat')");
					if($addUser){
						header("location: ../login.php?msg=login%20berhasil");
					}else{
						echo mysqli_error($conn);
					}
			}else{
				echo "type nya salah";
			}
		}

	}

	if(isset($_POST['edit-user'])){
		$userid = $_POST['userid'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$namalengkap = $_POST['namalengkap'];
		$alamat = $_POST['alamat'];
		
		if($_FILES['profile']['tmp_name']){
			var_dump($_FILES['profile']);
			$tmp_name = $_FILES['profile']['tmp_name'];
			$types = ['jpg','jpeg','png','webp'];
			$name = $_FILES['profile']['name'];
			$filetype = explode('.', strtolower($name));
			if(in_array(end($filetype), $types)){
				$profile = date('Y-m-d')."$name";
				move_uploaded_file($tmp_name, '../profile/'.$profile);
				$editUser = mysqli_query($conn,"UPDATE user SET username = '$username',profile='$profile',email = '$email',namalengkap = '$namalengkap',alamat ='$alamat' WHERE userid = $userid");
				if($editUser){
					header("location: ../profile.php?id=$userid");
				}else{
						echo mysqli_error($conn);
					}
			}else{
				echo "type nya salah";
			}
		}else{
			$editUser = mysqli_query($conn,"UPDATE user SET username = '$username',email = '$email',namalengkap = '$namalengkap',alamat ='$alamat' WHERE userid = $userid");
			if($editUser){
				header("location: ../profile.php?id=$userid");
			}else{
				echo mysqli_error($conn);
			}
		}
		

	}

 ?>