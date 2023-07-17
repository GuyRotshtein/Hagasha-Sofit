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
    <title>Clother - Flannel long sleeved shirt</title>
</head>

<body>
    <header class="p-4 py-3 border-bottom">
        <div class="d-flex align-items-center justify-content-center justify-content-md-between header-wrapper">
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
                                <li class="list-group-item" class="nav-item"><a href="closet.php"
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
                <a class="clother-logo" href="closet.php"> <img src="./images/icons/new_logo.png" class=""
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
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                                                                           href="closet.php">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                                                                           href="closet.php">Closet</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a class="breadcrumb-link"
                                                                                  href="closet.php">Business attire</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Flannel long sleeved shirt</li>
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
                        <li class="list-group-item" class="nav-item"><a href="closet.php"
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
                <div class="container main-container">
                    <div class="container text-left px-0">
                        <div class="row">
                            <div class="col-3 px-3 py-1">
                                <h1>Details</h1>
                            </div>
                            <div class="col-9 d-flex flex-row-reverse">
                                <form class="py-2" action="clothing.php" method="get">
                                    <input type="hidden" name="clothingId" value="1">
                                    <button type="submit" class="btn text-right text-hide clothingButton"
                                        id="editClothingBtn"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--                Clothing image          -->
                    <div class="row">
                        <div class="col">
                            <img id="clothingImage" class="mx-auto d-block"
                                src="./images/shirts/flannel-striped-shirt.png" alt="Clothing Item"
                                title="Clothing item">
                        </div>
                    </div>
                    <!--            Blue line           -->
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <div class=" mx-auto clothingLine d-block"></div>
                        </div>
                    </div>
                    <!--            details           -->
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Item</h6>
                        </div>
                        <div class="col-6 text-center">
                            <p id="clothingName" class="mx-auto">Flannel long sleeved shirt</p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row 3 py-3">
                        <div class="col-3">
                            <h6>Colors</h6>
                        </div>
                        <div class="col-6 text-center">
                            <div id="clothingColors" class="mx-auto d-flex justify-content-center">
                                <img src="./images/colors/red1.png">
                                <img src="./images/colors/red2.png">
                                <img src="./images/colors/red3.png">
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Size</h6>
                        </div>
                        <div class="col-6 text-center">
                            <p id="clothingSize" class="mx-auto">M</p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Closet</h6>
                        </div>
                        <div class="col-6 text-center">
                            <p id="clothingCloset" class="mx-auto">Business attire</p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Category</h6>
                        </div>
                        <div class="col-6 text-center">
                            <p id="clothingCategory" class="mx-auto">Tops: Jackets</p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3">
                            <h6>Brand name</h6>
                        </div>
                        <div class="col-6 text-center">
                            <p id="clothingBrand" class="mx-auto">Lorem Ipsum</p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <!--            Blue line           -->
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <div class=" mx-auto clothingLine d-block"></div>
                        </div>
                    </div>
                    <!--            Blue line           -->
                    <div class="row py-4">
                        <div class="col mx-auto text-center">
                            <form action="clothing.php" method="get">
                                <input type="hidden" name="clothingId" value="1">
                                <button type="button" class="btn text-right text-hide clothingButton"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" id="removeClothingBtn">Remove
                                    clothing item</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete the product?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                                <button type="button" class="btn btn-primary">Yes</button>
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