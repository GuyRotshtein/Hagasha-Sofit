<?php
include 'db.php';
include "config.php";

session_start();

if (!isset($_SESSION["user"])) {
    echo 'no user ID found! ';
    header('Location: ' . URL . 'login.php');
}

$uid = $_SESSION['user_id'];
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
    <title>Clother - User settings</title>
</head>
<body>
<header class="px-2 sticky-top py-3 border-bottom">
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
                                <li class="list-group-item" class="nav-item"><a href="./index.php" class="nav-link">Home</a></li>
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
                <button class=" btn d-block link-dark text-decoration-none dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="row ">
        <div class="col desktop-menu">
            <nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php
                    echo '<li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                                                                       href="index.php">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">User settings</li>'
                    ?>
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
                    <div class="container main-container">
                        <div class="container text-left px-0">
                            <div class="row">
                                <div class="col-3 px-3 py-1">
                                    <h1>User page</h1>
                                </div>
                                <div class="col-9 d-flex flex-row-reverse">
                                    <?php
                                    echo '<form name="editUser" class="py-2" action="registerUser.php" method="post">';
                                    echo '<input type="hidden" name="is_edit" value="true">';
                                    echo '<input type="hidden" name="userId" value="' . $uid . '">';
                                    ?>
                                    <button type="submit" class="btn text-right text-hide clothingButton editBtn"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php
                                echo '<div class="card text-bg-transparent border-0 mx-auto d-block pb-5">';
                                echo '<img src="./uploads/user_pictures/' . $picture . '" class="mx-auto rounded-circle card-img object-fit-cover" alt="' . $fName .' '. $lName . '" title="' . $fName .' '. $lName . '">';
                                echo '<div class="card-img-overlay"></div></div>';
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class=" mx-auto clothingLine d-block"></div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-3">
                            </div>
                            <div class="col-6 text-center">
                                <?php
                                echo '<h3 class="mx-auto">Account Details:</h3>';
                                ?>
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <div class="row 3 py-3">
                            <div class="col-4 desktop-label">
                                <h6>First name: </h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>First name</h6></label>
                                <input type="text" class="form-control w-100 mx-auto text-center" placeholder="<?php echo $fName;?>" disabled>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-4 desktop-label">
                                <h6>Last name: </h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Last name</h6></label>
                                <input type="text" class="form-control w-100 mx-auto text-center" placeholder="<?php echo $lName;?>" disabled>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row 3 py-3">
                            <div class="col-4 desktop-label">
                                <h6>E-mail:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>E-mail address</h6></label>
                                <input type="text" class="form-control w-100 mx-auto text-center" placeholder="<?php echo $eMail;?>" disabled>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-4 desktop-label">
                                <h6>Password:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Password</h6></label>
                                <input type="text" class="form-control w-100 mx-auto text-center" placeholder="<?php
                                    for ($i = 0; $i < $pass; $i++){
                                        echo '*';
                                }?>" disabled>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row 3 py-3">
                            <div class="col-4 desktop-label">
                                <h6>Phone number:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Phone number</h6></label>
                                <input type="text" class="form-control w-100 mx-auto text-center" placeholder="<?php echo $phone;?>" disabled>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row 3 py-3">
                            <div class="col-4 desktop-label">
                                <h6>Country:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Country</h6></label>
                                <input type="text" class="form-control w-100 mx-auto text-center" placeholder="<?php echo $country;?>" disabled>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row 3 py-3">
                            <div class="col-4 desktop-label">
                                <h6>Gender:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Gender</h6></label>
                                <input type="text" class="form-control w-100 mx-auto text-center" placeholder="<?php echo $gender;?>" disabled>
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
                                        <?php
                                        $query2 = "SELECT * FROM tbl_222_colors WHERE color_id = $favColor";
                                        $result2 = mysqli_query($connection, $query2);
                                        if (!$result2) {
                                            die("DB color query failed.");
                                        }
                                        $row2 = mysqli_fetch_assoc($result2);
                                        ?>
                                        <input type="text" class="form-control mx-auto text-center" placeholder="<?php echo $row2['color_name'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row py-4">
                            <div class="col-6 mx-auto">
                                <div class=" mx-auto clothingLine d-block"></div>
                            </div>
                        </div>
                        <div class="row pb-4">
                            <div class="col mx-auto text-center">
                                <form name="userRemovalForm" id="userRemovalForm"
                                      action="userCRUD.php" method="POST">
                                    <input type="hidden" name="is_remove" value="true">
                                </form>
                                <button type="button" class="btn text-right text-hide clothingButton removeItemBtn removeItemBtnDanger px-5 text-bg-danger"
                                        data-bs-toggle="modal" data-bs-target="#removeUserModal">Delete User</button>
                                <div class="modal fade" id="removeUserModal" tabindex="-1"
                                     aria-labelledby="removeUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="removeUserModalLabel">Delete <?php $fName.' '.$lName?>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                echo 'Are you sure you want to delete your user? <br><br> all of your data will be lost'
                                                ?>
                                            </div>
                                            <div class="modal-footer mx-auto">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                <button type="submit" form="userRemovalForm" class="btn btn-primary"
                                                        id="removeButton">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
mysqli_free_result($result);
mysqli_close($connection);
?>