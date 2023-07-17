<?php
include 'db.php';
include "config.php";

session_start();

if (isset($_POST["loginMail"])) {
    $message = '';
    $query = "SELECT * FROM tbl_222_users WHERE email='"
        . $_POST["loginMail"]
        . "' and password='"
        . $_POST["loginPass"]
        . "'";

    //echo $query;//can't start echo if header comes after it
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["user"] = $row["f_name"];
        $_SESSION["user_type"] = $row['is_admin'];

        header('Location: ' . URL . 'index.php');
    } else {
            $message = "Invalid Username or Password!";
        // echo $message;
    }
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
    <title>Clother - Login</title>
</head>
<body>
<header class="p-4 py-3 border-bottom">
    <div class="d-flex align-items-center justify-content-center">
        <div class="col-4 d-flex col-md-auto mb-2 justify-content-center mb-md-0 header-logo">
            <a class="clother-logo" href="./index.php"> <img src="./images/icons/new_logo.png"></a>
        </div>
    </div>
</header>
<main>
    <div class="row justify-content-center pt-3">
        <div class="col-4 py-2">
            <div class="container main-container rounded-4 px-3">
                <div class="container text-left px-0">
                    <div class="row pb-5">
                        <div class="col-12 py-1">
                            <h1>Welcome to Clother</h1>
                            <div class="col mx-2"><h5>Your go-to for all clothing advice!</h5></div>
                        </div>
                        <div class="col-9 d-flex flex-row-reverse"></div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="container justify-content-center text-center rounded-5 px-5">
                        <h5>Log into Clother</h5>
                        <div class="col-1"></div>
                        <div class="col text-center">
                            <form action="#" method="post" id="frm">
                                <div class="row justify-content-center pt-1">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="loginMail">Email: </label>
                                            <input type="email" class="form-control text-center" required name="loginMail" id="loginMail"
                                                   aria-describedby="emailHelp" placeholder="Enter account email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center pt-3">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="loginPass">Password: </label>
                                            <input type="password" class="form-control text-center" required name="loginPass" id="loginPass"
                                                   placeholder="Enter account password">
                                        </div>
                                    </div>
                                </div>
                                <div class="error-message text-danger"><?php if (isset($message)) {
                                        echo $message;
                                    } ?></div>
                                <div class="row py-5"></div>
                                <div class="row justify-content-center py-3">
                                    <button type="submit" class="col-4 btn btn-primary">Log In</button>
                                </div>
                            </form>
                            <div class="row justify-content-center py-3">
                                <div class="col-12 d-flex flex-wrap justify-content-center">
                                    <a href="#" class="px-5">Forgot password?</a>
                                    <a href="#" class="px-5">Not registered?</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>