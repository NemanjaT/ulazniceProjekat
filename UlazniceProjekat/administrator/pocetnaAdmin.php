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
			<h1><a href="img/logo.png"><img id="logo" src="img/logo.png" alt="Ulaznice Logo"></a><small id="tekst">Prodaja ulaznica za sve vrste dogadjaja</small></h1>
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
			<h1 align="center">Admin panel</h1><br>

			<div class="row" align="center">
               
				
					<h2 class="page-header">Registrovani korisnici</h2>
					<form action="pocetnaAdmin.php", method="post" enctype="multipart/form-data" >

					</form>
                     <div class="tabela">
					<?php
					$con= new mysqli('localhost', 'root', '', 'ulaznica');
    
					if($con->error)
						die("Greska".$con->error);

                  

					$result = mysqli_query($con,"SELECT * FROM korisnik");
					echo"<table class='table table-striped'>

					<tr>
					<th>Šifra korisnika</th>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Grad</th>
					<th>Email</th>
					<th>Username</th>
					</tr>";
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr><td>" . $row['id'] . "</td><td> " . $row['ime'] . "</td><td> " . $row['prezime'] . "</td><td> " . $row['grad'] . "</td><td> " . $row['email'] . "</td><td> " . $row['username'] . "</td></tr>";

					}
					echo"</table>";
					mysqli_close($con);
					?>
</div>
				</div>
		
</div>

		</body>
		</html>