<?php

require_once 'inc/db.inc.php';

$con = getDbConnection();

if (isset($_POST) && ! empty($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT username, password FROM player WHERE username = '".$username."'";
  $result = $con->query($sql);
  
  if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    if($row['password'] == $password) {
      session_start();
      $_SESSION['username'] = $username;
      header('Location: char_type.php');
    }
    else {
      echo "Geen geldige login!";
    }
  }
  
}


?>





<!DOCTYPE html>
<html>
<head>
  <title> Inloggen </title> 
</head>
<body>
<link rel="stylesheet" type="text/css" href="style/style.css">
<div class='container'>
  <div class='login-box' id='grad'>
  <H2>Login</H2>
    <div class='form'>
      <form name="login" method="post" action="index.php">

         <label for="username">Gebruikersnaam:</label><input type="text" name="username" id="username" /><br>
         <label for="password">Wachtwoord:</label><input type="password" name="password" id="password" /><br>

         <input type="submit" name="Submit" value="Inloggen" class='submit' />

      </form>
    </div>
  </div>
</div>
</body>
</html>



