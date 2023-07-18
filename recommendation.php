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
//echo 'number of results: '. mysqli_num_rows($result).'<br>';
$clothes = array();
while($row = mysqli_fetch_assoc($result)) {
    $clothes[] = $row;
}

$array = array("fav_color"=>$favColor,"clothes"=>$clothes);
echo json_encode($array);

mysqli_free_result($result);
mysqli_close($connection);
?>
