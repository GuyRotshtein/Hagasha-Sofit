<?php
include "config.php";
include "db.php";

//just fucking upload to the server here
$name = mysqli_real_escape_string($connection, $_POST['item']);
$picture = mysqli_real_escape_string($connection, $_POST['pictureInput']);
$color = mysqli_real_escape_string($connection, $_POST['color']);
$size = mysqli_real_escape_string($connection, $_POST['size']);
$closet = mysqli_real_escape_string($connection, $_POST['closet']);
$category = mysqli_real_escape_string($connection, $_POST['category']);
$brand = mysqli_real_escape_string($connection, $_POST['brand']);

$query = "INSERT INTO tbl_222_clothes(clothing_name,clothing_picture,category_id,size_id,color_id) VALUES ('$name','default.png','$category','$size','$color')";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed.");
}
//header('Location: ' . URL . 'closetList.php');
// //release returned data
mysqli_free_result($result);

// //close DB connection
mysqli_close($connection);