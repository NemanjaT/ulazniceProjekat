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
	$brMesta = '';
	$cenaUlaznice = '';
	$slika = '';
	$opis = '';
	$kategorijaid = '';
	

	$con = new mysqli('localhost','root', '', 'ulaznica');
	if($con->error)
		die("Greska" . $con->error);

	if(isset($_POST['dodaj']))
	{
		$naziv = $_POST['naziv'];
		$brMesta = $_POST['brMesta'];
		$cenaUlaznice = $_POST['cenaUlaznice'];
		$slika = $_FILES['upload']['name'];
		$opis = $_POST['opis'];
		$kategorijaid = $_POST['kategorija'];
		
      if(!($naziv) || !($brMesta) || !($cenaUlaznice) || !($slika) || !($opis) || (!$kategorijaid))
      {
      	echo '<script language="javascript">';
			echo 'alert("Morate popuniti sva polja!")';
			echo '</script>';
      }
      else
      {
		$red = "INSERT INTO dogadjaj(naziv,broj_mesta,cenaUlaznice,slika,opis,kategorija_id) value ('$naziv','$brMesta' , '$cenaUlaznice' , '$slika', '$opis', '$kategorijaid')";
		$rez = $con->query($red);


        if($rez)
        {
        	echo '<script language="javascript">';
			echo 'alert("Uspesno ste dodali novi dogadjaj!")';
			echo '</script>';
        }
        else
        {
        	echo '<script language="javascript">';
			echo 'alert("Greska prilikom dodavanja novog dogadjaja!!")';
			echo '</script>';
        }
		header('Refresh: 1; URL = adminDogadjaji.php');
	}
}

	?>

</head>

<body>
	<div class="container">
		<div class="page-header">
			<h1><a href="img/logo.png"><img src="img/logo.png" alt="Ulaznice Logo"></a><small>Prodaja ulaznica za sve vrste dogadjaja</small></h1>
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
						
						<li><a href="log.php"><i class="fas fa-user-circle fa-2x"></i></a></li>
						<li><a href="" title="Korpa" class="color-me"><i class="fas fa-shopping-cart fa-2x"></i></a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>

			<form action="newdogadjaj.php", method="post" enctype="multipart/form-data">

				<table id="tabela">
					<tr>
						<td><label>Naziv: </label>
							<td><input type="text" name="naziv"  value="<?php echo $naziv ?>"></td>
						</tr>
						<tr>
							<td><label>Broj Mesta: </label>
								<td><input type="text" name="brMesta" value="<?php echo $brMesta ?>"></td>
							</tr>
							<tr>
								<td><label>Cena: </label>
									<td><input type="text" name="cenaUlaznice" value="<?php echo $cenaUlaznice ?>"></td>
								</tr>

								<tr>
									<td><label>Kratak opis: </label>
										<td><textarea  type="textarea" name="opis" value="<?php echo $opis ?>"></textarea></td>
									</tr>


								</table>
								<label>Izaberite kategoriju: </label>
								<?php 
								$con= new mysqli('localhost', 'root', '', 'ulaznica');
								if($con->error)
									die("Greska".$con->error);

								$upit = "SELECT * from kategorije"; 
								$rez = $con->query($upit);
								echo "<select name='kategorija'>";
								while ($row = mysqli_fetch_array($rez)) 
								  {
									echo "<option value='" . $row['idKategorija'] ."'>" . $row['naziv'] ."</option>";
								}
								echo "</select>";

								?>
							</br>
							<label>Dodaj sliku: </label>
							<input type="file" 
							name="upload" 
							value="" /><br><br> 


							<input type="submit" name="dodaj" value="Dodaj">


						</form>
					</div>
				</body>