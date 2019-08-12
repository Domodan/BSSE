
<?php
    require_once 'functions.php';

    if (empty($_SESSION['member_id'])) {
        $page = 'log-in';
    }
    elseif(empty($_GET['page'])) {
        $page = 'sign-up';
    }
    else {
        $page = $_GET['page'];
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Library Materials Collections">
        <meta name="keywords" content="Dissertations, Thesis, Journals, Books, Forestry, Uganda National Environmetal Authority (NEMA) Library">
        <meta name="author" content="Domo Daniel Ongom">
        <meta http-equiv="refresh" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Nema Library</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="css/style.css">

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/all.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Header Section -->
        <header style="background:url(/images/green5.jpeg) repeat-x;" class="mb-1">
            <div class="w3-row w3-pdding" style="background: url(/images/nema.png) no-repeat center;">
                <div class="w3-half" style="margin:10px 0 10px 0">

                </div>
                <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small" id="head">
                    <div class="w3-right align-bottom font-weight-bold" style="margin:70px 0 1px 0">NEMA LIBRARY</div>
                </div>
            </div>
        </header>
        <!-- Top Navigation Bar Links + Site Logo-->
        <nav class="navbar navbar-expand-md sticky-top">
            <!-- Brand -->
            <a class="navbar-brand" href="#Logo">
                <img src='images/nem.jpeg' alt='Nema Library' class="rounded" style="width:60px;height:50px;">
            </a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home">Home</a>
                    </li>
                    <!-- Dropdown Menus -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Ready References
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?page=dictionary">Dictionary</a>
                            <a class="dropdown-item" href="index.php?page=encyclopedia">Encylopedia</a>
                            <a class="dropdown-item" href="index.php?page=brochures">Brochures</a>
                            <a class="dropdown-item" href="index.php?page=year-books">Year - Books</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Long - Range References
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?page=books">Books</a>
                        <a class="dropdown-item" href="index.php?page=journals">Journals</a>
                        <a class="dropdown-item" href="index.php?page=periodicals">Periodicals</a>
                            <a class="dropdown-item" href="index.php?page=reports">Reports</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Reference Assistance
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?page=locate-materials">Locating Information Materials</a>
                            <a class="dropdown-item" href="index.php?page=identify-materials">Identifying Library Materials</a>
                            <a class="dropdown-item" href="index.php?page=user-guide">User Guides</a>
                        </div>
                    </li>
                    <?php if(isset($_SESSION['is_Admin']) || isset($_SESSION['member_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=log-out">Log Out</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=log-in">Log In</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=about-us">About Us</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid mb-2">
            <div class="row">
                <!-- Side Navigation -->
                <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="nav-item border-bottom py-2"><a href="#myAccount" class="nav-link">My Library Account</a></li>
                        <li class="nav-item border-bottom py-2"><a href="#research" class="nav-link">Research Databases</a></li>
                        <li class="nav-item border-bottom py-2"><a href="#researchGuide" class="nav-link">Research Guide</a></li>
                        <li class="nav-item border-bottom py-2"><a href="contactUs" class="nav-link">Contact Us</a></li>
                        <li class="nav-item border-bottom py-2"><a href="libraryHome" class="nav-link">Library Home</a></li>
                        <li class="nav-item border-bottom py-2 mb-2"><a href="#programs" class="nav-link">Programs</a></li>
                        <h4>Working Hours</h4>
                        <p>Monday - Friday: 8:00am to 6:00pm</p>
                        <p>Saturday: 8:00 to 12:00pm</p>
                        <p>Sunday: Closed</p>
                    </ul>
                </div><!-- Side Navigation Ends Here -->
                <!-- Main Content -->
                <div class="col-md-9">
                    <?php if($page == 'home'): ?>
                    <div class="border-bottom py-2">
                        NEMA Library
                        <span style="float:right"><a href="#emailpage" class="btn btn-default">Email Page</a></span>
                    </div>
                    <!-- Carousel -->
                    <div id="demo" class="carousel slide my-3" data-ride="carousel">
                        <!-- Carousel Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                            <li data-target="#demo" data-slide-to="3"></li>
                            <li data-target="#demo" data-slide-to="4"></li>
                            <li data-target="#demo" data-slide-to="5"></li>
                            <li data-target="#demo" data-slide-to="6"></li>
                            <li data-target="#demo" data-slide-to="7"></li>
                        </ul>
                        <!-- The Slide Show -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/green2.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                    <h3>Green2</h3>
                                    <p>We had such a great time in Green2!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/green1.jpeg" alt="Green1" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                    <h3>Green1</h3>
                                    <p>Thank you, Green1!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/green.jpeg" alt="Green" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                    <h3>Green</h3>
                                    <p>We love green!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/green3.jpeg" alt="Green3" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                    <h3>Green3</h3>
                                    <p>We love green3!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/green5.jpeg" alt="Green" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                    <h3>Green5</h3>
                                    <p>We love green5!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/home.jpg" alt="Home" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                    <h3>Home</h3>
                                    <p>We love Home!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/nature.jpeg" alt="Nature" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                    <h3>Nature</h3>
                                    <p>We love Nature!</p>
                                </div>
                            </div>
                        </div>
                        <!-- Left and Right Controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div><!-- Carousel Ends Here -->
                    <!-- Search Contents Page -->
                    <div class="content p-3">
                        <p>Search for articles, books, Journals and more.</p>
                        <form class="m-2" action="" method="post">
                            <div class="form-group">
                                <label for="find">Find:</label>
                                <input type="text" name="find" class="form-control mx-2">
                            </div>
                            <input type="submit" name="search" value="GO" class="btn btn-outline-info">
                        </form>
                        <div class="row">
                            <div class="col-md-9">
                                <p>
                                    <span class="what font-weight-bolder">What is it?</span>
                                    Think of our Discovery Services as a Google search engine for our Library Materials. <a href="#learnmore">Learn more....</a>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>Choose specific Research Databases</p>
                            </div>
                        </div>
                    </div><!-- Search Contents Ends Here -->

                <?php elseif($page == 'log-in'): ?>
                    <!-- Login Form Page -->
                    <div class="row my-4">
                        <div class="col-md-6 p-3">
                            <div class="login-form">
                                <h1>Login Form</h1>
                                <form class="" action="" method="POST">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Login">
                                    <p>Don't have account, <a href="#register" class="btn btn-default">Register Here</a></p>
                                </form>
                            </div>
                        </div>
                    </div><!-- Login Form Ends Here -->

                    <!-- Logout Page -->
                <?php elseif ($page == 'log-out'): ?>
                   <?php
                       unset($_SESSION['member_id']);

                       if(isset($_SESSION['is_Admin'])) {
                           unset($_SESSION['is_Admin']);
                       }

                       header("Location: index.php?page=log-in");
                       exit();
                   ?>


                <?php elseif($page == 'sign-up'): ?>
                    <!-- Registration Form  Page-->
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <div class="form">
                                <h1 class="text-center">Registration Form</h1>
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="fname">First Name:</label>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" class="form-control" name="lname" p      laceholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Telephone:</label>
                                        <input type="tel" class="form-control" name="telephone" placeholder="Telephone">
                                    </div>
                                    <div class="form-group">
                                        <label for="password1">Password:</label>
                                        <input type="password" class="form-control" name="password1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Confirm Password:</label>
                                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender:</label>
                                        <div class="form-group form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" value="M">Male
                                            </label>
                                        </div>
                                        <div class="form-group form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="gender" value="F">Female
                                            </label>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Sign Up">
                                </form>
                            </div>
                        </div>
                    </div><!-- Registration Form Ends Here -->

                <?php elseif($page == 'books'): ?>
                    <!-- Available Books -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <h1 class="text-center">Books Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>No. in Stock</th>
                                        <th>No. Borrowed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sharon</td>
                                        <td>My book</td>
                                        <td>Available</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Janet</td>
                                        <td>Next Generation Ideas</td>
                                        <td>Borrowed</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Unknown</td>
                                        <td>The Mystery of Reality</td>
                                        <td>Available</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available books -->

                <?php elseif($page == 'journals'): ?>
                    <!-- Available Journals -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <h1 class="text-center">Journals Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Volume</th>
                                        <th>No. in Stock</th>
                                        <th>No. Borrowed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sharon</td>
                                        <td>My book</td>
                                        <td>Available</td>
                                        <td>10</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Janet</td>
                                        <td>Next Generation Ideas</td>
                                        <td>Borrowed</td>
                                        <td>8</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Unknown</td>
                                        <td>The Mystery of Reality</td>
                                        <td>Available</td>
                                        <td>30</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available Journals -->

                <?php elseif($page == 'reports'): ?>
                    <!-- Available Reports -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <h1 class="text-center">Reports Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>No. in Stock</th>
                                        <th>No. Borrowed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sharon</td>
                                        <td>My book</td>
                                        <td>Available</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Janet</td>
                                        <td>Next Generation Ideas</td>
                                        <td>Borrowed</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Unknown</td>
                                        <td>The Mystery of Reality</td>
                                        <td>Available</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available Reports -->

                <?php elseif($page == 'periodicals'): ?>
                    <!-- Available Periodicals -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <h1 class="text-center">Periodicals Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>No. in Stock</th>
                                        <th>No. Borrowed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sharon</td>
                                        <td>My book</td>
                                        <td>Available</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Janet</td>
                                        <td>Next Generation Ideas</td>
                                        <td>Borrowed</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                    <tr>
                                        <td>Unknown</td>
                                        <td>The Mystery of Reality</td>
                                        <td>Available</td>
                                        <td>600</td>
                                        <td>1500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available periodicals -->

                <?php elseif($page == 'encyclopedia'): ?>
                    <!-- Encylopedia Available -->
                    <div class="row my-5">
                        <div class="col">
                            <div class="card border-info">
                                <div class="card-header bg-info border-info">
                                    <h3>Find Encyclopedia</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>What kind of Encyclopedia do you want?</h4>
                                    </div>
                                    <div class="">
                                        <form class="form-inline" action="index.html" method="post">
                                            <div class="form-group">
                                                <label for="find" style="font-size:20px;">Find:</label>
                                                <input type="text" id="" class="form-control mx-2" name="" value="" placeholder="Search...">
                                                <input type="submit" class="btn btn-outline-primary" name="search-encyclopedia" value="Find It">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="border border-dark my-3">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Encylopedia Page -->

                <?php elseif($page == 'dictionary'): ?>
                    <!-- Dictionary Available -->
                    <div class="row my-5">
                        <div class="col">
                            <div class="card border-success">
                                <div class="card-header bg-success border-success">
                                    <h3>Find Dictionary</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>Search for Dictionary</h4>
                                    </div>
                                    <div class="">
                                        <form class="form-inline" action="index.html" method="post">
                                            <div class="form-group">
                                                <label for="find" style="font-size:20px;">Find:</label>
                                                <input type="text" id="" class="form-control mx-2" name="" value="" placeholder="Search...">
                                                <input type="submit" class="btn btn-outline-primary" name="search-encyclopedia" value="Find It">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="border border-dark my-3">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Dictionary Page -->

                <?php elseif($page == 'brochures'): ?>
                    <!-- Brochures Available -->
                    <div class="row my-5">
                        <div class="col">
                            <div class="card border-warning">
                                <div class="card-header bg-warning border-warning">
                                    <h3>Find Brochures</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>Search for the current Brochures</h4>
                                    </div>
                                    <div class="">
                                        <form class="form-inline" action="index.html" method="post">
                                            <div class="form-group">
                                                <label for="find" style="font-size:20px;">Find:</label>
                                                <input type="text" id="" class="form-control mx-2" name="" value="" placeholder="Search...">
                                                <input type="submit" class="btn btn-outline-primary" name="search-encyclopedia" value="Find It">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="border border-dark my-3">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Brochures Page -->

                <?php else: ?>
                    <!-- Year-Book Available -->
                    <div class="row my-5">
                        <div class="col">
                            <div class="card border-info">
                                <div class="card-header bg-info border-info">
                                    <h3>Find Year-Book</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>Search for Year-Book</h4>
                                    </div>
                                    <div class="">
                                        <form class="form-inline" action="index.html" method="post">
                                            <div class="form-group">
                                                <label for="find" style="font-size:20px;">Find:</label>
                                                <input type="text" id="" class="form-control mx-2" name="" value="" placeholder="Search...">
                                                <input type="submit" class="btn btn-outline-primary" name="search-encyclopedia" value="Find It">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="border border-dark my-3">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Pr. Robert K.</td>
                                                    <td>The Holy Spirit</td>
                                                    <td>Its About the word and the work of Jesus.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Year-Book Page -->

                    <div class="row my-4">
                        <div class="col">
                            <p>The National Environment Management Authority (NEMA) is a semi-autonomous institution, established in May 1995 under the National Environment Act CAP 153 and became operational in December 1995, as the principal agency in Uganda, charged with the responsibility of coordinating, monitoring, regulating and supervising environmental management in the country.</p>
                            <h4>Mandate</h4>
                            <p>The National Environment Act (NEA), Cap. 153, stipulates the Mandate of NEMA as “the principal Agency in Uganda responsible for the management of the environment by coordinating, monitoring, regulating, and supervising all activities in the field of environment”.</p>
                            <h3>THE CORE VALUES</h3>
                            <p>Over the years NEMA has established a culture that pursues the following values:
                                <ul style="list-style-type:lower-alpha;">
                                    <li>Client Focus</li>
                                    <li>Integrity and transparency</li>
                                    <li>Professional motivation and commitment</li>
                                    <li>Innovation and creativity</li>
                                    <li>Passionfor sustainable environment</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
                </div><!-- Main Contents Ends Here -->
            </div><!-- End of Page body's side Navigation and Main Content -->
        </div><!-- Container Fluid Ends Here -->
    </body>
</html>
