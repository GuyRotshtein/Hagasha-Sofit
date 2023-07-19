<?php
include "config.php";
include "db.php";

if(isset($_POST['closet_id'])){
    $closet = mysqli_real_escape_string($connection, $_POST['closet_id']);

    $query = 'DELETE FROM tbl_222_closet_clothes WHERE closet_id = '.$closet.';';
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("DB query 1 failed.");
    }

    $query2 = 'DELETE FROM tbl_222_closets WHERE closet_id = '.$closet.';';
    $result2 = mysqli_query($connection, $query2);
    if (!$result2) {
        die("DB query 2 failed.");
    }

    header('Location: ' . URL . 'closetList.php');
} else {
    die("Missing 'closet_id' parameter.");
}

mysqli_close($connection);
?>


