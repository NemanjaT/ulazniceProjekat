<?php 

// session_destroy();
if(isset($_GET['action']) == "add")
{
	$id = $_GET['id'];

	if(isset($_SESSION['korpa'][$id]))
	{
		$prethodni = $_SESSION['korpa'][$id]['kolicina'];
		$_SESSION['korpa'][$id] = array("id"=>$id,"kolicina"=>$prethodni+$_POST['kolicina']);
	}
	else
	{
		$_SESSION['korpa'][$id] = array("id"=>$id,"kolicina"=>$_POST['kolicina']);
	}

		// header("location: dogadjaji.php");
}

?>


	<div class="container1">
		<h2 class="page-header">Svi događaji</h2>

<?php 
$con = new mysqli('localhost' , 'root' , '' , 'ulaznica');
if($con->error)
	die('Greska' . $con->error);

$rez = mysqli_query($con, "SELECT * FROM dogadjaj");


	echo "<div class='row'>";
	

while($red = mysqli_fetch_assoc($rez)){
	
 	

	?>
	<form action="dogadjaji.php?action=add&id=<?php echo $red["idDogadjaj"] ?>" method="post" enctype="multipart/form-data">

		<div class='col-sm-6 col-md-4'>
			<div class='thumbnail'>
				<div class='photocontainer'>
					<img width="300px" heigth="250px" src="administrator/img/<?php echo $red['slika']  ?>"  >
				</div>
				<div class='caption'>
					<h3> <?php echo  $red['naziv'] ?></h3>
					<p> <?php  echo $red['opis'] ?> </br>
						Cena: <?php echo  $red['cenaUlaznice'] ?></p> 
						Kolicina:
						<input type='number' value='1' name='kolicina' placeholder='Kol' min='0' id="user"><br><br>
						<input type='submit' value='Dodaj u korpu' name='btnKorpa' class='btn btn-success' />
<img src="" w>

					</div>
				</div>
			</div>
			</form>
			<?php 
				
		}
 
        if(isset($_POST['btnKorpa']))
    {
    	echo '<script language="javascript">';
			echo 'alert("Uspesno ste dodali stavku(e) u korpu!")';
			echo '</script>';
    }
		mysqli_close($con);


		?>
	</div>
