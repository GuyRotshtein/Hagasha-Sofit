<?php
include "config.php";
include "db.php";
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

$cid = $_GET['closet_id'] ?: header('Location: ' . URL . 'closetList.php');
$query = "SELECT 
                            cls.closet_name,
                            cls.closet_id,
                            clo.clothing_id,
                            clo.clothing_name,
                            clo.clothing_picture,
                            cat.category_id,
                            cat.category_name
                        FROM
                            tbl_222_closets cls
                                INNER JOIN
                            tbl_222_users USING (user_id)
                                LEFT JOIN
                            tbl_222_closet_clothes USING (closet_id)
                                LEFT JOIN
                            tbl_222_clothes clo USING (clothing_id)
                                LEFT JOIN
                            tbl_222_category cat USING (category_id)
                        WHERE
                            user_id = $uid and closet_id = $cid
                        ORDER BY closet_id;";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed.");
}
$row = mysqli_fetch_assoc($result);
$clothing_id = $cid;
if (isset($row['closet_id'])) {
    $closet_id = $row['closet_id'];
}
if (isset($row['closet_name'])) {
    $closet_name = $row['closet_name'];
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
  <title>Clother - <?php echo $closet_name?></title>
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
    <div class="row">
      <div class="col-3 py-2 border-end border-primary-subtle border-3 desktop-menu">
        <div class="row">
        </div>
        <div class="row ">
          <div class="col ">
            <nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item " aria-current="page"><a class="breadcrumb-link" href="./index.php">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                    href="./closetList.php">Closets</a></li>
                <?php
                $row = mysqli_fetch_assoc($result);
                echo '<li class="breadcrumb-item active" aria-current="page">' . $closet_name . '</li>'
                  ?>
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
            <div class="container main-container">
              <div class="container text-left">
                <div class="row">
                  <div class="col desktop-label">
                    <?php
                    echo '<h1>' . $closet_name . '</h1>';
                    mysqli_data_seek($result, 0);
                    ?>
                  </div>
                    <div class="col mobile-label text-center">
                        <?php
                        echo '<h1>' . $closet_name . '</h1>';
                        mysqli_data_seek($result, 0);
                        ?>
                    </div>
                </div>
              </div>
              <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <h3>Tops</h3>
                  </div>
                </div>
                  <div class="row">
                      <div class="col-5 mobile-label mx-auto">
                          <div class=" mx-auto clothingLine d-block"></div>
                      </div>
                      <div class="col-2 desktop-label mx-auto">
                          <div class=" mx-auto clothingLine d-block"></div>
                      </div>
                  </div>
              </div>
              <div class="container text-left">
                <?php
                $data = 0;
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Coats</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Coats</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row["category_id"] == 2) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }
                }
                if ($data == 0)
                    echo '<div class="col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no coats in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;
                echo '</div></div>';
                mysqli_data_seek($result, 0);
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Jackets</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Jackets</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';

                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row["category_id"] == 3) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }
                }
                if ($data == 0)
                    echo '<div class="col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no jackets in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;
                echo '</div></div>';
                mysqli_data_seek($result, 0);
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Shirts</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Shirts</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';

                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row["category_id"] == 1) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }
                }
                if ($data == 0)
                    echo '<div class="col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no shirts in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;

                ?>
                <div class="container text-center">
                  <div class="row">
                    <div class="col">
                      <h3>Bottoms</h3>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-5 mobile-label mx-auto">
                            <div class=" mx-auto clothingLine d-block"></div>
                        </div>
                        <div class="col-2 desktop-label mx-auto">
                            <div class=" mx-auto clothingLine d-block"></div>
                        </div>
                    </div>
                </div>
                <?php
                echo '</div></div>';
                mysqli_data_seek($result, 0);
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Pants</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Pants</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';
                while ($row = mysqli_fetch_assoc($result)) {

                  if ($row["category_id"] == 4) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }
                }
                if ($data == 0)
                    echo '<div class="col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no pants in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;
                echo '</div></div>';
                mysqli_data_seek($result, 0);
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Shorts:</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Shorts</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';

                while ($row = mysqli_fetch_assoc($result)) {

                  if ($row["category_id"] == 8) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }
                }
                if ($data == 0)
                  echo '<div class="col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no coats in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;
                echo '</div></div>';
                mysqli_data_seek($result, 0);
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Shoes</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Shoes</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';

                while ($row = mysqli_fetch_assoc($result)) {

                  if ($row["category_id"] == 5) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }

                }
                if ($data == 0)
                    echo '<div class="col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no shoes in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;
                echo '</div></div>';
                mysqli_data_seek($result, 0); ?>
                <div class="container text-center">
                  <div class="row">
                    <div class="col">
                      <h3>Accessories</h3>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-5 mobile-label mx-auto">
                            <div class=" mx-auto clothingLine d-block"></div>
                        </div>
                        <div class="col-2 desktop-label mx-auto">
                            <div class=" mx-auto clothingLine d-block"></div>
                        </div>
                    </div>
                </div>
                <?php
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Hats</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Hats</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';

                while ($row = mysqli_fetch_assoc($result)) {

                  if ($row["category_id"] == 6) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }

                }
                if ($data == 0)
                    echo '<div class=" col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no hats in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;
                echo '</div></div>';

                mysqli_data_seek($result, 0);
                echo '<div class="row">';
                echo '<label class="desktop-label"><h5>Glasses</h5></label>';
                echo '<label class="mobile-label text-center"><h5>Glasses</h5></label>';
                echo '<div class="card-group d-flex flex-wrap">';

                while ($row = mysqli_fetch_assoc($result)) {

                  if ($row["category_id"] == 7) {
                    echo '<div class="card mx-auto text-bg-transparent border-0">';
                    echo '<a href="clothing.php?clothing_id=' . $row["clothing_id"] . '">';
                    echo '<img src="./uploads/clothing/' . $row["clothing_picture"] . '" class="card-img object-fit-contain" alt="' . $row["clothing_name"] . '" title="' . $row["clothing_name"] . '">';
                    echo '<div class="card-img-overlay"></div></a></div>';
                    $data = 1;
                  }

                }
                if ($data == 0)
                    echo '<div class=" col card-list-empty d-inline-flex flex-column mx-auto justify-content-center bg-light-subtle rounded-3 px-5"><p class="d-block fs-5 text-body-secondary text-center">it seems there are no glasses in the closet...<br>Maybe you can add some?</p></div>';
                else
                  $data = 0;
                echo '</div></div></div>';
                echo '<div class="row">
                                <div id="add-clothing" class="col-6 mx-auto d-flex justify-content-center">
                                <a href="addClothing.php?closet_id=' . $cid . '" class="img btn mx-auto p-0 clothingButton" role="button"></a></div></div>';

                ?>
                <div class="row">
                  <div class="col-6 mx-auto">
                    <div class=" mx-auto clothingLine d-block"></div>
                  </div>
                </div>
                <div class="row py-4">
                  <div class="col mx-auto text-center">
                    <form name="closetRemovalForm" id="closetRemovalForm" action="removeCloset.php" method="post">
                      <?php
                      echo '<input type="hidden" name="closet_id" value="' . $closet_id . '" form="closetRemovalForm">';
                      ?>
                      <button type="button" class="btn text-right text-hide clothingButton removeItemBtn removeItemBtnDanger px-5 text-bg-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" id="removeClothingBtn">Remove
                        closet</button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete closet
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <?php
                              echo 'Are you sure you want to delete ' . $closet_name . '?'
                                ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-primary" id="removeButton">Yes</button>
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
    </div>
  </main>
</body>

</html>
<?php
mysqli_free_result($result_user);
mysqli_free_result($result);
mysqli_close($connection);
?>