<?php
include 'db.php';
include "config.php";

session_start();

if (!isset($_SESSION["user"])) {
    echo 'no user ID found! ';
    header('Location: ' . URL . 'login.php');
} else {
}
$uid = $_SESSION['user_id'];
$cid = $_GET['clothing_id'];

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
    cls.closet_name,
    cls.closet_id,
    clo.clothing_id,
    clo.clothing_name,
    clo.clothing_picture,
    clo.size_id,
    clo.secondary_color_id,
    cat.category_id,
    cat.category_name,
    col.color_id,
    col.color_picture 
    
FROM
    tbl_222_closets cls
        INNER JOIN
    tbl_222_users USING (user_id)
        INNER JOIN
    tbl_222_closet_clothes USING (closet_id)
        INNER JOIN
    tbl_222_clothes clo USING (clothing_id)
        INNER JOIN
    tbl_222_category cat USING (category_id)
        INNER JOIN
    tbl_222_colors col ON clo.color_id = col.color_id
    
WHERE
    clothing_id = $cid;
                        ";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("DB query failed.");
}
$row = mysqli_fetch_assoc($result);
$clothing_id = $cid;
$closet_id = $row['closet_id'];


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
    <title>Clother - <?php echo $row['clothing_name']?></title>
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
    <div class="row ">
        <div class="col desktop-menu">
            <nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php
                    echo '<li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                                                                       href="index.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                                                                       href="closetList.php">Closet</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="breadcrumb-link"
                                                                              href="closet.php?closet_id= ' . $row['closet_id'] . '">' . $row['closet_name'] . '</a></li>
                    <li class="breadcrumb-item active" aria-current="page">' . $row['clothing_name'] . '</li>'
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
                            <div class="row d-flex justify-content-between px-3">
                                <div class="col-3 d-flex py-1">
                                    <h1 class="desktop-label">Details</h1>
                                </div>
                                <div class="col-6 py-2">
                                    <h1 class="mobile-label text-center">Details</h1>
                                </div>
                                <div class="col-3 d-flex flex-row-reverse">
                                    <?php
                                    echo '<form name="editClothing" class="py-2" action="addClothing.php?closet_id=' . $closet_id . '" method="post">';
                                    echo '<input type="hidden" name="is_edit" value="true">';
                                    echo '<input type="hidden" name="clothing_id" value="' . $clothing_id . '">';
                                    ?>
                                    <button type="submit" class="btn text-right text-hide clothingButton editBtn"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php
                                echo '<div class="card text-bg-transparent border-0 mx-auto d-block">';
                                echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="mx-auto d-block" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
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
                            <div class="col-3 desktop-label">
                                <h6>Item's name:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Item's name</h6></label>
                                <?php
                                echo '<p class="mx-auto">' . $row['clothing_name'] . '</p>';
                                ?>
                            </div>
                            <div class="col-3 desktop-label"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-4 desktop-label">
                                <h6>Colors:</h6>
                            </div>
                            <div class="col-3 mx-auto text-center">
                                <label class="form-label mobile-label"><h6>Colors</h6></label>
                                <?php
                                echo '<div id="clothingColors" class="mx-auto d-inline-flex justify-content-center p-1 bg-body-tertiary rounded-2">';

                                echo '<img src="./images/colors/' . $row['color_picture'] . '">';
                                $query_secondary = "SELECT 
                                                            col.color_picture 
                                                        FROM
                                                            tbl_222_closets cls
                                                                INNER JOIN
                                                            tbl_222_users USING (user_id)
                                                                INNER JOIN
                                                            tbl_222_closet_clothes USING (closet_id)
                                                                INNER JOIN
                                                            tbl_222_clothes clo USING (clothing_id)
                                                                INNER JOIN
                                                            tbl_222_category cat USING (category_id)
                                                                INNER JOIN
                                                            tbl_222_colors col ON clo.secondary_color_id = col.color_id
                                                            
                                                        WHERE
                                                            clothing_id = $cid;
                                                                                ";
                                $result_color = mysqli_query($connection, $query_secondary);
                                if (!$result_color) {
                                    die("DB color query failed.");
                                }
                                $row_color = mysqli_fetch_assoc($result_color);
                                if (isset($row_color['color_picture'])) {
                                    echo '<img src="./images/colors/' . $row_color['color_picture'] . '">';
                                }

                                echo '</div>'
                                    ?>
                            </div>
                            <div class="col-4 desktop-label"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-3 desktop-label">
                                <h6>Size:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Size</h6></label>
                                <?php
                                $size = $row['size_id'];
                                echo '<p class="mx-auto">';
                                switch ($size) {
                                    case 1:
                                        echo "XS";
                                        break;
                                    case 2:
                                        echo "S";
                                        break;
                                    case 3:
                                        echo "M";
                                        break;
                                    case 4:
                                        echo "L";
                                        break;
                                    case 5:
                                        echo "XL";
                                        break;
                                }
                                echo '</p>';
                                ?>
                            </div>
                            <div class="col-3 desktop-label"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-3 desktop-label">
                                <h6>Closet:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Closet</h6></label>
                                <?php
                                echo '<p class="mx-auto">' . $row['closet_name'] . '</p>';
                                ?>
                            </div>
                            <div class="col-3 desktop-label"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-3 desktop-label">
                                <h6>Category:</h6>
                            </div>
                            <div class="col text-center">
                                <label class="form-label mobile-label"><h6>Category</h6></label>
                                <?php
                                $catId = $row['category_id'];
                                $catName = $row['category_name'];
                                function category($catId, $catName)
                                {
                                    if ($catId >= 1 && $catId <= 3) {
                                        $retCat = 'Tops';
                                        return $retCat . ': ' . $catName;
                                    } elseif ($catId == 4 || $catId == 8 || $catId == 5) {
                                        $retCat = 'Bottoms';
                                        return $retCat . ': ' . $catName;
                                    } else
                                        return 'Accessories';
                                }
                                echo '<p id="clothingCategory" class="mx-auto">' . category($catId, $catName) . '</p>';
                                ?>
                            </div>
                            <div class="col-3 desktop-label"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class=" mx-auto clothingLine d-block"></div>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col mx-auto text-center">
                                <form name="clothingRemovalForm" id="clothingRemovalForm"
                                    action="removeClothing.php" method="post">
                                    <?php
                                    echo '<input type="hidden" name="clothing_id" value="' . $clothing_id . '" form="clothingRemovalForm">';
                                    echo '<input type="hidden" name="closet_id" value="' . $closet_id . '" form="clothingRemovalForm">';
                                    ?>
                                    <button type="button" class="btn text-right text-hide clothingButton removeItemBtn"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">Remove clothing item</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete product
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    echo 'Are you sure you want to delete ' . $row['clothing_name'] . '?'
                                                        ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="removeButton">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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