<?php 
$username = "";
$email = "";
$ime = "";
$prezime = "";
$grad = "";

$errors = array();
 ?>




<div class="row">
  <div class="col-md-6" id="registracija">
    <form action="log.php" , method="post" enctype="multipart/form-data">
<?php include('errors.php'); ?>
    <h1>Registracija</h1>
   

    <label><b>Unesite email</b></label>
    </br>
    <input type="text" placeholder="Unesite email" name="email"  value="<?php echo $email; ?>">
</br>
<label><b>Unesite username</b></label>
    </br>
    <input type="text" placeholder="Unesite username" name="username"  value="<?php echo $username; ?>">
</br>
    <label><b>Unesite lozinku</b></label>
    </br>

    <input type="password" placeholder="Unesite lozinku"  name="password"  required>
</br>
    <label><b>Unesite Vaše ime</b></label>
    </br>
    <input type="text" placeholder="Ime" name="ime"  value="<?php echo $ime; ?>">
  
</br>
    <label><b>Unesite Vaše prezime</b></label>
    </br>
    <input type="text" placeholder="Prezime" name="prezime"  value="<?php echo $prezime; ?>">
</br>
<label><b>Grad</b></label>
    </br>
    <input type="text" placeholder="Grad" name="grad"   value="<?php echo $grad; ?>">
</br>
  <br>  
   <button type="submit" class="btn" name="reg">Registruj se</button>
 


</form></div>
  <div class="col-md-6" id="logovanje">
<h1>Uloguj se</h1>
<form action="log.php" method="post">
<?php include('errors.php'); ?>
   
  <label for="uname"><b>Korisničko ime</b></label>
  </br>
  <input type="text" placeholder="Unesite korisničko ime" name="usr" >
</br>
  <label for="psw"><b>Lozinka</b></label>
  </br>
  <input type="password" placeholder="Unesite lozinku" name="psw" >
</br>
 
  <span class="psw">Zaboravili ste <a href="resetujlozinku.php">lozinku?</a></span>
  </br>
   <button type="submit" class="btn" name="log">Uloguj se</button>
</div>
</form>
</div>