<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ulaznice | Administratorska strana</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="https://kit.fontawesome.com/b8f2d0d180.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/mojStil.css">



	<?php 

	$naziv = '';
	$id = '';

	$con = new mysqli('localhost','root', '', 'ulaznica');
	if($con->error)
		die("Greska" . $con->error);

	if(isset($_POST['dodaj']))
	{
		$naziv = $_POST['ime'];
		if($naziv)
		{
			$upit = "INSERT INTO kategorije(naziv) value ('$naziv')";
			$rez = $con->query($upit);
			echo '<script language="javascript">';
			echo 'alert("Uspesno ste dodali novu kategoriju!")';
			echo '</script>';
		}
		
		header('Refresh: 2; URL = adminKategorije.php');
	}
	 if(isset($_POST['obrisi']))
	{
		$id = $_POST['id'];
		$delete = "delete from kategorije where idKategorija='$id'";
		$del = mysqli_query($con,$delete);
		if(mysqli_affected_rows($con) > 0)
		{
			
			mysqli_close($con);
			echo '<script language="javascript">';
			echo 'alert("Uspesno ste obrisali  kategoriju!")';
			echo '</script>';

		}
		else
			echo '<script language="javascript">';
			echo 'alert("Ne postoji kategorija sa unetim id-em!")';
			echo '</script>';
		
		header('Refresh: 2; URL = adminKategorije.php');
	}
	?>


</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1><a id="logo" href="img/logo.png"><img src="img/logo.png" alt="Ulaznice Logo"></a><small id="tekst">Prodaja ulaznica za sve vrste dogadjaja</small></h1>
		</div>
		<nav class="navbar navbar-default"> <!-- pocetak navigacije -->
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">

						<li><a href="pocetnaAdmin.php">Pocetna strana</a></li>
						<li><a href="adminDogadjaji.php">Dogadjaji</a></li>
						<li><a href="adminKategorije.php">Kategorije</a></li>

					</ul>


					<ul class="nav navbar-nav navbar-right">
						
						<li><a href="../index.php">Vrati se na korisnicku stranu</a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
			<div class="row">
				<div class="col-md-6">
					<form action="adminKategorije.php" method="post" enctype="multipart/form-data">
						<div class="input-group">
							<h3 class="page-header">Dodavanje nove kategorije</h3>



							<input required type="text" name="ime" placeholder="Unesite ime za novu kategoriju" value="<?php echo $naziv; ?>"><br><br>
							<button class="btn btn-success" name="dodaj" type="submit">Dodaj</button>

						</div>
					</form>

					<form action="adminKategorije.php" method="post" enctype="multipart/form-data">
						<div class="input-group">
							<h3 class="page-header">Brisanje kategorije</h3>



							<input required type="text" name="id" placeholder="Unesite id kategorije koju brisete" value="<?php echo $id; ?>"><br><br>
							<button class="btn btn-danger" name="obrisi" type="submit">Obrisi</button>

						</div>
					</form>

				</div>
				<div class="col-md-6">
					<h3 class="page-headerw">Postojece kategorije</h3>
					<?php
					$con= new mysqli('localhost', 'root', '', 'ulaznica');
    // Check connection
					if($con->error)
						die("Greska".$con->error);



					$result = mysqli_query($con,"SELECT * FROM kategorije");
					echo"<table class='table table-striped'>

					<tr>
					<th>Šifra kategorije</th>
					<th>Naziv kategorije</th>
					</tr>";
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr><td>" . $row['idKategorija'] . "</td><td> " . $row['naziv'] . "</td></tr>";

					}
					echo"</table>";
					mysqli_close($con);
					?>
				</div>
			</div>
		</div>