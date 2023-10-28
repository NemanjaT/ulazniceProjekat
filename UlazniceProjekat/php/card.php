<?php 
$ukupno = 0;

if(isset($_GET['remove']))
{
	$id = $_GET['remove'];

	unset($_SESSION['korpa'][$id]);
	header("location: korpa.php");
}

$con = new mysqli('localhost' , 'root' , '' , 'ulaznica');
if($con->error)
	die('Greska' . $con->error);

if (isset($_POST['poruci'])) 
{
	if(isset($_SESSION['username']))
	{
		if(isset($_SESSION['idKor']))
		{
			$idKor = $_SESSION['idKor'];
		}
		foreach ($_SESSION['korpa'] as $key => $value) {
			$broj = mysqli_query($con,"SELECT count('ulaznice_id')+kolicina-'1' as br FROM `ulaznice` WHERE idDogadjaj = '$key'");

$br=mysqli_fetch_assoc($broj);

			$upit = mysqli_query($con,"select * from dogadjaj where idDogadjaj = $key");
			foreach ($upit as $u) 
			{
				
				$date = date(DATE_RFC2822);
				if($br['br'] < $u['broj_mesta'] )
				{
					$red = "INSERT INTO ulaznice(cena,kolicina,idKorisnik,idDogadjaj) value ('" . $value['kolicina']*$u['cenaUlaznice'] . "','" . $value["kolicina"] . "','" . $idKor . "','" . $key . "')";
					$rez = $con->query($red);

					$ukupno += $value['kolicina'] *$u['cenaUlaznice'];


					$izlaz = $date . ">>>\t\t Za naplatu: " .  $value['kolicina']*$u['cenaUlaznice'] . " RSD, \t\t Kolicina ulaznica: " .
					$value['kolicina'] . "  \t\t ID Kupca: " .
					$idKor . " \t\t ID Dogadjaja: " .
					$key . "\n\n";

					$fp = fopen("prodateulaznice.txt", "a"); 
					flock($fp, LOCK_EX); 
					if (!$fp) 
					{
						echo "<p><strong>Vaša porudžbina iz nekog razloga ne može biti obavljena!!!</strong></p>";
						exit;
					}
					fwrite($fp, $izlaz, strlen($izlaz));
					flock($fp, LOCK_UN);
					fclose($fp);

					echo "<p>Upisani su podaci u fajl!!!</p>";

				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("Za dogadjaj ' . $u['naziv'] . ' nema vise ulaznica !!!")';
					echo '</script>';
					// header('Refresh: 1;URL = dogadjaji.php');
					exit;
					
				}
			}
		}

	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Morate biti prijavljeni da bi izvrsili porudzbinu!!!")';
		echo '</script>';
		header('Refresh: 1;URL = log.php');
	}
	if($rez)
	{
		echo '<script language="javascript">';
		echo 'alert("Uspesno ste narucili ulaznice vas racun iznosi: ' . $ukupno .' RSD , ulaznice ce vam biti prosledjene u roku od 24h na email adresu !")';
		echo '</script>';
		unset($_SESSION['korpa']);
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Doslo je do greske prilikom porucivanja , pokusajte ponovo!")';
		echo '</script>';
	}
}

?>


<div class="container">
	<h1 class="text-info alert-info">Korpa</h1>

	<div class="row">
		<p class="text-right"><span><?php 


		?></span></p>

		<div class="col-md-12 ">

			<?php 
			if(!isset($_SESSION['korpa']) || count($_SESSION['korpa']) == 0)
			{
				echo "<h1>Vasa korpa je prazna , dodajte nove artikle!</h1><br><br>";
				echo "<a href='dogadjaji.php'>Vrati se na prodavnicu </a>";

			}
			else
			{
				?>
				<form action="korpa.php" method="post" enctype="multipart/form-data">
					<table class="table">
						<thead>
							<tr>
								<th>Naziv</th>
								<th>Broj Mesta</th>
								<th>Cena</th>
								<th>Kolicina</th>
								<th>Ukupna cena</th>
								<th>Brisanje</th>
							</tr>
						</thead>

						<tbody>

							<?php 
							foreach ($_SESSION['korpa'] as $key => $value) {
								$upit = mysqli_query($con,"select * from dogadjaj where idDogadjaj = $key");

								foreach ($upit as $u) 
								{
									echo "<tr>
									<td>". $u['naziv'] . "</td>
									<td>". $u['broj_mesta'] . "</td>
									<td>". $u['cenaUlaznice'] . "</td>
									<td>". $value['kolicina'] . "</td>
									<td>". $value['kolicina']*$u['cenaUlaznice'] . " RSD</td>
									<td><a class='btn btn-danger btn-sm' href='?remove=" . $key ."'>Obrisi stavku</a></td>
									</tr>";

									$ukupno += $value['kolicina'] *$u['cenaUlaznice'];
								}
							}

							?>

						</tbody>
					</table>
				</div> <!-- col12 -->
			</div> <!-- red -->

			<div class="row">
				<div class="col-md-6">

					<input type='submit' value='Porucite dodate proizvode' name='poruci' class='btn btn-success' />

				</div>
				<div class="col-md-6">

					<h3>Ukupna cena: <?php echo $ukupno; ?> RSD</h3>

				</div>
				<?php 
			}
			?>
		</div>
	</form>
</div> <!-- cont -->