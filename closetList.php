<?php
include "config.php";

session_start();

if(!isset($_SESSION["user"])){
    echo 'no user ID found! ' ;
    header('Location: ' . URL . 'login.php');
} else {}
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
<header class="p-4 py-3 border-bottom position-sticky">
    <div class="d-flex align-items-center justify-content-center justify-content-md-between ">
        <!--    Hamburger menu-->
        <div class="col-4">
            <div class="mb-2 mb-md-0 header-hamburger">
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
                    <div class="offcanvas-body">
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" class="nav-item"><a href="./index.php"
                                                                                class="nav-link">Home</a></li>
                                <li class="list-group-item" class="nav-item"><a href="#" class="nav-link">Closet</a>
                                </li>
                                <li class="list-group-item" class="nav-item"><a href="#" class="nav-link">Calendar</a>
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
            <a class="clother-logo" href="./index.php"> <img src="./images/icons/new_logo.png" class=""
                                                              height="40"></a>
        </div>
        <!--    User panel    -->
        <div class="col-4 d-flex justify-content-end text-end header-user-menu">
            <div class="flex-shrink-0 dropdown">
                <button class=" btn d-block link-dark text-decoration-none dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </button>
                <ul class="dropdown-menu text-small shadow dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
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
        <div id="desktop-menu" class="col-3 py-2 border-end border-primary-subtle border-3">
            <div class="row">
            </div>
            <div class="row ">
                <div class="col ">
                    <!--        breadcrumbs         -->
                    <nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link" href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Closets List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!--        Links         -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" class="nav-item"><a href="./index.php" class="nav-link px-3">Home</a></li>
                        <li class="list-group-item" class="nav-item"><a href="#" class="nav-link px-3">Closet</a>
                        </li>
                        <li class="list-group-item" class="nav-item"><a href="./index.php" class="nav-link px-3">Calendar</a>
                        </li>
                        <li class="list-group-item" class="nav-item"><a href="./index.php" class="nav-link px-3">Travel</a>
                        </li>
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
                                <div class="col-3 px-3 py-1">
                                    <h1>Closets</h1>
                                </div>
                            </div>
                        </div>
                        <!--            Blue line           -->
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class=" mx-auto clothingLine d-block"></div>
                            </div>
                        </div>
                        <!--            Closets           -->
                        <?php
                        include 'db.php';
                        include "config.php";
                        $uid = $_SESSION['user_id'];
                        $query = "SELECT 
                            cls.closet_name,
                            cls.closet_id,
                            clo.clothing_id,
                            clo.clothing_name,
                            clo.clothing_picture
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
                        ORDER BY closet_id;";

                        $result = mysqli_query($connection, $query);
                        if(!$result) {
                            die("DB query failed.");
                        }

//                        open first closet group here
                        $closed = 0;
                        $lastCloset = 0;
                        $count = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $currentCloset = $row['closet_id'];

                            if ($currentCloset == $lastCloset && $count <5)
                            {
                                // add item. set currentCloset as lastCloset
                                echo '<div class="card text-bg-transparent border-0 rounded">';
                                echo '<img src="./uploads/' . $row["clothing_picture"] . '" class="card-img" alt="'.$row["clothing_name"].'" title="'.$row["clothing_name"].'">';
                                echo '<div class="card-img-overlay"></div></div>';

                            }
                            else
                            {
                                if ($closed == 0){
                                    echo '</div></a></div>';
                                    $closed = 1;
                                }

                                if ($currentCloset != $lastCloset){
                                    echo '<div class="row px-2 closet-preview">';
                                    echo '<a href="closet.php?closet_id='.$row["closet_id"].'">';
                                    echo '<h2>'.$row["closet_name"].'</h2>';
                                    echo '<div class="card-group d-flex flex-wrap justify-content-between" >';
                                    $lastCloset = $currentCloset;
                                    $count = 0;
                                    $closed = 0;
                                }
//                                close closet group, and continue running. if closet id changes, create a new group, set counter to 0, give it a name and insert the clothing from this row.
                            }
                            $count = $count + 1;
//                            increase counter every time here too!
                        }

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
mysqli_close($connection);
?>