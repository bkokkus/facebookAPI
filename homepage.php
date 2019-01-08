<?php 
	session_start();

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	} else {
		header("location:index.php");
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Facebook ile login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 well">
					
				<div class="col-md-2">
					<img src="<?php echo $user['profile_picture']?>" alt='' class="img-responsive img-circle">
					<a href="logout.php">Çıkış Yap</a>
				</div>

				<div class="col-md-10">
					<div>
						<strong>Kullanıcı Adı : </strong> <?php echo $user["name"]; ?>
					</div>
					<div>
						<strong>Kullanıcı Id : </strong> <?php echo $user["id"]; ?>
					</div>
					<div>
						<strong>Kullanıcı E-mail : </strong> <?php echo $user["email"]; ?>
					</div>
				</div>

			</div>
		</div>
	</div>


</body>
</html>