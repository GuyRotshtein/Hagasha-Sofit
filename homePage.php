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
<!--    <script defer src="<https://maps.googleapis.com/maps/api/js?key=**YOUR_API_KEY**&callback=initMap>"></script>-->
    <title>Clother - Home</title>
</head>
<body>
<header class="p-4 py-3 border-bottom">
    <div class="d-flex align-items-center justify-content-center justify-content-md-between "
         style="grid-template-columns: 1fr 2fr;">
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
                                <li class="list-group-item" class="nav-item"><a href="./index.html"
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
            <a class="clother-logo" href="./index.html"> <img src="./images/icons/new_logo.png" class=""
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
    <div class="row ">
        <div class="col ">
            <nav style="--bs-breadcrumb-divider: '>';" class="px-3 py-1" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div id="desktop-menu" class="col-3 py-2 border-end border-primary-subtle border-3">
            <div class="row">
            </div>
            <div class="row">
                <div class="col">
                    <!--        breadcrumbs         -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" class="nav-item"><a href="./index.html"
                                                                        class="nav-link px-3">Home</a></li>
                        <li class="list-group-item" class="nav-item"><a href="#" class="nav-link px-3">Closet</a>
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
<!--                                Search bar - use AJAX? dunno :)-->
                                <div class="col-3 py-1">
                                    <h1>Details</h1>
                                </div>
                                <div class="col-9 d-flex flex-row-reverse"></div>
                            </div>
                        </div>

                        <!--            Recommendations           -->
                        <div class="row">
                            <h5>Recommendations</h5>
                            <div class="col-1"></div>
                            <div class="col">
                                <div class="card-group d-flex flex-wrap p-2 bg-secondary gap-3">
                                    <div class="card text-bg-transparent border-0 bg-primary">
                                        <img src="images/jackets/black-jacket.png" class="card-img " alt="Black jacket" title="Black jacket">
                                        <a href="clothing.html?clothingId=1">
                                            <div class="card-img-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="card text-bg-transparent border-0">
                                        <img src="images/jackets/blue-jacket.png" class="card-img " alt="Blue jacket" title="Blue jacket">
                                        <a href="clothing.html?clothingId=1">
                                            <div class="card-img-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="card text-bg-transparent border-0">
                                        <img src="images/jackets/leather-black-jacket.png" class="card-img" alt="Leather black jacket"
                                             title="Leather black jacket">
                                        <a href="clothing.html?clothingId=1">
                                            <div class="card-img-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="card text-bg-transparent border-0">
                                        <img src="images/jackets/purple-jacket.png" class="card-img" alt="Purple jacket"
                                             title="Purple jacket">
                                        <a href="clothing.html?clothingId=1">
                                            <div class="card-img-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="card text-bg-transparent border-0">
                                        <img src="images/jackets/white-jacket.png" class="card-img" alt="White jacket" title="White jacket">
                                        <a href="clothing.html?clothingId=1">
                                            <div class="card-img-overlay"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
<!--                        Map & Weather-->
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <div class="row">
                                    <h4>Map</h4>
                                </div>
                                <div class="row">
                                    <div id="googleMap"></div>
                                </div>


                            </div>
                            <div class="col-6">
                                <h4>Weather</h4>
                            </div>
                        </div>
<!--                        Messages?-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

</html>