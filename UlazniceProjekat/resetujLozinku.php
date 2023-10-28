<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ulaznice | Prodaja ulaznica</title>
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/stil.css">
	<script src="https://kit.fontawesome.com/b8f2d0d180.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/prijava.css">
	<?php  
	$con = new mysqli('localhost' , 'root' , '' , 'ulaznica');
	if($con->error)
		die('Greska' . $con->error);

	// session_start();

	if(isset($_POST['potvrdi']))
	{
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$provera = "SELECT * FROM korisnik WHERE email='$email'";
		$rez = mysqli_query($con, $provera);
		$korisnik = mysqli_fetch_assoc($rez);

		if($korisnik)
		{
			$_SESSION['email'] = $email; 
			header('location: reset.php');
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Uneti email ne postoji!")';
			echo '</script>';
		}
	}

	?>
</head>
<body>
	<div class="container"> <!-- pocetak omotaca -->

		<?php 
		include "php/header.php" ;
		include "php/nav.php" ; 
		?>
		<div class="resetovanje">
			<form method="post" action="resetujlozinku.php">
				<form class="form-inline">
					<div class="form-group">
						<label for="exampleInputName2">Unesite email:</label>
						<input type="text" class="form-control" id="exampleInputName2" name="email" placeholder="Unesite email">

						<button name="potvrdi">Potvrdi</button>
					</div>
				</form>
			</div>
			<?php 
			include "php/footer.php" ;
			?>






		</div> <!-- kraj omotaca -->
	</body>
	</html>