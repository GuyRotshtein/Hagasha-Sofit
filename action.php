<?php
include "config.php";
include "db.php";

session_start();
$user_id = $_SESSION['user_id'];


if (isset($_GET['addCloset'])) {
    $addCloset = $_GET['addCloset'];


    // Use the $addCloset variable as needed
    if ($addCloset == 1) {
        // Perform specific actions for addCloset=1
        $name = mysqli_real_escape_string($connection, $_POST['item']);
        echo $_POST['item'];
        $query = "INSERT INTO tbl_222_closets(closet_name,user_id) VALUES ('$name','$user_id')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("DB query closet add failed.");
        }
        header('Location: ' . URL . 'closetList.php?');

    }

} else {


    $name = mysqli_real_escape_string($connection, $_POST['item']);
    $picture = mysqli_real_escape_string($connection, $_POST['pictureInput']);
    $color = mysqli_real_escape_string($connection, $_POST['color']);
    $size = mysqli_real_escape_string($connection, $_POST['size']);
    $closet = mysqli_real_escape_string($connection, $_POST['closet']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);

    $query = "INSERT INTO tbl_222_clothes(clothing_name,clothing_picture,category_id,size_id,color_id) VALUES ('$name','$picture','$category','$size','$color')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("DB query 1 failed.");
    }

    $query2 = "SELECT * FROM tbl_222_clothes ORDER BY clothing_id DESC LIMIT 1; ";
    $result2 = mysqli_query($connection, $query2);
    if (!$result2) {
        die("DB query 2 failed.");
    }
    $row = mysqli_fetch_assoc($result2);
    $cid = $row['clothing_id'];

    $query3 = "INSERT INTO tbl_222_closet_clothes(closet_id, clothing_id) VALUES ('$closet','$cid')";
    $result3 = mysqli_query($connection, $query3);
    if (!$result3) {
        die("DB query 3 failed.");
    }

    header('Location: ' . URL . 'closet.php?closet_id=' . $closet);

    mysqli_close($connection);
}