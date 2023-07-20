<?php
include "db.php";
include "config.php";

session_start();

if (!isset($_SESSION["user"])) {
    echo 'no user ID found! ';
    header('Location: ' . URL . 'login.php');
} else {
}
if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}
$uid = $_SESSION['user_id'] ?: header('Location: ' . URL . 'closetList.php');
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

$query = "SELECT 
                            *
                            FROM
                                tbl_222_closets cls
                            WHERE
                                user_id = $uid 
                            ORDER BY closet_id;";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("DB query failed.");
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
    <title>Clother - Add new clothing item</title>
</head>
<body>
<header class="px-2 py-3 border-bottom">
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
                                <li class="list-group-item" class="nav-item"><a href="./userSettings.php"
                                                                                class="nav-link">User settings</a></li>
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
                            <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link" href="index.php">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link" href="closetList.php">Closets</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add new closet</li>
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
        <div class="col">
            <div class="container-fluid ">
                <div class="container py-2">
                    <div class="container main-container px-3">
                        <div class="container text-left px-0">
                            <div class="row">
                                <div class="col-3 px-3 py-1">
                                    <h1>Add closet</h1>
                                </div>
                            </div>
                        </div>
                        <?php
                        echo '<form name="addClosetForm" id="addClosetForm" action="action.php?addCloset=1" method="post" onsubmit="return validateForm()">';
                        ?>
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class=" mx-auto clothingLine d-block"></div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-3">
                                <h6>Closet name:</h6>
                            </div>
                            <div class="col-6 text-center">
                                <input class="form-control" type="text" name="item" value=""
                                    placeholder="Closet name">
                            </div>
                            <div class="col-3"></div>
                            <div id="invalidName" class="invalid-feedback text-center">
                                Please write The closet name
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class=" mx-auto clothingLine d-block"></div>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-3 mx-auto d-flex justify-content-center">
                                <div class="col-3 mx-auto d-flex justify-content-center">
                                    <input type="submit" id="submit" name="submit"
                                        class="btn btn-outline-success mx-2 clothingSubmit" value="Confirm">
                                    <a href="closetList.php" class="btn btn-outline-danger mx-2">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div id="clothingMsg" class="row text-center"></div>
                        </form>
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
mysqli_free_result($result);
mysqli_close($connection);
?>