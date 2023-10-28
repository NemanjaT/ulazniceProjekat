
		


<form action="kategorije.php" method="get" enctype="multipart/form-data">
	<h2 class="page-header">Kategorije</h2>
	<?php 

	
	$con = new mysqli('localhost' , 'root' , '' , 'ulaznica');
	if($con->error)
		die('Greska' . $con->error);

	$kategorija = mysqli_query($con, "SELECT * FROM kategorije");

	echo "<div class='row' id='kategorije'>";

	while($red = mysqli_fetch_array($kategorija))
	{
		echo "<a href='kategorije.php?id=". $red['idKategorija'] . "' class='color-me'>". $red['naziv'] . "</a>"; echo "<br><br>";
	}
	echo "</div>";

	if(isset($_GET['id']))
	{
		$katID = $_GET['id'];
		$rez = mysqli_query($con, "SELECT * FROM dogadjaj WHERE kategorija_id=$katID");
		echo "<h4 class='page-header'>Događaji za izabranu kategoriju</h4>";
		echo "<div class='row'>";
	while($red = mysqli_fetch_array($rez))
	{
		echo "<div class='col-sm-6 col-md-4' id='dogadjaji'>
		      <div class='thumbnail'>
		      <div class='photocontainer'>
		      <img src=administrator/img/" . $red['slika'] . " width='300px'>
		      </div>
		      <div class='caption'>
		      <h3>" . $red['naziv'] . "</h3>
		      <p>" . $red['opis'] ." </br>
		      Cena: " . $red['cenaUlaznice'] . "</p> 
		      <input type='submit' value='Dodaj u korpu' class='btn btn-success btn-sm' />

		      </div>
		      </div>
		      </div>";
	}
	echo "</div>";
    mysqli_close($con);
	}

	?>
	
</form>