<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prijavljen</title>
	<?php 
     
     session_start();

     if (!isset($_SESSION['username']))
     {
     	$_SESSION['msg'] = "Morate biti ulogovani!"; 
     	header('location: log.php');
     }

	 ?>
</head>
<body>
<?php if (isset($_SESSION['uspesno'])): ?>
	<div class="error success">
		<h3>
			<?php 
             echo $_SESSION['uspesno'];
             unset($_SESSION['uspesno']);
			 ?>
		</h3>
	</div>
<?php endif ?>

<?php if (isset($_SESSION['username'])) : ?>
      <p>Uspesno ste prijavljeni: <strong><?php echo $_SESSION['username']; ?></strong></p>
      
      <p><a href="index.php" title="Pocetna">Povratak na pocetnu stranu</a></p>

      <p><a href="logout.php" title="Logout">Logout</a></p>
  <?php 

endif ;
  header('Refresh: 4; URL = index.php');
  ?>

</body>
</html>