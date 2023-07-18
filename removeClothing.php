<?php
include "config.php";
include "db.php";

$clothing = mysqli_real_escape_string($connection, $_POST['item']);
$closet = mysqli_real_escape_string($connection, $_POST['closet_id']);

echo $clothing;
echo $closet;
//echo '{"category":"' . $str . '"}';

header('Location: ' . URL . 'closetList.php');

// //close DB connection

?>

