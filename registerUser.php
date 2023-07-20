<?php
include "config.php";
include "db.php";
$row = null;
$result = null;
$user_id = null;
if (isset($_POST['is_edit'])){

    session_start();

    if (!isset($_SESSION["user"])) {
        echo 'no user ID found! ';
        header('Location: ' . URL . 'login.php');
    }

    $uid = $_POST['userId'];
    $query = "SELECT * FROM tbl_222_users WHERE user_id = $uid;";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("DB query failed.");
    }

    $row = mysqli_fetch_assoc($result);
    $fName = $row['f_name'];
    $lName = $row['l_name'];
    $eMail = $row['email'];
    $pass = strlen($row['password']);
    $phone = $row['phone'];
    $picture = $row['user_picture'];
    $gender = $row['gender'];
    $country = $row['user_country'];
    $favColor = $row['user_fav_color'];
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
    } else {
        echo '<title>Clother - Register</title>';
    }
    ?>
</head>
<body>
<?php
if (isset($_POST['is_edit'])){
    echo '<span class="d-none" id="regSwitch">true</span>';
} else {
    echo '<span class="d-none" id="regSwitch">false</span>';
}
?>
<header class="px-2 sticky-top py-3 border-bottom">
    <div class="d-flex align-items-center justify-content-center justify-content-md-between ">
        <!--    Hamburger menu-->
        <div class="col-4">
            <?php
                if (isset($_SESSION["user"])) {
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
        <!--    logo      -->
        <div class="col-4 d-flex col-md-auto mb-2 justify-content-center mb-md-0 header-logo">
            <a class="clother-logo" href="<?php echo (isset($_POST['is_edit']))?'./index.php':'./login.php';?>"> <img src="./images/icons/new_logo.png"></a>
        </div>
        <!--    User panel    -->
        <div class="col-4 d-flex justify-content-end text-end header-user-menu">
            <?php
                if (isset($_SESSION["user"])) {
                    echo '<div class="flex-shrink-0 dropdown desktop-label">
                <button class=" btn d-block link-dark text-decoration-none dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="./uploads/user_pictures/'.$picture.'" alt="mdo" width="32" height="32" class="rounded-circle">
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
    <div class="row ">
        <div class="col desktop-menu">
            <?php
            if(isset($_POST['is_edit'])){
                echo `<nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php
                    echo '<li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                                                                       href="index.php">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">User settings</li>'
                    ?>
                </ol>
            </nav>`;
            }
            ?>
        </div>
    </div>
    <div class="row">
        <?php
        if (isset($_POST['is_edit'])) {
            echo '<div class="col-3 py-2 border-end border-primary-subtle border-3 desktop-menu">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col">
                            <!--        breadcrumbs         -->
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item nav-item"><a href="./index.php" class="nav-link px-3">Home</a></li>
                            <li class="list-group-item nav-item"><a href="./closetList.php" class="nav-link px-3">Closet</a></li>
                            <li class="list-group-item nav-item"><a href="#" class="nav-link px-3">Calendar</a></li>
                            <li class="list-group-item nav-item"><a href="#" class="nav-link px-3">Travel</a></li>
                            ';
                            if ($_SESSION['is_admin']) {
                                echo '<li class="list-group-item" class="nav-item"><a href="admin.php" class="nav-link ps-3">Admin panel</a></li>';
                            }
                            echo '
                        </ul>
                        </div>
                    </div>
                </div>';
        }
        ?>
        <div class="col">
            <div class="container-fluid ">
                <div class="container py-2">
                    <div class="container main-container">
                        <div class="container text-left px-0">
                            <div class="row">
                                <div class="col px-3 py-1">
                                    <?php
                                        if (isset($_POST['is_edit'])){
                                            echo'<h1>Edit settings</h1>';
                                        } else {
                                            echo'<h1>Registration</h1>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--                User image          -->
                        <div class="row pb-3">
                            <div class="col-4 desktop-label"></div>
                            <div class="col mx-auto">
                                <h6>Please choose a picture to use:</h6>
                                <div id="userImage" class="carousel carousel-dark slide">
                                    <div class="carousel-inner bg-body-tertiary rounded-3">
                                        <div class="carousel-item active">
                                            <?php
                                            if (isset($_POST['is_edit'])){
                                                echo '<img src="./uploads/user_pictures/'.$picture.'" class="mx-auto rounded-circle card-img object-fit-contain py-2">';
                                            } else {
                                                echo '<img src="./uploads/user_pictures/default.png" class="mx-auto rounded-circle card-img object-fit-contain py-2">';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#userImage" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#userImage" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <form name="registerForm" id="registerForm" action="userCRUD.php" method="post" onsubmit="return validateRegisterForm()">
                            <?php
                            if (isset($_POST['is_edit'])) {
                                echo '<input type="hidden" name="isEdit" value="true" form="registerForm">';
                                echo '<input type="hidden" name="userId" value="'.$user_id.'" form="registerForm">';
                            }
                            ?>
                            <input type="hidden" name="userPicture" id="userPicture" value="<?php echo (isset($_POST['is_edit']))?$picture:'';?>" form="registerForm">
                            <!--            Blue line           -->
                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <div class=" mx-auto clothingLine d-block"></div>
                                </div>
                            </div>
                            <!--            details           -->
                            <div class="row pt-3">
                                <div class="col-3 desktop-label">
                                </div>
                                <div class="col text-center">
                                    <?php
                                    if (isset($_POST['is_edit'])){
                                        echo '<h3 class="mx-auto">Edit your account </h3>';
                                    } else{
                                        echo '<h3 class="mx-auto">Create New Account:</h3>';
                                    }

                                    ?>
                                </div>
                                <div class="col-3 desktop-label"></div>
                            </div>
                            <div class="row 3 py-3">
                                <div class="col-4 desktop-label">
                                    <h6>First name: </h6>
                                </div>
                                <div class="col text-center">
                                    <label class="form-label mobile-label"><h6>First name</h6></label>
                                    <input class="form-control text-center" type="text" name="userFName" value="<?php echo (isset($_POST['is_edit']))?$fName:'';?>" placeholder="<?php echo (isset($_POST[`is_edit`]))?$fName:'enter your first name';?>">
                                    <div id="invalidUserFName" class="invalid-feedback text-center">
                                        Please enter your first name
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <div class="row 3 py-3">
                                <div class="col-4 desktop-label">
                                    <h6>Last name: </h6>
                                </div>
                                <div class="col text-center">
                                    <label class="form-label mobile-label"><h6>Last name</h6></label>
                                    <input class="form-control text-center" type="text" name="userLName" value="<?php echo (isset($_POST['is_edit']))?$lName:'';?>" placeholder="<?php echo (isset($_POST[`is_edit`]))?$lName:'enter your last name';?>">
                                    <div id="invalidUserLName" class="invalid-feedback text-center">
                                        Please enter your last name
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <div class="row 3 py-3">
                                <div class="col-4 desktop-label">
                                    <h6>E-mail:</h6>
                                </div>
                                <div class="col text-center">
                                    <label class="form-label mobile-label"><h6>E-mail address</h6></label>
                                    <input class="form-control text-center" type="text" name="userMail" value="<?php echo (isset($_POST['is_edit']))?$eMail:'';?>" placeholder="<?php echo (isset($_POST[`is_edit`]))?$eMail:'enter e-mail address';?>">
                                    <div id="invalidUserMail" class="invalid-feedback text-center">
                                        Please enter a proper e-mail address that includes an '@' sign.
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <div class="row 3 py-3">
                                <div class="col-4 desktop-label">
                                    <h6>Password:</h6>
                                </div>
                                <div class="col text-center">
                                    <label class="form-label mobile-label"><h6>Password</h6></label>
                                    <input class="form-control text-center" type="text" name="userPass" value="<?php echo (isset($_POST['is_edit']))?$row['password']:'';?>" placeholder="<?php echo (isset($_POST[`is_edit`]))?$row['password']:'enter Password';?>">
                                    <div id="invalidUserPass" class="invalid-feedback text-center">
                                        Please enter a proper password. <br>Password must be at least 8 letters long, contain at least one regular and capital letter, as well at least one special character and numbers.
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <div class="row 3 py-3">
                                <div class="col-4 desktop-label">
                                    <h6>Phone number:</h6>
                                </div>
                                <div class="col text-center">
                                    <label class="form-label mobile-label"><h6>Phone number</h6></label>
                                    <input class="form-control text-center" type="text" name="userPhone" value="<?php echo (isset($_POST['is_edit']))?$phone:'';?>" placeholder="<?php echo (isset($_POST[`is_edit`]))?$phone:'enter phone number';?>">
                                    <div id="invalidUserPhone" class="invalid-feedback text-center">
                                        Please enter your phone number
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <div class="row py-3">
                                <div class="col-4 desktop-label">
                                    <h6>Country:</h6>
                                </div>
                                <div class="col text-center">
                                    <label class="form-label mobile-label"><h6>Country</h6></label>
                                    <input class="form-control text-center" type="text" name="userCountry" value="<?php echo (isset($_POST['is_edit']))?$country:'';?>" placeholder="<?php echo (isset($_POST[`is_edit`]))?$country:'enter your country';?>">
                                    <div id="invalidUserCountry" class="invalid-feedback text-center">
                                        Please enter the name of the country you reside in
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <div class="row 3 py-3">
                                <div class="col-4 desktop-label">
                                    <h6>Gender:</h6>
                                </div>
                                <div class="col text-center">
                                    <label class="form-label mobile-label"><h6>Gender</h6></label>
                                    <div class="form-check col-5 mx-auto text-start pt-2">
                                        <input class="form-check-input" type="radio" name="userGender" value="male" <?php echo (isset($_POST['is_edit']))?(($gender == 'male')?'checked':''):'';?>>
                                        <label class="form-check-label">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check col-5 mx-auto text-start pt-2">
                                        <input class="form-check-input" type="radio" name="userGender"value="female" <?php echo (isset($_POST['is_edit']))?(($gender == 'female')?'checked':''):'';?>>
                                        <label class="form-check-label">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check col-5 mx-auto text-start pt-2">
                                        <input class="form-check-input" type="radio" name="userGender"value="transgender" <?php echo (isset($_POST['is_edit']))?(($gender == 'transgender')?'checked':''):'';?>>
                                        <label class="form-check-label">
                                            Transgender
                                        </label>
                                    </div>
                                    <div class="form-check col-5 mx-auto text-start pt-2">
                                        <input class="form-check-input" type="radio" name="userGender"value="other" <?php echo (isset($_POST['is_edit']))?(($gender == 'other')?'checked':''):'';?>>
                                        <label class="form-check-label">
                                            Other
                                        </label>
                                    </div>
                                    <div class="form-check col-5 mx-auto text-start pt-2">
                                        <input class="form-check-input" type="radio" name="userGender"value="not given" <?php echo (isset($_POST['is_edit']))?(($gender == 'not given')?'checked':''):'';?>>
                                        <label class="form-check-label">
                                            None of your business!
                                        </label>
                                    </div>
                                    <div id="invalidUserGender" class="invalid-feedback text-center">
                                        Please select a gender from the list
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <div class="row py-3">
                                <div class="col-4 desktop-label">
                                    <h6>Favorite color:</h6>
                                </div>
                                <div class="col text-center mx-auto">
                                    <div class="row pb-2">
                                        <div class="col text-center">
                                            <label class="form-label mobile-label"><h6>Favorite color</h6></label>
                                            <select class="form-select select-picker mx-auto text-center" data-dropup-auto="false" aria-label="Disabled Color selection" name="userColor" >
                                                <?php
                                                if (isset($_POST['is_edit'])) {
                                                    $query2 = "SELECT * FROM tbl_222_colors";
                                                    $result2 = mysqli_query($connection, $query2);
                                                    if (!$result2) {
                                                        die("DB color query failed.");
                                                    }
                                                    $query3 = "SELECT * FROM tbl_222_colors WHERE color_id=".$favColor;
                                                    $result3 = mysqli_query($connection, $query3);

                                                    if (!$result3) {
                                                        die("DB color details query failed.");
                                                    }
                                                    $row3 = mysqli_fetch_assoc($result3);
                                                    echo '<option value="'.$favColor.'" selected>'.$row3["color_name"].'</option>';
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        if ($row2['color_id'] != $favColor) {
                                                            echo '<option value="' . $row2["color_id"] . '">' . $row2["color_name"] . '</option>';
                                                        }
                                                    }
                                                } else {
                                                    $query = "SELECT * FROM tbl_222_colors";
                                                    $result = mysqli_query($connection, $query);

                                                    if (!$result) {
                                                        die("DB query failed.");
                                                    }

                                                    echo '<option value="default" selected disabled>select your favorite color</option>';
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["color_id"].'">'.$row["color_name"].'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <div id="invalidUserFavColor" class="invalid-feedback text-center">
                                                Please select a color from the list
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 desktop-label"></div>
                            </div>
                            <!--            Blue line           -->
                            <div class="row py-4">
                                <div class="col-6 mx-auto">
                                    <div class=" mx-auto clothingLine d-block"></div>
                                </div>
                            </div>
                            <div class="row pb-4 desktop-label">
                                <div class="col mx-auto text-center"></div>
                            </div>
                            <div class="row py-4">
                                <div class="col-3 mx-auto d-flex justify-content-center">
<!--                                    ADD RESPONSIVITY HERE!!!!-->
                                    <input type="submit" name="submit" form="registerForm" class="btn btn-success mx-2" value="<?php echo (isset($_POST['is_edit']))?'Update user':'Register user';?>">
                                    <?php
                                    if (isset($_POST['is_edit'])) {
                                        echo '<a href="./userSettings.php" class="btn btn-danger mx-2">Cancel</a>';
                                    } else {
                                        echo '<a href="./login.php" class="btn btn-danger mx-2">Cancel</a>';
                                    }

                                    ?>
                                </div>
                            </div>
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
if (isset($_POST['is_edit'])){
    mysqli_free_result($result);
    mysqli_close($connection);
}
?>