<?php
include "config.php";
include "db.php";
if (!isset($_POST['is_remove']) ) {
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
    <?php
    if (isset($_POST['is_edit'])){
        echo "<title>Clother - Edit ".$fName." ".$lName."'s account</title>";
    } else if(isset($_POST['is_remove'])){
        echo '<title>Clother - Remove account</title>';
    } {
        echo '<title>Clother - Register</title>';
    }
    ?>
</head>
<body>
<header class="px-2 sticky-top py-3 border-bottom">
    <div class="d-flex align-items-center justify-content-center justify-content-md-between ">
        <!--    Hamburger menu-->
        <div class="col-4">
            <?php
            if (isset($_SESSION["user"]) && !isset($_POST['is_remove'])) {
                echo '<div class="mb-2 mb-md-0 header-hamburger">
                <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#Hamburger"
                        aria-controls="Hamburger">
                    <img src="./images/icons/hamburger.png" height="40" width="40">
                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="Hamburger" aria-labelledby="HamburgerLabel">
                    <!--        hamburger contents-->
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="HamburgerLabel">CLOTHER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column justify-content-between">
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" class="nav-item"><a href="./index.php"
                                                                                class="nav-link">Home</a></li>
                                <li class="list-group-item" class="nav-item"><a href="closetList.php" class="nav-link">Closets</a>
                                </li>
                                <li class="list-group-item" class="nav-item"><a href="#" class="nav-link">Calendar</a>
                                </li>
                                <li class="list-group-item" class="nav-item"><a href="#" class="nav-link">Travel</a>
                                </li>';

                if ($_SESSION['is_admin']) {
                    echo '<li class="list-group-item nav-item"><a href="./admin.php" class="nav-link">Admin panel</a></li>';
                }

                echo '      </ul>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col mx-auto">
                                    <div class=" mx-auto clothingLine d-block"></div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" class="nav-item"><a href="./userSettings.php"
                                                                                class="nav-link">User settings</a></li>
                                <li class="list-group-item" class="nav-item"><a href="logout.php" class="nav-link">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
        <div class="col-4 d-flex col-md-auto mb-2 justify-content-center mb-md-0 header-logo">
            <a class="clother-logo" href="<?php echo (isset($_POST['is_edit']))?'./index.php':'./login.php';?>"> <img src="./images/icons/new_logo.png"></a>
        </div>
        <div class="col-4 d-flex justify-content-end text-end header-user-menu">
            <?php
            if (isset($_SESSION["user"]) && !isset($_POST['is_remove'])) {
                echo '<div class="flex-shrink-0 dropdown desktop-label">
                <button class=" btn d-block link-dark text-decoration-none dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./uploads/user_pictures/'.$picture.'" alt="'.$fName.' '.$lName.'" width="32" height="32" class="rounded-circle">
                </button>
                <ul class="dropdown-menu text-small shadow dropdown-menu-end">
                    <li><a class="dropdown-item" href="./userSettings.php">Settings</a></li>
                    <li><a class="dropdown-item" href="./userSettings.php">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
                </ul>
            </div>';
            }
            ?>
        </div>
    </div>
</header>
<main>
    <div class="row justify-content-center pt-3">
        <div class="desktop-label col-3"></div>
        <div class="col mx-auto py-2 px-4">
            <div class="container main-container rounded-4 px-3">
                <div class="container text-left px-0">
                    <div class="row pb-4">
                        <div class="col pt-2">
                            <h1 class="mobile-label text-center">Welcome to Clother</h1>
                            <h1 class="desktop-label text-start text-nowrap">Welcome to Clother</h1>
                            <div class="col mobile-label mx-2 text-center text-secondary"><h6>Your go-to for all clothing advice!</h6></div>
                            <div class="col desktop-label mx-2"><h5>Your go-to for all clothing advice!</h5></div>
                        </div>
                        <div class="col-9 d-flex flex-row-reverse"></div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="container justify-content-center text-center rounded-5 px-3">
                            <?php
                            if (isset($_POST['isEdit'])) {
                                session_start();
                                $number = $_SESSION['user_id'];

                                $fName = mysqli_real_escape_string($connection, $_POST['userFName']);
                                $lName = mysqli_real_escape_string($connection, $_POST['userLName']);
                                $eMail = mysqli_real_escape_string($connection, $_POST['userMail']);
                                $pass = mysqli_real_escape_string($connection, $_POST['userPass']);
                                $phone = mysqli_real_escape_string($connection, $_POST['userPhone']);
                                $picture = mysqli_real_escape_string($connection, $_POST['userPicture']);
                                $gender = mysqli_real_escape_string($connection, $_POST['userGender']);
                                $country = mysqli_real_escape_string($connection, $_POST['userCountry']);
                                $favColor = mysqli_real_escape_string($connection, $_POST['userColor']);

                                $query = "UPDATE tbl_222_users SET `f_name`='$fName',`l_name`='$lName',`email`='$eMail',`password`='$pass',`phone`='$phone',`user_picture`='$picture',`gender`='$gender',`user_country`='$country',`user_fav_color`='$favColor' WHERE (`user_id`='$number');";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB update query failed.");
                                }
                                header('Location: ' . URL . 'userSettings.php');
                            } else if (isset($_POST['is_remove']) && isset($_POST['del_user_id'])) {
                                $user_id = $_POST["del_user_id"];
                                if($user_id == 1){
                                header('Location: ' . URL . 'admin.php');
                                exit;
                                }
                                $query = "DELETE clth . * FROM tbl_222_clothes clth
                                        INNER JOIN
                                            tbl_222_closet_clothes clcs ON clth.clothing_id = clcs.clothing_id
                                        INNER JOIN
                                            tbl_222_closets clst ON clcs.closet_id = clst.closet_id 
                                        WHERE
                                            clst.user_id = $user_id;";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB delete clothing query failed.");
                                }

                                $query = "DELETE clos . * FROM tbl_222_closets clos WHERE clos.user_id = $user_id;";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB delete closets query failed.");
                                }

                                $query = "DELETE usr . * FROM tbl_222_users usr WHERE usr.user_id = $user_id;";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB delete closets query failed.");
                                }
                                
                                header('Location: ' . URL . 'admin.php');
                            } else if (isset($_POST['is_remove'])) {
                                session_start();
                                $number = $_SESSION['user_id'];
                                $query = "DELETE clth . * FROM tbl_222_clothes clth
                                        INNER JOIN
                                            tbl_222_closet_clothes clcs ON clth.clothing_id = clcs.clothing_id
                                        INNER JOIN
                                            tbl_222_closets clst ON clcs.closet_id = clst.closet_id 
                                        WHERE
                                            clst.user_id = $number;";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB delete clothing query failed.");
                                }

                                $query = "DELETE clos . * FROM tbl_222_closets clos WHERE clos.user_id = $number;";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB delete closets query failed.");
                                }

                                $query = "DELETE usr . * FROM tbl_222_users usr WHERE usr.user_id = $number;";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB delete closets query failed.");
                                }
                            } else if (isset($_POST['isInsert'])){
                                $query = "INSERT INTO tbl_222_users(f_name,l_name,email,password,phone,user_picture,gender,user_country,user_fav_color) VALUES ('$fName','$lName','$eMail','$pass','$phone','$picture','$gender','$country','$favColor')";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("DB insert query failed.");
                                }
                            } else {
                                header('Location: ' . URL . 'index.php');
                            }
                            ?>
                        <div class="desktop-label col-1"></div>
                        <div class="col text-center">
                            <div class="row justify-content-center pt-3">
                                <div class="desktop-label col-1"></div>
                                <div class="col mx-auto">
                                    <?php
                                    if (isset($_POST['is_remove'])) {
                                        echo '<h5>User removed</h5>';
                                        echo '<div class="row pt-5">
                                                    <h6> your user was successfully removed from the system. Press the "Proceed" button to return to the log in screen</h6>
                                                </div>
                                                <div class="row justify-content-center py-3">
                                                        <a href="./login.php" class="col-4 btn btn-primary">Proceed</a>
                                                </div>';
                                    } else if (isset($_POST['isInsert'])){
                                        echo '<h5>User Created</h5>';
                                        echo '<div class="row pt-5">
                                                    <h6> your user was successfully created in the system. Press the "Proceed" button to return to the log in screen</h6>
                                                </div>
                                                <div class="row justify-content-center py-3">
                                                        <a href="./login.php" class="col-4 btn btn-primary">Proceed</a>
                                                </div>';
                                    }
                                    ?>
                                </div>
                                <div class="desktop-label col-1"></div>
                            </div>
                        </div>
                        <div class="desktop-label col-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="desktop-label col-3"></div>
    </div>
</main>

</html>
<?php
mysqli_close($connection);
?>