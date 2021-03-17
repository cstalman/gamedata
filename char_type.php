<?php

require_once('inc/db.inc.php');
require_once('inc/gamedata.inc.php');
session_start();

if(isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}
elseif(isset($_POST['submit'])) {
    $_SESSION['char'] = $_POST['char_type'];
    header('Location: difficulty.php');
}
?>
<html><head> <title> Character </title> </head>
<body>
<link rel='stylesheet' type='text/css' href='style/style.css'>

<h1>Welkom <?= $_SESSION['username']?>, Selecteer je character</h1>
<form name="form1" method="post" action="char_type.php">
<?php

$dbh = getDbConnection();

$table = 'char_type';
$data = getData($dbh, $table);

$selectbox = makeSelect($data, $table);

echo join('', $selectbox);

print "<p>";
?>
<br>
<input type="submit" name="submit" value="Verzenden">
<input type="submit" name="logout" value="Uitloggen">

</form>
</body>
</body></html>