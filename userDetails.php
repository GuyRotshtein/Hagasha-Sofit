<?php
include "config.php";
include "db.php";
session_start();

if (!isset($_SESSION["user"])) {
    echo 'no user ID found! ';
    header('Location: ' . URL . 'login.php');
}
$uid = $_SESSION['user_id'];
$query_user = "SELECT * FROM tbl_222_users WHERE user_id = $uid;";
$result_user = mysqli_query($connection, $query_user);

if (!$result_user) {
    die("DB query failed.");
}
$row_user = mysqli_fetch_assoc($result_user);
$fName = $row_user['f_name'];
$lName = $row_user['l_name'];
$picture = $row_user['user_picture'];
$gender = $row_user['gender'];
$country = $row_user['user_country'];
$favColor = $row_user['user_fav_color'];

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
    <title>Clother - Home</title>
</head>

<body class="homePage">
    <header class="p-4 py-3 border-bottom">
        <div class="d-flex align-items-center justify-content-center justify-content-md-between ">
            <!--    Hamburger menu-->
            <div class="col-4">
                <div class="mb-2 mb-md-0 header-hamburger">
                    <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#Hamburger"
                        aria-controls="Hamburger">
                        <img src="./images/icons/hamburger.png" height="40" width="40">
                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="Hamburger"
                        aria-labelledby="HamburgerLabel">
                        <!--        hamburger contents-->
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="HamburgerLabel">CLOTHER</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" class="nav-item"><a href="./index.php"
                                            class="nav-link">Home</a></li>
                                    <li class="list-group-item" class="nav-item"><a href="closetList.php"
                                            class="nav-link">Closets</a>
                                    </li>
                                    <li class="list-group-item" class="nav-item"><a href="#"
                                            class="nav-link">Calendar</a>
                                    </li>
                                    <li class="list-group-item" class="nav-item"><a href="#" class="nav-link">Travel</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--    logo      -->
            <div class="col-4 d-flex col-md-auto mb-2 justify-content-center mb-md-0 header-logo">
                <a class="clother-logo" href="./index.php"> <img src="./images/icons/new_logo.png"></a>
            </div>
            <!--    User panel    -->
            <div class="col-4 d-flex justify-content-end text-end header-user-menu">
                <div class="flex-shrink-0 dropdown">
                    <button class=" btn d-block link-dark text-decoration-none dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <img src="<?php echo './uploads/user_pictures/' . $picture; ?>" alt="mdo" width="32" height="32"
                            class="rounded-circle">
                    </button>
                    <ul class="dropdown-menu text-small shadow dropdown-menu-end">
                        <li><a class="dropdown-item" href="./userSettings.php">Settings</a></li>
                        <li><a class="dropdown-item" href="./userSettings.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="row">
            <div class="col-3 py-2 border-end border-primary-subtle border-3 desktop-menu">
                <div class="row">
                </div>
                <div class="row ">
                    <div class="col ">
                        <nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item " aria-current="page"><a class="breadcrumb-link"
                                        href="./index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                                        href="./admin.php">Admin panel</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!--        breadcrumbs         -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" class="nav-item"><a href="./index.php"
                                    class="nav-link px-3">Home</a></li>
                            <li class="list-group-item" class="nav-item"><a href="./closetList.php"
                                    class="nav-link px-3">Closet</a>
                            </li>
                            <li class="list-group-item" class="nav-item"><a href="#" class="nav-link px-3">Calendar</a>
                            </li>
                            <li class="list-group-item" class="nav-item"><a href="#" class="nav-link px-3">Travel</a>
                            </li>
                            <?php
                            $query_admin = "SELECT is_admin FROM tbl_222_users WHERE user_id = $uid;";
                            $result_admin = mysqli_query($connection, $query_admin);

                            if (!$result_admin) {
                                die("DB query failed.");
                            }
                            $row_admin = mysqli_fetch_assoc($result_admin);
                            $admin = $row_admin['is_admin'];
                            if ($admin) {
                                echo '<li class="list-group-item" class="nav-item"><a href="admin.php" class="nav-link ps-3">Admin panel</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container-fluid ">
                    <div class="container py-2">
                        <div class="container main-container px-3">
                            <div class="container text-left px-0">
                                <div class="row">
                                    <!--                                Search bar - use AJAX? dunno :)-->
                                    <div class="col-3 py-1">
                                        <h1> Admin panel</h1>
                                    </div>
                                    <div class="col-9 d-flex flex-row-reverse"></div>
                                    <h5>User details</h5>
                                    <div class="row">
                                        <div class="col-6 mx-auto">
                                            <div class=" mx-auto clothingLine d-block"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php
                            if (isset($_POST['is_read'])) {
                                $uid = $_POST['is_read'];
                                $query_user = "SELECT * FROM tbl_222_users WHERE user_id = $uid;";
                                $result_user = mysqli_query($connection, $query_user);

                                if (!$result_user) {
                                    die("DB query failed.");
                                }
                                $row_user = mysqli_fetch_assoc($result_user);

                                $fname = $row_user['f_name'];
                                $lname = $row_user['l_name'];
                                $email = $row_user['email'];
                                $phone = $row_user['phone'];
                                $gender = $row_user['gender'];
                                $country = $row_user['user_country'];
                                $favColor = $row_user['user_fav_color'];
                                $picture = $row_user['user_picture'];
                                echo '<div class = container text-start>';
                                echo ' <div class="row">';
                                echo ' <div class="col">';
                                echo '<div class="card text-bg-transparent border-0 mx-auto  pb-5">';
                                echo '<img src="./uploads/user_pictures/' . $picture . '" class="mx-auto rounded-circle card-img object-fit-cover" alt="' . $fName . ' ' . $lName . '" title="' . $fName . ' ' . $lName . '">';
                                echo '<div class="card-img-overlay"></div></div>';
                                echo '</div>';
                                echo '<div class ="col-md-auto">';
                                echo '<div class="d-flex" style=height:230px>';
                                echo '<div class ="vr"></div></div>';
                                echo '</div>';
                                echo ' <div class="col">';
                                echo '<ul class="list-unstyled py-3">';
                                echo '<li class="py-1">first name: ' . $fname . '</li>';
                                echo '<li class="py-1">Last name: ' . $lname . '</li>';
                                echo '<li class="py-1">Email: ' . $email . '</li>';
                                echo '<li class="py-1">Country: ' . $country . '</li>';
                                echo '<li class="py-1">Favorite color: ' . $favColor . '</li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';



                                echo '</div>';

                            }
                            ?>
                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <div class=" mx-auto clothingLine d-block"></div>
                                </div>
                            </div>
                            <h5>
                                <?php echo $fname . "'s data" ?>
                            </h5>
                            <?php
                            $query_closet = "SELECT count(*) AS closet_count FROM tbl_222_closets WHERE user_id = $uid;";
                            $result_closet = mysqli_query($connection, $query_closet);
                            if (!$result_closet) {
                                die("DB query failed.");
                            }
                            $row_user = mysqli_fetch_assoc($result_closet);
                            $closet_num = $row_user['closet_count'];

                            $query_clothes = "SELECT u.user_id,  COUNT(cc.clothing_id) AS num_of_clothes
                            FROM tbl_222_users u
                            LEFT JOIN tbl_222_closets c ON u.user_id = c.user_id
                            LEFT JOIN tbl_222_closet_clothes cc ON c.closet_id = cc.closet_id
                            WHERE c.user_id=$uid
                            GROUP BY u.user_id;";

                            $result_clothes = mysqli_query($connection, $query_clothes);
                            if (!$result_clothes) {
                                die("DB query failed.");
                            }
                            $row_user = mysqli_fetch_assoc($result_clothes);
                            
                            $clothes_num = !isset($row_user['num_of_clothes']) ? 0 : $row_user['num_of_clothes'];
                            echo '<ul class="list-unstyled py-3">';

                            echo '<li class="py-1">Number of closets: ' . $closet_num . '</li>';
                            echo '<li class="py-1">Number of clothes: ' . $clothes_num . '</li>';

                            echo '</ul>';



                            ?>


                        </div>