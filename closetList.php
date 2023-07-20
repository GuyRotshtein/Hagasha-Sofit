<?php
include 'db.php';
include "config.php";

session_start();

if (!isset($_SESSION["user"])) {
    echo 'no user ID found! ';
    header('Location: ' . URL . 'login.php');
}
$uid = $_SESSION['user_id'];
$query_user = "SELECT * FROM tbl_222_users WHERE user_id = $uid;";
$result_user = mysqli_query($connection, $query_user);

if (!$result_user) {
    die("DB user query failed.");
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
    <title>Clother - Closets List</title>
</head>
<body>
<header class="px-2 py-3 sticky-top border-bottom">
    <div class="d-flex align-items-center justify-content-center justify-content-md-between ">
        <div class="col-4">
            <div class="mb-2 mb-md-0 header-hamburger">
                <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#Hamburger"
                        aria-controls="Hamburger">
                    <img src="./images/icons/hamburger.png" height="40" width="40">
                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="Hamburger" aria-labelledby="HamburgerLabel">
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
                                </li>
                                <?php
                                if ($_SESSION['is_admin']) {
                                    echo '<li class="list-group-item nav-item"><a href="./admin.php" class="nav-link">Admin panel</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col mx-auto">
                                    <div class=" mx-auto clothingLine d-block"></div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" class="nav-item"><a href="./userSettings.php" class="nav-link">User settings</a></li>
                                <li class="list-group-item" class="nav-item"><a href="logout.php" class="nav-link">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 d-flex col-md-auto mb-2 justify-content-center mb-md-0 header-logo">
            <a class="clother-logo" href="./index.php"> <img src="./images/icons/new_logo.png"></a>
        </div>
        <div class="col-4 d-flex justify-content-end text-end header-user-menu">
            <div class="flex-shrink-0 dropdown desktop-label">
                <button class=" btn d-block link-dark text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo'./uploads/user_pictures/'.$picture.'" alt="'.$fName.' '.$lName.'"';?> width="32" height="32" class="rounded-circle">
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
                                        href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Closets</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item nav-item"><a href="./index.php" class="nav-link px-3">Home</a></li>
                            <li class="list-group-item nav-item"><a href="./closetList.php" class="nav-link px-3">Closet</a></li>
                            <li class="list-group-item nav-item"><a href="#" class="nav-link px-3">Calendar</a></li>
                            <li class="list-group-item nav-item"><a href="#" class="nav-link px-3">Travel</a></li>
                            <?php
                            if ($_SESSION['is_admin']) {
                                echo '<li class="list-group-item nav-item"><a href="admin.php" class="nav-link px-3">Admin panel</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col overflow-auto" id="contentArea">
                <div class="container-fluid ">
                    <div class="container py-2">
                        <div class="container main-container px-3">
                            <div class="container text-left px-0">
                                <div class="row">
                                    <div class="col d-inline flex px-3 py-1">
                                        <h1 class="desktop-label">Closets</h1>
                                        <h1 class="mobile-label text-center">Closets</h1>
                                    </div>
                                    <div class="col-9 desktop-label px-3 py-1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <div class=" mx-auto clothingLine d-block"></div>
                                </div>
                            </div>
                            <?php
                            $query = "SELECT 
                            cls.closet_name,
                            cls.closet_id,
                            clo.clothing_id,
                            clo.clothing_name,
                            clo.clothing_picture
                        FROM
                            tbl_222_closets cls
                                RIGHT JOIN
                            tbl_222_users USING (user_id)
                                LEFT JOIN
                            tbl_222_closet_clothes USING (closet_id)
                                LEFT JOIN
                            tbl_222_clothes clo USING (clothing_id)
                        WHERE
                            user_id = $uid
                        ORDER BY closet_id;";

                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                die("DB query failed.");
                            }

                            $closed = 1;
                            $lastCloset = 0;
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $currentCloset = $row['closet_id'];
                                if ($currentCloset == $lastCloset && $count < 6) {
                                    // add item. set currentCloset as lastCloset
                                    echo '<div class="card mx-auto text-bg-transparent bg-transparent border-0 rounded-3">';
                                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain rounded-3 bg-transparent" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                                    echo '<div class="card-img-overlay "></div></div>';

                                } else {
                                    if ($closed == 0) {
                                        echo '</div></a></div>';
                                        echo '<div class="row">
                                                <div class="col-6 mx-auto">
                                                    <div class=" mx-auto clothingLine d-block"></div>
                                                </div>
                                            </div>';
                                        $closed = 1;
                                    }
                                    if ($currentCloset != $lastCloset) {
                                        echo '<div class="row px-2 pb-4 closet-preview">';
                                        echo '<a href="closet.php?closet_id=' . $row["closet_id"] . '">';
                                        echo '<h2 class="desktop-label mx-auto text-wrap">' . $row["closet_name"].'</h2>';
                                        echo '<h2 class="mobile-label text-center text-wrap">' . $row["closet_name"].'</h2>';
                                        echo '<div class="card-group d-flex flex-wrap justify-content-start" >';
                                        $lastCloset = $currentCloset;
                                        $count = 0;
                                        $closed = 0;
                                        if (isset($row['clothing_id'])){
                                            echo '<div class="card mx-auto text-bg-transparent bg-transparent border-0 rounded-3">';
                                            echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain rounded-3 bg-transparent" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                                            echo '<div class="card-img-overlay "></div></div>';
                                        }
                                    }
                                    if (!isset($row['clothing_id'])){
                                        echo '<div class="card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no clothes in the '.$row['closet_name'].' closet...<br>Maybe you can add some?</p></div>';
                                        echo '</div></a></div>';
                                        $closed = 1;
                                    }
                                }
                                $count = $count + 1;
                            }
                            echo '</div></a></div>';
                            echo '<div class="row">
                                <div id="add-clothing" class="col-12 mx-auto d-flex justify-content-center">
                                <a href="addCloset.php?user_id=' . $uid . '" class="img btn mx-auto p-0 clothingButton" role="button"></a></div></div>';
                            mysqli_free_result($result);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php
mysqli_free_result($result_user);
mysqli_close($connection);
?>