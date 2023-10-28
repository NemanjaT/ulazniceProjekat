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


			<form action="adminDogadjaji.php" method="post" enctype="multipart/form-data">
				<div class="input-group">
					<span class="input-group-btn">
						<button class="btn btn-success" name="dodaj" type="submit"><a href="newdogadjaj.php" id="dugme">Dodaj novi dogadjaj</a></button>
					</span>
				</div>

				<?php 

				$naziv = '';
				$brMesta = '';
				$cenaUlaznice = '';
				$slika = '';
				$opis = '';
				$kategorijaid = '';
				$id = '';

				$con = new mysqli('localhost','root', '', 'ulaznica');
				if($con->error)
					die("Greska" . $con->error);

				$rez = mysqli_query($con,"SELECT * FROM dogadjaj");
				?>
				<table class='table table-striped'>

					<tr>

						<th>ID dogadjaja</th>
						<th>Naziv dogadjaja</th>
						<th>Cena Ulaznice</th>
						<th>Slika</th>
						<th>Kratak opis</th>
						<th>ID kategorije</th>
						<th>Broj Mesta</th>
						<th></th>
						<th></th>

					</tr>
					<?php  
					while($red = mysqli_fetch_array($rez))
					{
						?>
						<tr>
							<td><?php echo $red['idDogadjaj']; ?></td>
							<td><?php echo $red['naziv']; ?></td>
							<td><?php echo $red['cenaUlaznice']; ?></td>  
							<td><?php echo"<img src=img/".$red['slika']." class='rounded-circle' width='300px'> ";?> </td>
							<td><?php echo $red['opis']; ?></td>
							<td><?php echo $red['kategorija_id']; ?></td>
							<td><?php echo $red['broj_mesta']; ?></td>
							<td><a href="izmeni.php?id=<?php echo $red['idDogadjaj']; ?>" class="btn btn-info btn-sm">Izmeni</a></td>
							<td><a href="obrisi.php?id=<?php echo $red['idDogadjaj']; ?>" class="btn btn-danger btn-sm">Ukloni</a></td>

						</tr>	
						<?php
					}

					
					mysqli_close($con);
					?>
				</table>



				
				
			</form>

		</div>
	</body>