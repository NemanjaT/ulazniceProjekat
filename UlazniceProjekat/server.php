<?php 

session_start();
//inicijalizacija promenljivih 



$username = "";
$email = "";
$ime = "";
$prezime = "";
$grad = "";

$errors = array();

$con = new mysqli('localhost' , 'root' , '' , 'ulaznica');
if($con->error)
	die('Greska' . $con->error);

//registracija
if(isset($_POST['reg']))
{
	
	if(!isset($_SESSION['username']))
	{
		$username = mysqli_real_escape_string($con , $_POST['username']);
		$email = mysqli_real_escape_string($con , $_POST['email']);
		$password = mysqli_real_escape_string($con , $_POST['password']);
		$ime = mysqli_real_escape_string($con , $_POST['ime']);
		$prezime = mysqli_real_escape_string($con , $_POST['prezime']);
		$grad = mysqli_real_escape_string($con , $_POST['grad']);


		$check = "SELECT * FROM korisnik WHERE username='$username' OR email='$email' LIMIT 1";
		$rez = mysqli_query($con, $check);
		$user = mysqli_fetch_assoc($rez);

		
		if ($user)
		{
			if($user['username'] === $username)
			{
				echo '<script language="javascript">';
				echo 'alert("Uneti username već postoji!")';
				echo '</script>';

			}

			else
			{
				echo '<script language="javascript">';
				echo 'alert("Uneti email već postoji!")';
				echo '</script>';

			}
		}
		else if (!($username) || !($email) || !($cenaUlaznice) || !($slika) || !($opis) || (!$kategorijaid))
		{
			echo '<script language="javascript">';
			echo 'alert("Morate uneti sva polja!")';
			echo '</script>';
		}
		else
		{
			$upit = "INSERT INTO korisnik (ime, prezime, grad, email, username, lozinka) values ( '$ime', '$prezime' , '$grad' , '$email' , '$username' , '$password' )";
			mysqli_query($con, $upit);
			echo '<script language="javascript">';
			echo 'alert("USPESNO STE SE REGISTROVALI , PRIJAVITE SE DA BI MOGLI DA PORUCITE ULAZNICE!")';
			echo '</script>';
			header('Refresh: 2; URL = log.php');
		}
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("VEC STE ULOGOVANI!")';
		echo '</script>';

		header('Refresh: 2; URL = index.php');
		exit;
	}
}



//logovanje
if(isset($_POST['log']))
{
	$usr = mysqli_real_escape_string($con , $_POST['usr']);
	$psw = mysqli_real_escape_string($con , $_POST['psw']);


	if(!($_POST['usr']) || !($_POST['psw']))
	{
		echo '<script language="javascript">';
		echo 'alert("Morate popuniti sva polja!")';
		echo '</script>';
	}else
	{
		$upit = "SELECT * FROM korisnik WHERE username='$usr' AND lozinka='$psw' ";
		$rezultat = mysqli_query($con, $upit);
		$rez = mysqli_fetch_assoc($rezultat);
		if($rez)
		{
			$_SESSION['idKor'] = $rez['id'];
			$_SESSION['username'] = $usr; 
			$_SESSION['uspesno'] = "Uspesno ste se prijavili!";
			header('location: nalog.php');
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Pogrešno uneto korisničko ime ili lozinka!")';
			echo '</script>';
		}
	}
}




?>