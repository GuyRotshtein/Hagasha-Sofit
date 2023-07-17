<?php
session_start();
include 'db.php';
include "config.php";

$favColor = 0;
$uid = $_SESSION['user_id'];
//$uid = 1;
$query = "SELECT 
                            user_fav_color
                        FROM
                            tbl_222_users
                        WHERE
                            user_id = $uid
                        ;";

$result = mysqli_query($connection, $query);
if(!$result) {
    die("DB color query failed.");
}
while($row = mysqli_fetch_assoc($result)) {
    $favColor = $row["user_fav_color"];
}
mysqli_free_result($result);

// getting all clothes data. filtering later, so we get all clothes now and filter ones w/ no favorite color later - so each clothing items is represented

$query = "SELECT 
                            clo.clothing_id,
                            clo.clothing_name,
                            clo.clothing_picture,
                            clo.category_id,
                            clo.color_id
                        FROM
                            tbl_222_closets cls
                                INNER JOIN
                            tbl_222_users USING (user_id)
                                INNER JOIN
                            tbl_222_closet_clothes USING (closet_id)
                                INNER JOIN
                            tbl_222_clothes clo USING (clothing_id)
                        WHERE
                            user_id = $uid
                        GROUP BY clothing_id
                        ORDER BY clothing_id;";

$result = mysqli_query($connection, $query);
if(!$result) {
    die("DB clothing query failed.");
}
echo 'number of results: '. mysqli_num_rows($result).'<br>';
$clothes = array();
while($row = mysqli_fetch_assoc($result)) {
    echo 'id: '.$row["clothing_id"].'<br>';
    echo 'name: '.$row["clothing_name"].'<br>';
    echo 'picture: '.$row["clothing_picture"].'<br>';
    echo 'category_id: '.$row["category_id"].'<br>';
    echo 'color_id: '.$row["color_id"].'<br>';
    echo '<br><br>';
    $clothes[] = $row;
}



$array = array("fav_color"=>$favColor,"clothes"=>$clothes);
echo json_encode($array);

mysqli_free_result($result);
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Clother - Testing grounds</title>
</head>
<body>
</body>
</html>

