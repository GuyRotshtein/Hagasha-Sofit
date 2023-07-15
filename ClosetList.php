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
<header class="p-4 py-3 border-bottom">
    <div class="d-flex align-items-center justify-content-center justify-content-md-between ">
        <!--    Hamburger menu-->
        <div class="col-4 mb-2 mb-md-0 header-hamburger">
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
                            <li class="list-group-item" class="nav-item"><a href="index.php"
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
        <!--    logo      -->
        <div class="col-4 d-flex col-md-auto mb-2 justify-content-center mb-md-0 header-logo">
            <a class="clother-logo" href="index.php"> <img src="./images/icons/new_logo.png" class=""
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
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container-fluid ">
        <!--        breadcrumbs         -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Closets List</li>
            </ol>
        </nav>
        <div class="container py-3">
            <div class="container main-container">
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
                <!--    Closet Example 1 - Business attire     -->
                <div class="row px-2 closet-preview">
                <!--    Closet name; possibly include in <a> tag-->
                    <a href="index.php">
                        <h2>Business attire</h2>
                        <!--    Some random items from the closet. Maybe first from each type. maximum of 5, spread across the entire row -> NO FLEX, USE VW+VH FOR IMAGES-->
                        <div class="card-group d-flex justify-content-between" >
                            <div class="card text-bg-transparent border-0 rounded">
                                <img src="images/coats/brown-coat.png" class="card-img" alt="Brown coat" title="Brown coat">
                                <div class="card-img-overlay"></div>
                            </div>
                            <div class="card text-bg-transparent border-0 rounded">
                                <img src="images/coats/beige-coat.png" class="card-img" alt="Beige coat" title="Beige coat">
                                <div class="card-img-overlay"></div>
                            </div>
                            <div class="card text-bg-transparent border-0 rounded">
                                <img src="images/coats/black-coat.png" class="card-img" alt="Black coat" title="Black coat">
                                <div class="card-img-overlay"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>