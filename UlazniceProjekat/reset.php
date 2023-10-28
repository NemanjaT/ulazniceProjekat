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
	<script src="https://kit.fontawesome.com/b8f2d0d180.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/stil.css">
	<?php  	
	$con = new mysqli('localhost' , 'root' , '' , 'ulaznica');
	if($con->error)
		die('Greska' . $con->error);

	// session_start();

	$zahtevemail = $_SESSION['email'];
	$username = "SELECT * FROM korisnik where email='$zahtevemail'";
	$rez = $con->query($username);
	if($res=$rez->fetch_assoc())
	{
		$korisnik = $res['username'];
	}

	if(isset($_POST['btnPromeni']))
	{
		if($_POST['lozinka1'] == $_POST['lozinka2'])
		{
			$novalozinka = $_POST['lozinka1'];
			$upit = "UPDATE korisnik SET lozinka='$novalozinka' WHERE email='$zahtevemail'";

			$rezultat = $con->query($upit);
			if($rezultat)
			{
				echo "<script type='text/javascript'>
				alert('Uspesno promenjeno');
				location='log.php';
				</script>";

			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Neuspesno menjanje lozinke!")';
				echo '</script>';
			}
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Dve unete lozinke se ne poklapaju!")';
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
			<form method="POST" action="reset.php">
				<h3>Promena lozinke za nalog <?php echo "$korisnik"; ?></h3>
				<label><b>Unesite novu lozinku</b></label>
			</br>
			<input type="password" name="lozinka1" required>
		</br>
		<label><b>Unesite ponovo novu lozinku</b></label>
	</br>
	<input type="password"  name="lozinka2" required>
</br>

<br>
<button name="btnPromeni">Promeni lozinku</button>
</form>
</div>
<?php 
include "php/footer.php" ;
?>






</div> <!-- kraj omotaca -->
</body>
</html>