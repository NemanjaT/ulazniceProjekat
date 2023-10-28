<?php 



	
    $naziv = '';
	$brMesta = '';
	$cenaUlaznice = '';
	$slika = '';
	$opis = '';
	$kategorijaid = '';
	$idIzmeni = '';

	$con = new mysqli('localhost','root', '', 'ulaznica');
	if($con->error)
		die("Greska" . $con->error);



	if(isset($_GET['id']))
		$idIzmeni = $_GET['id'];

	$upit = "SELECT * FROM dogadjaj where idDogadjaj = '$idIzmeni'";
	$query = $con->query($upit);

	$red = $query->fetch_assoc();



	if(isset($_POST['azuriraj']))
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
			
			$query = "UPDATE dogadjaj SET naziv='$naziv', broj_mesta='$brMesta', cenaUlaznice='$cenaUlaznice', slika='$slika', opis='$opis', kategorija_id='$kategorijaid' WHERE idDogadjaj='$idIzmeni' ";

			 
			$rez = $con->query($azuriraj);


			if($rez)
			{
				echo '<script language="javascript">';
				echo 'alert("Uspesno ste  azurirali dogadjaj!")';
				echo '</script>';
			}
			else
			{
				mysqli_close($con);
				echo '<script language="javascript">';
				echo 'alert("Greska prilikom azuriranja dogadjaja!!")';
				echo '</script>';
			}
			// header('Refresh: 1; URL = adminDogadjaji.php');
			
		}
	}

	?>