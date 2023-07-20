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
                                    <h5>User list</h5>
                                </div>
                            </div>

                            <table class="table table-hover ">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">First name</th>
                                        <th scope="col">Last name</th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_users = "SELECT * FROM tbl_222_users WHERE is_admin = 0;";
                                    $result_users = mysqli_query($connection, $query_users);

                                    if (!$result_users) {
                                        die("DB query failed.");
                                    }

                                    while ($row_users = mysqli_fetch_assoc($result_users)) {
                                        $id = $row_users['user_id'];
                                        $fName = $row_users['f_name'];
                                        $lName = $row_users['l_name'];
                                        $picture = $row_users['user_picture'];
                                        $gender = $row_users['gender'];
                                        $country = $row_users['user_country'];
                                        $favColor = $row_users['user_fav_color'];

                                        echo '<tr>';
                                        echo '<th scope="col">' . $id . '</th>';
                                        echo '<th scope="col">' . $fName . '</th>';
                                        echo '<th scope="col">' . $lName . '</th>';
                                        echo '<th scope="col">
                                        <div style="display: flex;">
                                        <form name="userRemovalForm" id="userRemovalForm" action="userCRUD.php" method="POST">
                                            <input type="hidden" name="is_remove" value="true">
                                            <input type="hidden" name="del_user_id" value="' . $id . '">
                                            <button type="submit" class="btn text-right text-hide clothingButton removeItemBtn removeItemBtnDanger px-5 text-bg-danger">Delete User</button>
                                        </form>
                                        
                                        <form action="userDetails.php" method="POST">
                                            <input type="hidden" name="is_read" value="' . $id . '">
                                            <button type="submit" class="btn btn-secondary ms-1 px-5">View user</button>
                                        </form>
                                    </div>
                                              </th>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <div class=" mx-auto clothingLine d-block"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

</html>