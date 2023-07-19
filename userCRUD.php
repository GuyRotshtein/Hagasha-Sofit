<?php
include "config.php";
include "db.php";
if ($_POST['isRemove'] != 'true'){
    $fName = mysqli_real_escape_string($connection, $_POST['userFName']);
    $lName = mysqli_real_escape_string($connection, $_POST['userLName']);
    $eMail = mysqli_real_escape_string($connection, $_POST['userMail']);
    $pass = mysqli_real_escape_string($connection, $_POST['userPass']);
    $phone = mysqli_real_escape_string($connection, $_POST['userPhone']);
    $picture = mysqli_real_escape_string($connection, $_POST['userPicture']);
    $gender = mysqli_real_escape_string($connection, $_POST['userGender']);
    $country = mysqli_real_escape_string($connection, $_POST['userCountry']);
    $favColor = mysqli_real_escape_string($connection, $_POST['userColor']);
}
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
    <title>Clother - Login</title>
</head>
<body>
<header class="p-4 py-3 border-bottom">
    <div class="d-flex align-items-center justify-content-center">
        <div class="col-4 d-flex col-md-auto mb-2 justify-content-center mb-md-0 header-logo">
            <div class="clother-logo"><img src="./images/icons/new_logo.png"></div>
        </div>
    </div>
</header>
<main>
    <div class="row justify-content-center pt-3">
        <div class="col-4 py-2">
            <div class="container main-container rounded-4 px-3">
                <div class="container text-left px-0">
                    <div class="row pb-5">
                        <div class="col-12 py-1">
                            <h1>Welcome to Clother</h1>
                            <div class="col mx-2"><h5>Your go-to for all clothing advice!</h5></div>
                        </div>
                        <div class="col-9 d-flex flex-row-reverse"></div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="container justify-content-center text-center rounded-5 px-5">
                        <?php
                        if (isset($_POST['isEdit'])){
                            $number = mysqli_real_escape_string($connection,$_POST['userId']);

                            $query = "UPDATE tbl_222_users SET `f_name`='$fName',`l_name`='$lName',`email`='$eMail',`password`='$pass',`phone`='$phone',`user_picture`='$picture',`gender`='$gender',`user_country`='$country',`user_fav_color`='$favColor' WHERE (`user_id`='$number');";
                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                die("DB update query failed.");
                            }
                            sleep(3);
                            header('Location: ' . URL . 'userSettings.php');
                        } else if (isset($_POST['isRemove'])){
                            //first, get all clothes in closets that the user owns
                            $number = mysqli_real_escape_string($connection,$_POST['userId']);
                            $query = "DELETE clth . * FROM tbl_222_clothes clth
                                        INNER JOIN
                                            tbl_222_closet_clothes clcs ON clth.clothing_id = clcs.clothing_id
                                        INNER JOIN
                                            tbl_222_closets clst ON clcs.closet_id = clst.closet_id 
                                        WHERE
                                            clst.user_id = $number;";
                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                die("DB delete query failed.");
                            }
                            //delete the clothes
                            //delete the closets
                            //close session
                            //delete user
                            //send to login page
                        } else {
                            $query = "INSERT INTO tbl_222_users(f_name,l_name,email,password,phone,user_picture,gender,user_country,user_fav_color) VALUES ('$fName','$lName','$eMail','$pass','$phone','$picture','$gender','$country','$favColor')";
                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                die("DB insert query failed.");
                            }
//                            sleep(10);
//                            header('Location: ' . URL . 'closet.php?closet_id='.$closet);
                        }
                        ?>
                        <h5>Log into Clother</h5>
                        <div class="col-1"></div>
                        <div class="col text-center">

                            <div class="row justify-content-center py-3">
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php
mysqli_close($connection);
?>