<?php
   session_start();
   unset($_SESSION["username"]);
   
   echo 'Uspesno ste se odjavili';
   header('Refresh: 2; URL = log.php');
?>