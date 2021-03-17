<?php

require_once('inc/db.inc.php');
require_once('inc/gamedata.inc.php');
session_start();

if(isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

?>
<html>
  <head>
    <title> Choices </title>
    <link rel='stylesheet' type='text/css' href='style/style.css'>
  </head>
<body>

<h1>Dit heb je gekozen</h1>

<?php

$dbh = getDbConnection();
print "<br>Character: ". getDataById($dbh, 'char_type', $_SESSION['char']);
print "<br>Difficulty: ". getDataById($dbh, 'difficulty', $_SESSION['diff']);
print "<p>";
?>
<form name="form1" method="post" action="choices.php">
<input type="submit" name="logout" value="Uitloggen">

</body>
</body></html>