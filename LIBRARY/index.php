
<?php echo "Start Here"; ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Library Materials Collections">
        <meta name="keywords" content="Dissertations, Thesis, Journals, Books, Gulu University Library">
        <meta name="author" content="Domo Daniel Ongom">
        <meta http-equiv="refresh" content="30">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Library Information Circulation</title>

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
        <header>
            <div class="w3-row w3-pdding" style="background-image: url(/images/background.jpeg)">
                <div class="w3-half" style="margin:4px 0 6px 0">
                    <a href='https://www.w3schools.com'>
                        <img src='images/background.jpeg' alt='W3Schools.com' style="width:2000px;height:40px;">
                    </a>
                </div>
                <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small" id="head">
                    <div class="w3-right">Gulu University Library</div>
                </div>
            </div>
        </header>
        <!-- Top Navigation Bar Links + Site Logo-->
        <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
            <!-- Brand -->
            <a class="navbar-brand" href="#Logo">
                <img src='images/gulu.jpeg' alt='Gulu University Library' class="rounded" style="width:60px;height:50px;">
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
                            Collections
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?page=reports">Reports</a>
                            <a class="dropdown-item" href="index.php?page=books">Books</a>
                            <a class="dropdown-item" href="index.php?page=thesis">Thesis</a>
                            <a class="dropdown-item" href="index.php?page=journals">Journals</a>
                            <a class="dropdown-item" href="index.php?page=dissertations">Dissertations</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Services
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?page=circulation">Circulation</a>
                            <a class="dropdown-item" href="index.php?page=photocopying">Photocopying</a>
                            <a class="dropdown-item" href="index.php?page=staff-info">Staff-Info</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Reports
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?page=daily">Daily</a>
                            <a class="dropdown-item" href="index.php?page=monthly">Monthly</a>
                            <a class="dropdown-item" href="index.php?page=annual">Annual</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=catalogue">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=ask-librarian">Ask Librarian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=logout">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- Search Form -->
            <form class="form-inline text-right" action="" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input class="form-control mr-sm-1 my-sm-0 rounded-right" type="text" placeholder="Search">
                    <button class="btn btn-outline-success rounded" type="submit">Search</button>
                </div>
            </form>
        </nav>
        <!-- Body of the Page -->
        <div class="container-fluid">

            <!-- Row Number One in the Body page -->
            <div class="row">
                <!-- Left Side Section of the Page -->
                <div class="col-lg-2 col-md-6 border ml-4 mr-3 my-4 p-3">
                    <p>Left Side Section with some offset</p>
                    <i class="fab fa-whatsapp fa-3x fa-pull-right fa-border"></i><br>

                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><br>
                    <span class="sr-only">Loading...</span>

                    <i class="fab fa-facebook fa-3x"></i><br><br>

                    <i class="fa fa-cog fa-spin fa-3x fa-fw"></i><br><br>
                    <span class="sr-only">Loading...</span>

                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><br>
                    <span class="sr-only">Loading...</span>
                </div>
                <!-- Main Body of the Page -->
                <div class="col-lg-8 col-md-6">
                    <!-- Home Page -->
                    <div class="row mt-4 mb-5">
                        <div class="col border ml-4 mr-5 p-3">
                            <div class="">
                                Not Now
                            </div>
                        </div>
                    </div>
                    <!-- Login Form With an Alternative Sign UP -->
                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6 border ml-4 mr-3 p-3">
                            <div class="login-form">
                                <h1>Login Form</h1>
                                <form class="" action="" method="post">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Login">
                                </form>
                            </div>
                        </div>
                        <!-- Alternative Login -->
                        <div class="col-lg-5 col-md-5 border ml-4 p-3">
                            <div class="alternative-login">
                                <h3>Log In With</h3>
                                <button type="button" class="btn btn-outline-primary btn-block btn-lg"> Facebook</button>
                                <button type="button" class="btn btn-outline-primary btn-block btn-lg"> Twitter</button>
                                <button type="button" class="btn btn-outline-primary btn-block btn-lg"> Google</button>
                            </div>
                        </div>
                    </div>
                    <!-- Registration Form  Page-->
                    <div class="row my-5">
                        <div class="col-lg-6 col-md-6 border ml-4 mr-3 p-3">
                            <div class="form">
                                <h1>Registration Form</h1>
                                <form action="">
                                    <div class="form-group">
                                        <label for="fname">First Name:</label>
                                        <input type="text" class="form-control" name="fname">
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" class="form-control" name="lname">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox"> Remember me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </form>
                            </div>
                        </div>
                        <!-- Alternative Sign Up -->
                        <div class="col-lg-5 col-md-5 border ml-4 p-3">
                            <div class="alternative-signup">
                                <h3>Sign Up With</h3>
                                <button type="button" class="btn btn-outline-primary btn-block btn-lg"> Facebook</button>
                                <button type="button" class="btn btn-outline-primary btn-block btn-lg"> Twitter</button>
                                <button type="button" class="btn btn-outline-primary btn-block btn-lg"> Google</button>
                            </div>
                        </div>
                    </div>
                    <!-- Page Available Books -->
                    <div class="row my-4">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="books">

                                <h2>Available Books</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Authors</th>
                                            <th>Title</th>
                                            <th>Book Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Domo</td>
                                            <td>The Holy Spirit</td>
                                            <td>#342453</td>
                                        </tr>
                                        <tr>
                                            <td>Daniel</td>
                                            <td>The Financial Confessions</td>
                                            <td>#342903</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Available Dissertations -->
                    <div class="row my-5">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="dissertations">
                                <h2>Available Dissertations</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Book Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Domo</td>
                                            <td>The Holy Spirit</td>
                                            <td>#342453</td>
                                        </tr>
                                        <tr>
                                            <td>Daniel</td>
                                            <td>The Financial Confessions</td>
                                            <td>#342903</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Available Thesis-->
                    <div class="row my-4">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="dissertations">
                                <h2>Available Thesis</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Book Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Domo</td>
                                            <td>The Holy Spirit</td>
                                            <td>#342453</td>
                                        </tr>
                                        <tr>
                                            <td>Daniel</td>
                                            <td>The Financial Confessions</td>
                                            <td>#342903</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Available Journals -->
                    <div class="row my-5">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="dissertations">
                                <h2>Available Journals</h2>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Journal Title</th>
                                            <th>Volume</th>
                                            <th>Publisher</th>
                                            <th>Topic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Domo</td>
                                            <td>2</td>
                                            <td>MK </td>
                                            <td>The Holy Spirit</td>
                                        </tr>
                                        <tr>
                                            <td>Daniel</td>
                                            <td>4</td>
                                            <td>TM</td>
                                            <td>The Financial Confessions</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End of the Jounals -->
                </div><!-- End of the Main Body -->
                <!-- Right Side Section of the Page -->
                <div class="col border my-4 mr-4">
                    Lorem Ipsum is simply dummy
                    <i class="fab fa-whatsapp fa-3x fa-pull-right fa-border"></i><br>

                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><br>
                    <span class="sr-only">Loading...</span>

                    <i class="fab fa-facebook fa-3x"></i><br><br>

                    <i class="fa fa-cog fa-spin fa-3x fa-fw"></i><br><br>
                    <span class="sr-only">Loading...</span>

                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><br>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <!-- Footer goes here -->
        <div class="footer mt-3 mb-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 border ml-5 mr-3 py-3 background">
                    <div class="container">
                        <h4>WEBSITE NAME</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 border ml-5 mr-3 py-3 background">
                    <div class="container">
                        <h4>Useful Links</h4>
                        <ul class="list-group" style="list-style-type:none;">
                            <li>
                                <a href="#item1" class="list-group-item list-group-item-success"> First Item </a>
                            </li>
                            <li>
                                <a href="#item1" class="list-group-item list-group-item-secondary"> Second Item </a>
                            </li>
                            <li>
                                <a href="#item1" class="list-group-item list-group-item-primary"> Third Item </a>
                            </li>
                            <li>
                                <a href="#item1" class="list-group-item list-group-item-danger"> Fourth Item </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 border ml-5 mr-3 py-3 background">
                    <div class="container">
                        <h4>Contact Us</h4>
                        <address class="address">
                            <strong>Gulu University Library</strong><br>
                            Laroo Division, <br>
                            166 Gulu Municipality, <br>
                            Gulu, Uganda. <br>
                        </address>
                        <h5>Find Us on:</h5>
                        <i class="fab fa-facebook fa-3x fa-pull-left fa-border"></i>
                        <i class="fab fa-whatsapp fa-3x fa-pull-left fa-border"></i>
                        <i class="fab fa-twitter fa-3x fa-pull-left fa-border"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 border ml-5 py-3 background">
                    <div class="container">
                        <h4>News Letter</h4>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <form class="form-inline" action="">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                                <button class="btn btn-success" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
