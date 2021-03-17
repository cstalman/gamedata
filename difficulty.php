<?php

require_once('inc/db.inc.php');
require_once('inc/gamedata.inc.php');
session_start();

if(isset($_POST['submit'])) {
    $_SESSION['diff'] = $_POST['difficulty'];
    header('Location: choices.php');
}
?>
<html><head> <title> Difficulty </title> </head>
<body>
<link rel='stylesheet' type='text/css' href='style/style.css'>

<h1>Selecteer je difficulty</h1>
<form name="form1" method="post" action="difficulty.php">
<?php

$dbh = getDbConnection();

$table = 'difficulty';
$data = getData($dbh, $table);

$selectbox = makeSelect($data, $table);

echo join('', $selectbox);
print "<p>";

?>
<input type="submit" name="submit" value="Verzenden">

</form>
</body>
</body></html>