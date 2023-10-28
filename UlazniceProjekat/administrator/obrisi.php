<?php 

$con = new mysqli('localhost','root', '', 'ulaznica');
	if($con->error)
		die("Greska" . $con->error);

	if(isset($_GET['id']))
	{
		$idBrisi = $_GET['id'];
	}
	

	$obrisi = "delete from dogadjaj where idDogadjaj = '$idBrisi'";
	$red = $con->query($obrisi);

	if(mysqli_affected_rows($con) > 0)
	{
		mysqli_close($con);
		echo '<script language="javascript">';
				echo 'alert("Uspesno ste  obrisali dogadjaj!")';
				echo '</script>';

				header('Refresh: 1; URL = adminDogadjaji.php');
	}
	else
	{
		echo '<script language="javascript">';
				echo 'alert("Greska prilikom brisanja dogadjaj!")';
				echo '</script>';
	}

 ?>