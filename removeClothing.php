<?php
include "config.php";
include "db.php";

$clothing = mysqli_real_escape_string($connection, $_POST['clothing_id']);
$closet = mysqli_real_escape_string($connection, $_POST['closet_id']);

$query = 'DELETE FROM tbl_222_closet_clothes WHERE closet_id = '.$closet.' AND clothing_id = '.$clothing.';';
$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query 1 failed.");
}

$query2 = 'DELETE FROM tbl_222_clothes WHERE clothing_id = '.$clothing.';';
$result2 = mysqli_query($connection, $query2);
if (!$result2) {
    die("DB query 2 failed.");
}

header('Location: ' . URL . 'closet.php?closet_id='. $closet);

mysqli_close($connection);
?>

