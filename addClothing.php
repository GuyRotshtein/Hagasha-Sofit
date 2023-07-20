<?php
    include "db.php";
    include "config.php";

    session_start();

    if (!isset($_SESSION["user"])) {
        echo 'no user ID found! ';
        header('Location: ' . URL . 'login.php');
    } else{
    }
    if (!function_exists('str_contains')) {
        function str_contains(string $haystack, string $needle): bool
        {
            return '' === $needle || false !== strpos($haystack, $needle);
        }
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

    $cid = $_GET['closet_id']?:header('Location: ' . URL . 'closetList.php');
    $query = "SELECT 
                            *
                            FROM
                                tbl_222_closets cls
                            WHERE
                                user_id = $uid and closet_id = $cid
                            ORDER BY closet_id;";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("DB query failed.");
    }
    $row2 = null;
    $clothId = null;
    if (isset($_POST['is_edit'])){
        $clothId = $_POST['clothing_id'];
        $query2 = 'SELECT * FROM tbl_222_clothes WHERE clothing_id ='.$_POST['clothing_id'].';';
        $result2 = mysqli_query($connection, $query2);
        if (!$result2) {
            die("DB editing query failed.");
        }
        $row2 = mysqli_fetch_assoc($result2);
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
            echo '<title>Clother - Edit '.$row2['clothing_name'].'</title>';
        } else {
            echo '<title>Clother - Add new clothing item</title>';
        }
    ?>
</head>
<body>
<header class="p-4 py-3 border-bottom">
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
                                <li class="list-group-item" class="nav-item"><a href="closetList.php" class="nav-link">Closets</a>
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
            <a class="clother-logo" href="./index.php"> <img src="./images/icons/new_logo.png"></a>
        </div>
        <!--    User panel    -->
        <div class="col-4 d-flex justify-content-end text-end header-user-menu">
            <div class="flex-shrink-0 dropdown">
                <button class=" btn d-block link-dark text-decoration-none dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="<?php echo'./uploads/user_pictures/'.$picture;?>" alt="mdo" width="32" height="32" class="rounded-circle">
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
<?php
if (isset($_POST['is_edit'])){
    echo '<span class="d-none" id="editSwitch">true</span>';
} else {
    echo '<span class="d-none" id="editSwitch">false</span>';
}
?>
<main>
    <div class="row ">
        <div class="col desktop-menu">
            <nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link" href="index.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link" href="closetList.php">Closets</a></li>
                    <?php
                    $row = mysqli_fetch_assoc($result);
                    $cName = $row["closet_name"];
                    echo '<li class="breadcrumb-item active" aria-current="page"><a class="breadcrumb-link"
                                                                                          href="closet.php?closet_id='.$cid.'">'.$row["closet_name"].'</a></li>';
                    ?>
                    <li class="breadcrumb-item active" aria-current="page">Add new clothing</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-3 py-2 border-end border-primary-subtle border-3 desktop-menu">
            <div class="row">
            </div>
            <div class="row">
                <div class="col">
                    <!--        breadcrumbs         -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" class="nav-item"><a href="index.php"
                                                                        class="nav-link px-3">Home</a></li>
                        <li class="list-group-item" class="nav-item"><a href="closetList.php" class="nav-link px-3">Closet</a>
                        </li>
                        <li class="list-group-item" class="nav-item"><a href="#" class="nav-link px-3">Calendar</a>
                        </li>
                        <li class="list-group-item" class="nav-item"><a href="#" class="nav-link px-3">Travel</a>
                        </li>
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
                                    <h1>Add items</h1>
                                </div>
                            </div>
                        </div>
                        <!--                Clothing image          -->
                        <div class="row pb-3">
                            <div class="col-5 mx-auto">
                                <h6>Please choose a picture:</h6>
                                <div id="clothingImage" class="carousel carousel-dark slide">
                                    <div class="carousel-inner bg-body-tertiary rounded-3">
                                        <div class="carousel-item active">
                                            <?php
                                            if (isset($_POST['is_edit'])){
                                                echo '<img src="./uploads/clothing/'.$row2["clothing_picture"].'" class="d-block w-100 object-fit-contain">';
                                            } else {
                                                echo '<img src="./uploads/clothing/default.png" class="d-block w-100 object-fit-contain">';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#clothingImage" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#clothingImage" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                        echo '<form name="addClothingForm" id="addClothingForm" action="action.php" method="post" onsubmit="return validateForm()">';
                        if (isset($_POST['is_edit'])) {
                            echo '<input type="hidden" name="isEdit" value="true" form="addClothingForm">';
                            echo '<input type="hidden" name="clothingId" value="'.$clothId.'" form="addClothingForm">';
                        }
                        ?>
                        <input type="hidden" name="pictureInput" id="pictureInput" value="" form="addClothingForm">
                        <!--            Blue line           -->
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class=" mx-auto clothingLine d-block"></div>
                            </div>
                        </div>
                        <!--            details           -->
                        <div class="row py-3">
                            <div class="col-3">
                                <h6>Clothing item's name:</h6>
                            </div>
                            <div class="col-6 text-center">
                                <input class="form-control text-center" type="text" name="item" value=" <?php echo (isset($_POST['is_edit']))?$row2['clothing_name']:'';?>" placeholder="<?php echo (isset($_POST[`is_edit`]))?$row2[`clothing_name`]:`Item's name`;?>">
                                </div>
                                <div class="col-3"></div>
                                <div id="invalidName" class="invalid-feedback text-center">
                                    Please write The clothing item's name
                                </div>
                            </div>
                            <div class="row 3 py-3">
                                <div class="col-3">
                                    <h6>Colors</h6>
                                </div>
                                    <div class="col-6 text-center">
                                        <div class="row pb-2">
                                            <div class="col text-center">
                                                <select class="form-select select-picker w-50 mx-auto text-center" data-dropup-auto="false" aria-label="Disabled Color selection" name="color" >

                                                <?php
                                if (isset($_POST['is_edit'])) {
                                    $query = "SELECT * FROM tbl_222_colors";
                                    $result = mysqli_query($connection, $query);
                                    if (!$result) {
                                        die("DB color 1 query failed.");
                                    }
                                    $query4 = "SELECT * FROM tbl_222_colors WHERE color_id=".$row2['color_id'];
                                    $result4 = mysqli_query($connection, $query4);

                                    if (!$result4) {
                                        die("DB query 4 failed.");
                                    }
                                    $row4 = mysqli_fetch_assoc($result4);
                                    echo '<option value="'.$row2["color_id"].'" selected>'.$row4["color_name"].'</option>';
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['color_id'] != $row2['color_id']) {
                                            echo '<option value="' . $row["color_id"] . '">' . $row["color_name"] . '</option>';
                                        }
                                    }
                                } else {
                                    $query = "SELECT * FROM tbl_222_colors";
                                    $result = mysqli_query($connection, $query);

                                    if (!$result) {
                                        die("DB query failed.");
                                    }

                                    echo '<option value=0 selected disabled>select primary color</option>';
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$row["color_id"].'">'.$row["color_name"].'</option>';
                                    }
                                }
                                ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row">
                                <div class="col text-center">
                                    <select class="form-select select-picker w-50 mx-auto text-center" aria-label="Disabled Secondary Color selection" name="colorSecond" data-dropup-auto="false">

                                        <?php
                                        if (isset($_POST['is_edit']) && is_null($row2['secondary_color_id']) != 1) {
                                            $query = "SELECT * FROM tbl_222_colors;";
                                            $result = mysqli_query($connection, $query);
                                            if (!$result) {
                                                die("DB color 2 query failed.");
                                            }
                                            $query4s = "SELECT * FROM tbl_222_colors WHERE color_id=".$row2['secondary_color_id'].";";
                                            $result4s = mysqli_query($connection, $query4s);

                                            if (!$result4s) {
                                                die("DB query 4s failed.");
                                            }
                                            $row4s = mysqli_fetch_assoc($result4s);
                                            echo '<option value="'.$row2["secondary_color_id"].'" selected>'.$row4s["color_name"].'</option>';
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($row['color_id'] != $row2['secondary_color_id']) {
                                                    echo '<option value="' . $row["color_id"] . '">' . $row["color_name"] . '</option>';
                                                }
                                            }
                                            echo '<option value="">no secondary color</option>';
                                        } else {
                                            $query = "SELECT * FROM tbl_222_colors;";
                                            $result = mysqli_query($connection, $query);

                                            if (!$result) {
                                                die("DB secondary color query failed.");
                                            }

                                            echo '<option value=0 selected>select secondary color</option>';
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="'.$row["color_id"].'">'.$row["color_name"].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Size</h6>
                        </div>
                        <div class="col-6 text-center">
                            <select class="form-select text-center w-50 mx-auto" name="size" id="editSize"
                                    aria-label="Default select example">
                                <option selected value="<?php echo (isset($_POST['is_edit']))?$row2['size_id']:'';?>" disabled>Select a size</option>
                            </select>
                            <div id="invalidSize" class="invalid-feedback text-center">
                                Please select an option from the dropdown list
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Closet</h6>
                        </div>
                        <div class="col-6 text-center">
                            <select class="form-select text-center mx-auto" name="closet"
                                    aria-label="Default select example">
                                <?php
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

                                echo '<option value="'.$cid.'">'.$cName.'</option>';

                                while ($row = mysqli_fetch_assoc($result)){
                                    if ($row["closet_id"] != $cid){
                                        echo '<option value="'.$row["closet_id"].'">'.$row["closet_name"].'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <div id="invalidCloset" class="invalid-feedback text-center">
                                Please select an option from the dropdown list
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Category</h6>
                        </div>
                        <div class="col-6 text-center">
                            <select class="form-select text-center mx-auto" name="category"
                                    aria-label="Default select example">
                                <option selected value="<?php echo (isset($_POST['is_edit']))?$row2['category_id']:'';?>" disabled>Select a category</option>
                            </select>
                            <div id="invalidCategory" class="invalid-feedback text-center">
                                Please select an option from the dropdown list
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <!--            Blue line           -->
                    <div class="row pt-5">
                        <div class="col-6 mx-auto">
                            <div class=" mx-auto clothingLine d-block"></div>
                        </div>
                    </div>
                    <!--            Blue line           -->
                    <div id="clothingMsg" class="row text-center"></div>
                    </form>
                    <div class="row py-4">
                        <div class="col-3 mx-auto d-flex justify-content-center">
                            <input type="submit" form="addClothingForm" name="submit" class="btn btn-outline-success mx-2" value="Confirm">
                            <?php
                            if (isset($_POST['is_edit'])) {

                                echo '<form action="./clothing.php" method="get">';
                                echo '<input type="hidden" name="clothing_id" value="'.$clothId.'">';
                            } else {
                                echo '<form action="./closet.php" method="get">';
                                echo '<input type="hidden" name="closet_id" value="'.$cid.'">';
                            }
                            echo '<button type="submit" class="btn btn-outline-danger mx-2">Cancel</button>';
                            echo '</form>';
                            ?>
                        </div>
                    </div>
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