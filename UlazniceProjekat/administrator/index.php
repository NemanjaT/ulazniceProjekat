<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ulaznice | Administratorska strana</title>
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="https://kit.fontawesome.com/b8f2d0d180.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/adminStil.css">
</head>
<body>
	

		<form action="index.php" method="post">
<div class="container">
			<?php 

			$con = new mysqli("localhost" , "root", "", "ulaznica");
			if($con->error)
			{
				die('Greska' . $mysqli->error);

				$sifra = "";
			}

			if(isset($_POST['login']))
			{
				$upit = "SELECT * FROM administrator WHERE user LIKE '".$_POST['user']. "' ";
				$rez =  $con->query($upit);
				if($res=$rez->fetch_assoc())
				{
					$sifra = $_POST['psw']; 
					if($res['password'] == $sifra)
					{
						header("location: pocetnaAdmin.php");
					}
					else
					{
						?>
						<div class="alert allert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
							<strong>Pogresna lozinka</strong></div>
							<?php  
						}
					}
					else
					{
						?>
						<div class="alert allert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
							<strong>Pogresan username</strong></div>

							<?php  
						}
					}

					?>

					
        <div class="imgcontainer">
 <img src="/administrator/img/admin.png">
</div>

<div class="container">
  <label for="uname"><b>Korisničko ime</b></label>
  <input type="text" placeholder="Unesi korisničko ime" name="user" required>

  <label for="psw"><b>Lozinka</b></label>
  <input type="password" placeholder="Unesi lozinku" name="psw" required>

  <button type="submit" name="login">Uloguj se</button>
  
</div>
				</form>







	   
		</body>
		</html>