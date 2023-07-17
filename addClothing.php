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
    <title>Clother - Add new clothing item</title>
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
        <div class="container-fluid ">
            <!--        breadcrumbs         -->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                            href="closet.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-link"
                            href="closet.php">Closet</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="breadcrumb-link"
                            href="closet.php">Business attire</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add new clothing</li>
                </ol>
            </nav>
            <div class="container py-3">
                <div class="container main-container">
                    <div class="container text-left px-0">
                        <div class="row">
                            <div class="col-3 px-3 py-1">
                                <h1>Add items</h1>
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
                    <form name="addClothingForm" action="./get_product.php" method="get"
                        onsubmit="return validateForm()">
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
                                <input class="form-control" type="text" name="item" value="" placeholder="Item's name">
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
                                <!--                                <div id="clothingColors" class="mx-auto d-flex justify-content-center">-->
                                <!--                                    <img src="./images/colors/red1.png">-->
                                <!--                                    <img src="./images/colors/red2.png">-->
                                <!--                                    <img src="./images/colors/red3.png">-->
                                <!--                                </div>-->
                                <select class="form-select w-25 mx-auto text-center"
                                    aria-label="Disabled Color selection" disabled>
                                    <option selected>Rose Red</option>
                                </select>
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-3">
                                <h6>Size</h6>
                            </div>
                            <div class="col-6 text-center">
                                <select class="form-select text-center w-25 mx-auto" name="size"
                                    aria-label="Default select example">
                                    <option selected value="default">Select a size</option>
                                    <option value="S">Small</option>
                                    <option value="M">Medium</option>
                                    <option value="L">Large</option>
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
                                    <option selected value="default">Select a closet</option>
                                    <option value="business-attire">Business attire</option>
                                    <option value="casual">Casual</option>
                                    <option value="sports">Sports</option>
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
                                    <option selected value="default">Select a category</option>
                                    <option value="jackets">Tops: Jackets</option>
                                    <option value="coats">Tops: Coats</option>
                                    <option value="shirts">Tops: Shirts</option>
                                </select>
                                <div id="invalidCategory" class="invalid-feedback text-center">
                                    Please select an option from the dropdown list
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <div class="row py-3">
                            <div class="col-3">
                                <h6>Brand name</h6>
                            </div>
                            <div class="col-6 text-center">
                                <select class="form-select text-center mx-auto" name="brand"
                                    aria-label="Default select example">
                                    <option selected value="default">Select a closet</option>
                                    <option value="gucci">Gucci</option>
                                    <option value="nike">Nike</option>
                                    <option value="amazon">Amazon</option>
                                </select>
                                <div id="invalidBrand" class="invalid-feedback text-center">
                                    Please select an option from the dropdown list
                                </div>
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
                            <div class="col-3 mx-auto d-flex justify-content-center">
                                <input type="submit" class="btn btn-outline-success mx-2" value="Confirm">
                                <button type="button" href="./index.html"
                                    class="btn btn-outline-danger mx-2">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>