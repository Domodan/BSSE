
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
        <header style="background:url(images/green5.jpeg) repeat-x;" class="mb-1">
            <div class="w3-row w3-pdding" style="background: url(images/nema.png) no-repeat center;">
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
                            <a class="dropdown-item" href="index.php?page=year-book">Year - Books</a>
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
                            <a class="dropdown-item" href="index.php?page=search">Locating Information Materials</a>
                            <a class="dropdown-item" href="index.php?page=search">Identifying Library Materials</a>
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
                <div class="col-md-2">
                    <ul class="nav flex-column">
                        <li class="nav-item border-bottom py-2"><a href="index.php?page=sign-up" class="nav-link">My Library Account</a></li>
                        <li class="nav-item border-bottom py-2"><a href="#research" class="nav-link disabled">Research Databases</a></li>
                        <li class="nav-item border-bottom py-2"><a href="#researchGuide" class="nav-link disabled">Research Guide</a></li>
                        <li class="nav-item border-bottom py-2"><a href="index.php?page=contact-us" class="nav-link">Contact Us</a></li>
                        <li class="nav-item border-bottom py-2"><a href="index.php?page=home" class="nav-link">Library Home</a></li>
                        <li class="nav-item border-bottom py-2 mb-2"><a href="index.php?page=about-us" class="nav-link">Programs</a></li>
                        <h4>Working Hours</h4>
                        <p>Monday - Friday: 8:00am to 6:00pm</p>
                        <p>Saturday: 8:00 to 12:00pm</p>
                        <p>Sunday: Closed</p>
                    </ul>
                </div><!-- Side Navigation Ends Here -->
                <!-- Main Content -->
                <div class="col-md-10">
                    <?php if($page == 'home'): ?>
                    <div class="border-bottom py-2">
                        NEMA Library
                        <span style="float:right"><a href="#emailpage" class="btn btn-default">Email Page</a></span>
                    </div>
                    <!-- Carousel -->
                    <div id="demo" class="carousel slide my-3" data-ride="carousel">
                        <!-- The Slide Show -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/lib.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/lib1.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library7.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library4.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library8.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library6.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library5.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library3.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library2.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/library1.jpeg" alt="Green2" class="d-block w-100" height="500">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="carousel-item ">
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
                            <?php
                                $username = $password = '';
                                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    if(empty($_POST['username'])) {
                                        $error_message = "Username field cannot be empty";
                                    }
                                    else {
                                        $username = clean_data($_POST['username']);
                                    }
                                    if(empty($_POST['password'])) {
                                        $error_message = "Password field cannot be empty";
                                    }
                                    else {
                                        $password = clean_data($_POST['password']);
                                    }

                                    if(login_successful($username, $password)){
                                        if(isset($_SESSION['is_Admin'])){
                                            header('Location: index.php?page=home');
                                        }
                                        else {
                                            header('Location:index.php?page=home');
                                        }
                                        exit();
                                    }
                                    else {
                                        $error_message = "Invalid Username/Password Combination.";
                                    }
                                }
                                // else {
                                //     if(isset($_GET['sign-up'])) {
                                //         header("Location:index.php?page=sign-up");
                                //     }
                                // }
                            ?>
                            <div class="login-form">
                                <h1>Login Form</h1>
                                <?php if(isset($error_message)): ?>
                                   <div class="alert alert-danger">
                                       <?php echo $error_message; ?>
                                   </div>
                               <?php endif; ?>
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
                                </form>
                            </div>
                            <p style="font-size:18px;">Don't have an account, <a href="index.php?page=sign-up" class="btn btn-outline-info">Register Here</a></p>
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
                       exit;
                   ?>

                <?php elseif($page == 'sign-up'): ?>
                    <!-- Registration Form  Page-->
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <?php
                               if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                   $fname = clean_data($_POST['fname']);
                                   $lname = clean_data($_POST['lname']);
                                   $username = clean_data($_POST['username']);
                                   $email = clean_data($_POST['email']);
                                   $telephone = clean_data($_POST['telephone']);
                                   $password = clean_data($_POST['password1']);
                                   $confirm_password = clean_data($_POST['password2']);
                                   $gender = clean_data($_POST['gender']);

                                   $sql = sprintf("SELECT * FROM Members WHERE Username = '$username' AND Password = '$password'");
                                   $result = mysqli_query($connect, $sql);
                                   $count = mysqli_num_rows($result);

                                   if($password != $confirm_password) {
                                       $error_message = "Error, Two Passwords do not match.";
                                   }
                                   elseif ($count > 0) {
                                       $error_message = "Error, User already exist.";
                                   }
                                   else {
                                       add_member($fname, $lname, $username, $email, $telephone, $gender, $password);

                                       $success_message = "New User registered successfully.";
                                   }
                               }
                           ?>
                            <div class="form">
                                <h1 class="text-center">Registration Form</h1>
                                <?php if(isset($error_message)): ?>
                                    <div class="alert alert-danger">
                                        <p><?php echo $error_message; ?></p>
                                    </div>
                                <?php elseif(isset($success_message)): ?>
                                    <div class="alert alert-success">
                                        <p><?php echo $success_message; ?></p>
                                    </div>
                                <?php endif; ?>
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="fname">First Name:</label>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Telephone:</label>
                                        <input type="tel" class="form-control" name="telephone" placeholder="Telephone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password1">Password:</label>
                                        <input type="password" class="form-control" name="password1" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Confirm Password:</label>
                                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>
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
                                    Already have an account, <a href="index.php?page=log-in" class="btn btn-outline-info">Sign In Here</a>
                                </form>
                            </div>
                        </div>
                    </div><!-- Registration Form Ends Here -->

                <?php elseif($page == 'add-materials'): ?>
                    <!-- Uploading a new Item -->
                    <div class="row my-5">
                        <div class="col-md-6 border shadow py-2 px-4">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $author = clean_data($_POST['author']);
                                    $title = clean_data($_POST['title']);
                                    $type = clean_data($_POST['type']);
                                    $description = clean_data($_POST['description']);

                                    $file_name = $_FILES['file']['name'];
                                    $file_type = $_FILES['file']['type'];
                                    $temp_name = $_FILES['file']['tmp_name'];

                                    $folder = "web/".$file_name;

                                    $sql = sprintf("SELECT * FROM Collections WHERE Author = '$author' AND Title = '$title' AND Type = '$type'");
                                    $result = mysqli_query($connect, $sql);

                                    if(mysqli_num_rows($result) > 0) {
                                        $error_message = "Error, <br>   File/Material already exist. Please try again.";
                                    }else {
                                        if (move_uploaded_file($temp_name, $folder)) {
                                            add_collection ($author, $title, $type, $file_type, $file_name, $description);
                                            $success_message = "Success, <br> Files/Materials uploaded Successfully.";
                                        }else {
                                            $error_message = "Error, <br> File upload failed, please try again.";
                                        }
                                    }
                                }
                            ?>
                            <h1 class="text-center">Add Materials</h1>
                            <?php if(isset($success_message)): ?>
                                <div class="alert alert-success">
                                    <?= $success_message; ?>
                                </div>
                            <?php elseif(isset($error_message)): ?>
                                <div class="alert alert-danger">
                                    <?= $error_message; ?>
                                </div>
                            <?php endif; ?>
                            <form class="" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" name="author" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Type</label>
                                    <select class="custom-select" name="materials" required>
                                        <option selected>Book</option>
                                        <option value="">Book</option>
                                        <option value="">Report</option>
                                        <option value="">Year-Book</option>
                                        <option value="">Encylopedia</option>
                                        <option value="">Journal</option>
                                        <option value="">Dictionary</option>
                                        <option value="">Brochure</option>
                                        <option value="">Periodical</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file to Upload</label>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-outline-success mt-2" value="Upload">
                            </form>
                        </div>
                    </div><!-- Upload a new File -->

                <?php elseif($page == 'books'): ?>
                    <!-- Available Books -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <?php
                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Book'");
                                $result = mysqli_query($connect, $sql);
                                $count = 1;
                            ?>
                            <h1 class="text-center">Books Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <?php if(isset($_SESSION['is_Admin'])): ?>
                                    <div class="col-md my-2">
                                        <a href="index.php?page=add-materials" class="btn btn-outline-warning" style="margin-bottom: 5px;"><i style="font-size:18px;">Add <?= (($_GET['page'] == 'books')?'Books':''); ?></i></a>
                                    </div>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th># ssn</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th colspan="2">View & Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($books = mysqli_fetch_array($result)): ?>
                                   <tr>
                                       <td><?=$count?></td>
                                       <td><?=$books['Author']?></td>
                                       <td><?=$books['Title']?></td>
                                       <td><?=$books['Description']?></td>
                                       <td><?=$books['Status']?></td>
                                       <td>
                                           <a href="<?= "web/viewer.html?file=".$books['File_Name']; ?>" style="font-size: 30px; color: Tomato;">
                                               <span class="fas fa-file-pdf"></span>
                                           </a>
                                       </td>
                                       <td>
                                           <a href="<?= "web/".$books['File_Name']; ?>" style="font-size: 30px; color: Mediumslateblue;" download>
                                               <span class="fas fa-download"></span>
                                           </a>
                                       </td>
                                   </tr>
                                   <?php $count++; ?>
                               <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available books -->

                <?php elseif($page == 'journals'): ?>
                    <!-- Available Journals -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <?php
                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Journals'");
                                $result = mysqli_query($connect, $sql);
                                $count = 1;
                            ?>
                            <h1 class="text-center">Journals Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <?php if(isset($_SESSION['is_Admin'])): ?>
                                    <div class="col-md my-2">
                                        <a href="index.php?page=add-materials" class="btn btn-outline-warning" style="margin-bottom: 5px;"><i style="font-size:18px;">Add <?= (($_GET['page'] == 'journals')?'Journals':''); ?></i></a>
                                    </div>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th># ssn</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th colspan="2">View & Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($journals = mysqli_fetch_array($result)): ?>
                                   <tr>
                                       <td><?=$count?></td>
                                       <td><?=$journals['Author']?></td>
                                       <td><?=$journals['Title']?></td>
                                       <td><?=$journals['Description']?></td>
                                       <td><?=$journals['Status']?></td>
                                       <td>
                                           <a href="<?= "web/viewer.html?file=".$journals['File_Name']; ?>" style="font-size: 30px; color: Tomato;">
                                               <span class="fas fa-file-pdf"></span>
                                           </a>
                                       </td>
                                       <td>
                                           <a href="<?= "web/".$journals['File_Name']; ?>" style="font-size: 30px; color: Mediumslateblue;" download>
                                               <span class="fas fa-download"></span>
                                           </a>
                                       </td>
                                   </tr>
                                   <?php $count++; ?>
                               <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available Journals -->

                <?php elseif($page == 'reports'): ?>
                    <!-- Available Reports -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <?php
                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Reports'");
                                $result = mysqli_query($connect, $sql);
                                $count = 1;
                            ?>
                            <h1 class="text-center">Reports Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <?php if(isset($_SESSION['is_Admin'])): ?>
                                    <div class="col-md my-2">
                                        <a href="index.php?page=add-materials" class="btn btn-outline-warning" style="margin-bottom: 5px;"><i style="font-size:18px;">Add <?= (($_GET['page'] == 'reports')?'Reports':''); ?></i></a>
                                    </div>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th># ssn</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th colspan="2">View & Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($reports = mysqli_fetch_array($result)): ?>
                                   <tr>
                                       <td><?=$count?></td>
                                       <td><?=$reports['Author']?></td>
                                       <td><?=$reports['Title']?></td>
                                       <td><?=$reports['Description']?></td>
                                       <td><?=$reports['Status']?></td>
                                       <td>
                                           <a href="<?= "web/viewer.html?file=".$reports['File_Name']; ?>" style="font-size: 30px; color: Tomato;">
                                               <span class="fas fa-file-pdf"></span>
                                           </a>
                                       </td>
                                       <td>
                                           <a href="<?= "web/".$reports['File_Name']; ?>" style="font-size: 30px; color: Mediumslateblue;" download>
                                               <span class="fas fa-download"></span>
                                           </a>
                                       </td>
                                   </tr>
                                   <?php $count++; ?>
                               <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available Reports -->

                <?php elseif($page == 'periodicals'): ?>
                    <!-- Available Periodicals -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <?php
                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Periodicals'");
                                $result = mysqli_query($connect, $sql);
                                $count = 1;
                            ?>
                            <h1 class="text-center">Periodicals Available</h1>
                            <table class="table table-bordered table-striped table-hover">
                                <?php if(isset($_SESSION['is_Admin'])): ?>
                                    <div class="col-md my-2">
                                        <a href="index.php?page=add-materials" class="btn btn-outline-warning" style="margin-bottom: 5px;"><i style="font-size:18px;">Add <?= (($_GET['page'] == 'periodicals')?'Periodicals':''); ?></i></a>
                                    </div>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th># ssn</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th colspan="2">View & Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($periodicals = mysqli_fetch_array($result)): ?>
                                   <tr>
                                       <td><?=$count?></td>
                                       <td><?=$periodicals['Author']?></td>
                                       <td><?=$periodicals['Title']?></td>
                                       <td><?=$periodicals['Description']?></td>
                                       <td><?=$periodicals['Status']?></td>
                                       <td>
                                           <a href="<?= "web/viewer.html?file=".$periodicals['File_Name']; ?>" style="font-size: 30px; color: Tomato;">
                                               <span class="fas fa-file-pdf"></span>
                                           </a>
                                       </td>
                                       <td>
                                           <a href="<?= "web/".$periodicals['File_Name']; ?>" style="font-size: 30px; color: Mediumslateblue;" download>
                                               <span class="fas fa-download"></span>
                                           </a>
                                       </td>
                                   </tr>
                                   <?php $count++; ?>
                               <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of the available periodicals -->

                <?php elseif($page == 'encyclopedia'): ?>
                    <!-- Encylopedia Available -->
                    <div class="row my-5" style="font-size:20px;">
                        <div class="col">
                            <div class="card border-primary">
                                <div class="card-header bg-primary border-primary">
                                    <h3 style="font-size:35px;color:#ffffff;font-family:'Times New Roman'; " class="text-center font-weight-bolder">Find Encyclopedia</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Encyclopedia'");

                                        if(isset($_POST['search'])) {
                                            $search_item = clean_data($_POST['item']);

                                            if($search_item == "") {
                                                echo "<div class=\"alert alert-danger\"><h4>Error, <br>No Item specified for Searching.</h4></div>";

                                                echo "<a href=\"index.php?page=encyclopedia\" class=\"btn btn-outline-primary\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                exit;
                                            }
                                            else {
                                                $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Encyclopedia' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";

                                                if(mysqli_num_rows(mysqli_query($connect, $sql)) <= 0) {

                                                    echo "<div class=\"alert alert-danger\"><h4>Result not found. Search for another item.</h4></div>";

                                                    echo "<a href=\"index.php?page=encyclopedia\" class=\"btn btn-outline-primary\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                    exit;
                                                }
                                                else {
                                                    $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Encyclopedia' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";
                                                }
                                            }
                                        }

                                        $result = mysqli_query($connect, $sql);
                                        $count = 1;
                                    ?>
                                    <div class="card-title">
                                        <h4>What kind of Encyclopedia do you want?</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-inline" action="index.html" method="post">
                                                <div class="form-group">
                                                    <label for="find">Find:</label>
                                                    <input type="text" class="form-control mx-2" name="item" placeholder="Search...">
                                                    <input type="submit" class="btn btn-outline-primary" name="search" value="Find It">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                        <div class="col">
                                            <a href="index.php?page=add-materials" class="btn btn-outline-primary" style="float: right; margin-bottom: 8px;"><i style="font-size:18px;">Add <?=(($_GET['page'] == 'encyclopedia')?'Encyclopedia':'');?></i></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="my-3">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th># ssn</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th colspan="2">View & Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($Encyclopedia = mysqli_fetch_array($result)): ?>
                                                    <tr>
                                                        <td><?=$count?></td>
                                                        <td><?=$Encyclopedia['Author']?></td>
                                                        <td><?=$Encyclopedia['Title']?></td>
                                                        <td><?=$Encyclopedia['Description']?></td>
                                                        <td><?=$Encyclopedia['Status']?></td>
                                                        <td>
                                                            <a href="<?= "web/viewer.html?file=".$Encyclopedia['File_Name'] ?>" style="font-size: 30px; color: Tomato;">
                                                                <span class="fas fa-file-pdf"></span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= "web/".$Encyclopedia['File_Name'] ?>" style="font-size: 30px; color: Mediumslateblue;">
                                                                <span class="fas fa-download"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $count++; ?>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Encylopedia Page -->

                <?php elseif($page == 'dictionary'): ?>
                    <!-- Dictionary Available -->
                    <div class="row my-5" style="font-size:20px;">
                        <div class="col">
                            <div class="card border-success">
                                <div class="card-header bg-success border-success">
                                    <h3 style="font-size:35px;color:#ffffff;font-family:'Times New Roman'; " class="text-center font-weight-bolder">Find Dictionary</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Dictionary'");

                                        if(isset($_POST['search'])) {
                                            $search_item = clean_data($_POST['item']);

                                            if($search_item == "") {
                                                echo "<div class=\"alert alert-danger\"><h4>Error, <br>No Item specified for Searching.</h4></div>";

                                                echo "<a href=\"index.php?page=dictionary\" class=\"btn btn-outline-success\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                exit;
                                            }
                                            else {
                                                $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Dictionary' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";

                                                if(mysqli_num_rows(mysqli_query($connect, $sql)) <= 0) {

                                                    echo "<div class=\"alert alert-danger\"><h4>Result not found. Search for another item.</h4></div>";

                                                    echo "<a href=\"index.php?page=dictionary\" class=\"btn btn-outline-success\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                    exit;
                                                }
                                                else {
                                                    $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Dictionary' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";
                                                }
                                            }
                                        }

                                        $result = mysqli_query($connect, $sql);
                                        $count = 1;
                                    ?>
                                    <div class="card-title">
                                        <h4>Search for Dictionary</h4>
                                    </div>
                                    <div class="">
                                        <form class="form-inline" action="index.html" method="post">
                                            <div class="form-group">
                                                <label for="find" style="font-size:20px;">Find:</label>
                                                <input type="text" class="form-control mx-2" name="item" placeholder="Search...">
                                                <input type="submit" class="btn btn-outline-success" name="search" value="Find It">
                                            </div>
                                        </form>
                                    </div>
                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                        <div class="col">
                                            <a href="index.php?page=add-materials" class="btn btn-outline-success" style="float: right; margin-bottom: 8px;"><i style="font-size:18px;">Add <?=(($_GET['page'] == 'dictionary')?'Dictionary':'');?></i></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="my-4">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th># ssn</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th colspan="2">View & Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($Dictionary = mysqli_fetch_array($result)): ?>
                                                    <tr>
                                                        <td><?=$count?></td>
                                                        <td><?=$Dictionary['Author']?></td>
                                                        <td><?=$Dictionary['Title']?></td>
                                                        <td><?=$Dictionary['Description']?></td>
                                                        <td><?=$Dictionary['Status']?></td>
                                                        <td>
                                                            <a href="<?= "web/viewer.html?file=".$Dictionary['File_Name'] ?>" style="font-size: 30px; color: Tomato;">
                                                                <span class="fas fa-file-pdf"></span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= "web/".$Dictionary['File_Name'] ?>" style="font-size: 30px; color: Mediumslateblue;">
                                                                <span class="fas fa-download"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $count++; ?>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Dictionary Page -->

                <?php elseif($page == 'brochures'): ?>
                    <!-- Brochures Available -->
                    <div class="row my-5" style="font-size:20px;">
                        <div class="col">
                            <div class="card border-warning">
                                <div class="card-header bg-warning border-warning">
                                    <h3 style="font-size:35px;color:#000;font-family:'Times New Roman'; " class="text-center font-weight-bolder">Find Brochures</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Brochure'");

                                        if(isset($_POST['search'])) {
                                            $search_item = clean_data($_POST['item']);

                                            if($search_item == "") {
                                                echo "<div class=\"alert alert-danger\"><h4>Error, <br>&nbsp;&nbsp;&nbsp;&nbsp;No Item specified for Searching.</h4></div>";

                                                echo "<a href=\"index.php?page=brochures\" class=\"btn btn-outline-warning\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                exit;
                                            }
                                            else {
                                                $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Brochure' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";

                                                if(mysqli_num_rows(mysqli_query($connect, $sql)) <= 0) {

                                                    echo "<div class=\"alert alert-danger\"><h4>Result not found. Search for another item.</h4></div>";

                                                    echo "<a href=\"index.php?page=brochures\" class=\"btn btn-outline-warning\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                    exit;
                                                }
                                                else {
                                                    $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Brochure' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";
                                                }
                                            }
                                        }

                                        $result = mysqli_query($connect, $sql);
                                        $count = 1;
                                    ?>
                                    <div class="card-title">
                                        <h4>Search for the current Brochures</h4>
                                    </div>
                                    <div class="">
                                        <form class="form-inline" action="index.html" method="post">
                                            <div class="form-group">
                                                <label for="find" style="font-size:20px;">Find:</label>
                                                <input type="text" id="" class="form-control mx-2" name="item" placeholder="Search...">
                                                <input type="submit" class="btn btn-outline-warning" name="search" value="Find It">
                                            </div>
                                        </form>
                                    </div>
                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                        <div class="col">
                                            <a href="index.php?page=add-materials" class="btn btn-outline-warning" style="float: right; margin-bottom: 8px;"><i style="font-size:18px;">Add <?=(($_GET['page'] == 'brochures')?'Brochures':'');?></i></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="my-3">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th># ssn</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th colspan="2">View & Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($Brochures = mysqli_fetch_array($result)): ?>
                                                    <tr>
                                                        <td><?=$count?></td>
                                                        <td><?=$Brochures['Author']?></td>
                                                        <td><?=$Brochures['Title']?></td>
                                                        <td><?=$Brochures['Description']?></td>
                                                        <td><?=$Brochures['Status']?></td>
                                                        <td>
                                                            <a href="<?= "web/viewer.html?file=".$Brochures['File_Name'] ?>" style="font-size: 30px; color: Tomato;">
                                                                <span class="fas fa-file-pdf"></span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= "web/".$Brochures['File_Name'] ?>" style="font-size: 30px; color: Mediumslateblue;">
                                                                <span class="fas fa-download"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $count++; ?>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Brochures Page -->

                <?php elseif($page == 'year-book'): ?>
                    <!-- Year-Book Available -->
                    <div class="row my-5" style="font-size:20px;">
                        <div class="col">
                            <div class="card border-info">
                                <div class="card-header bg-info border-info">
                                    <h3 style="font-size:35px;color:#ffffff;font-family:'Times New Roman'; " class="text-center font-weight-bolder">Find Year-Book</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Year-Book'");

                                        if(isset($_POST['search'])) {
                                            $search_item = clean_data($_POST['item']);

                                            if($search_item == "") {
                                                echo "<div class=\"alert alert-danger\"><h4>Error, <br>No Item specified for Searching.</h4></div>";

                                                echo "<a href=\"index.php?page=year-book\" class=\"btn btn-outline-info\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                exit;
                                            }
                                            else {
                                                $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Year-Book' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";

                                                if(mysqli_num_rows(mysqli_query($connect, $sql)) <= 0) {

                                                    echo "<div class=\"alert alert-danger\"><h4>Result not found. Search for another item.</h4></div>";

                                                    echo "<a href=\"index.php?page=year-book\" class=\"btn btn-outline-info\" style=\"font-size: 20px; color: Purple;\"><span class=\"fas fa-hand-point-left\"></span> Go back</a>";

                                                    exit;
                                                }
                                                else {
                                                    $sql = "SELECT * FROM `Collections` WHERE `Type` = 'Year-Book' AND `Author` LIKE '%$search_item%' OR `Title` LIKE '%$search_item%' OR `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";
                                                }
                                            }
                                        }
                                        $result = mysqli_query($connect, $sql);
                                        $count = 1;
                                    ?>
                                    <div class="card-title">
                                        <h4>Search for Year-Book</h4>
                                    </div>
                                    <div class="">
                                        <form class="form-inline" action="" method="post">
                                            <div class="form-group">
                                                <label for="find" style="font-size:20px;">Find:</label>
                                                <input type="text" id="" class="form-control mx-2" name="item" placeholder="Search...">
                                                <input type="submit" class="btn btn-outline-info" name="search" value="Find It">
                                            </div>
                                        </form>
                                    </div>
                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                        <div class="col">
                                            <a href="index.php?page=add-materials" class="btn btn-outline-info" style="float: right; margin-bottom: 8px;"><i style="font-size:18px;">Add <?=(($_GET['page'] == 'year-book')?'Year-Book':'');?></i></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="border-dark my-3">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th># ssn</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th colspan="2">View & Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($YearBook = mysqli_fetch_array($result)): ?>
                                                    <tr>
                                                        <td><?=$count?></td>
                                                        <td><?=$YearBook['Author']?></td>
                                                        <td><?=$YearBook['Title']?></td>
                                                        <td><?=$YearBook['Description']?></td>
                                                        <td><?=$YearBook['Status']?></td>
                                                        <td>
                                                            <a href="<?= "web/viewer.html?file=".$YearBook['File_Name'] ?>" style="font-size: 30px; color: Tomato;">
                                                                <span class="fas fa-file-pdf"></span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= "web/".$YearBook['File_Name'] ?>" style="font-size: 30px; color: Mediumslateblue;">
                                                                <span class="fas fa-download"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php $count++; ?>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Year-Book Page -->

                <?php elseif($page == 'search'): ?>
                    <!-- Searching and Locating Information -->
                    <div class="row shadow mx-2 my-4">
                        <div class="col-md-10 p-2">
                            <form class="border p-2" action="" method="POST">
                                <h2 class="text-center my-5" style="font-family:'Times New Roman'">Locate Material of Choice</h2>
                                <div class="input-group mb-3 px-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="search_type">Search Type</label>
                                    </div>
                                    <select class="custom-select" name="materials" required>
                                        <option selected>Book</option>
                                        <option value="">Book</option>
                                        <option value="">Report</option>
                                        <option value="">Year-Book</option>
                                        <option value="">Encylopedia</option>
                                        <option value="">Journal</option>
                                        <option value="">Dictionary</option>
                                        <option value="">Brochure</option>
                                        <option value="">Periodical</option>
                                    </select>
                                </div>
                                <div class="input-group my-3 px-5">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="search_item">Search Item</label>
                                    </div>
                                    <input type="text" class="form-control" name="item" placeholder="Search..." required>
                                    <div class="input-group-prepend">
                                        <input type="submit" class="btn btn-outline-success rounded" value="Find It">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row shadow mx-2 my-4">
                        <div class="col p-3">
                            <?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                                <?php
                                    $search_type = clean_data($_POST['materials']);
                                    $search_item = clean_data($_POST['item']);
                                    $count = 1;

                                    $sql = "SELECT * FROM `Collections` WHERE `Type` = '$search_type' AND `File_Name` LIKE '%$search_item%' OR `Description` LIKE '%$search_item%'";

                                    $result = mysqli_query($connect, $sql);
                                ?>
                                <?php if(mysqli_num_rows($result) > 0): ?>
                                    <table class="table table-striped table-hover table-bordered table-dark">
                                        <thead>
                                            <tr>
                                                <th># ssn</th>
                                                <th>Author</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th colspan="2">View & Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($search_result = mysqli_fetch_array($result)): ?>
                                                <tr>
                                                    <td><?=$count?></td>
                                                    <td><?=$search_result['Author']?></td>
                                                    <td><?=$search_result['Title']?></td>
                                                    <td><?=$search_result['Type']?></td>
                                                    <td>
                                                        <a href="<?= "web/viewer.html?file=".$search_result['File_Name'] ?>" style="font-size: 30px; color: Tomato;">
                                                            <span class="fas fa-file-pdf text-center"></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= "web/".$search_result['File_Name'] ?>" style="font-size: 30px; color: Mediumslateblue;">
                                                            <span class="fas fa-download"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $count++; ?>
                                            <?php endwhile; ?>
                                    <?php else: ?>
                                        <div class="alert alert-danger">
                                            <span style="font-size:20px;">Sorry, Could not locate the Item.<br>&nbsp; &nbsp; &nbsp; &nbsp;Please try again with more search items.</span>
                                        </div>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div><!-- End of Search and Locate Page -->

                <?php elseif($page == 'contact-us'): ?>
                    <!-- Contact Us Page -->
                    <div class="row my-4" style="font-size:20px;">
                        <div class="col-md-2 shadow p-3 mx-4 my-4 bg-white rounded" style="background: rgba(252,236,252,1);background: linear-gradient(to right, rgba(252,236,252,1) 0%, rgba(252,214,244,1) 15%, rgba(251,166,225,1) 48%, rgba(253,137,215,1) 70%, rgba(254,131,215,1) 83%, rgba(255,124,216,1) 100%);">
                            <h3 style="font-family:'Times New Roman';font-size:35px;" class="font-weight-bolder">Visit Us</h3>
                            <address class="address">
                                Visit Us at:<br>
                                NEMA House<br>
                                Plot: 17/19/21 <br>
                                Jinja Road, Kampala Uganda
                            </address>
                        </div>
                        <div class="col-md-4 shadow p-3 mx-4 my-4 bg-white rounded" style="background: rgba(239,197,202,1);background: linear-gradient(to right, rgba(239,197,202,1) 0%, rgba(210,75,90,1) 50%, rgba(186,39,55,1) 51%, rgba(241,142,153,1) 100%);">
                            <h3 style="font-family:'Times New Roman';font-size:35px;" class="font-weight-bolder">Write to Us</h3>
                            <address class="address">
                                E-MAIL: info@nemaug.org<br>
                                FAX:    +256-414-257521<br>
                                Kampala Uganda
                            </address>
                        </div>
                        <div class="col-md-2 shadow p-3 mx-3 my-4 bg-white rounded" style="background: rgba(252,236,252,1);background: linear-gradient(to right, rgba(252,236,252,1) 0%, rgba(253,137,215,1) 27%, rgba(251,166,225,1) 59%, rgba(255,124,216,1) 73%, rgba(255,124,216,1) 85%);">
                            <h3 style="font-family:'Times New Roman';font-size:35px;" class="font-weight-bolder">Cal Us On</h3>
                            <address class="address">
                                TEL: +256-414-251064<br>
                                OR:  +256-414-251065<br>
                                OR:  +256-414-251066<br>
                            </address>
                        </div>
                    </div><!-- End of Contact Us page -->

                <?php elseif($page == 'about-us'): ?>
                    <!-- About Us Page -->
                    <div class="row my-4" style="font-size:20px;">
                        <div class="col-md-4 border shadow mx-3" style="
background: rgba(237,227,242,1);
background: -moz-linear-gradient(left, rgba(237,227,242,1) 3%, rgba(237,227,242,1) 7%, rgba(220,203,226,1) 27%, rgba(195,168,204,1) 52%, rgba(239,205,249,1) 92%, rgba(239,205,249,1) 96%);
background: -webkit-linear-gradient(left, rgba(237,227,242,1) 3%, rgba(237,227,242,1) 7%, rgba(220,203,226,1) 27%, rgba(195,168,204,1) 52%, rgba(239,205,249,1) 92%, rgba(239,205,249,1) 96%);
background: -o-linear-gradient(left, rgba(237,227,242,1) 3%, rgba(237,227,242,1) 7%, rgba(220,203,226,1) 27%, rgba(195,168,204,1) 52%, rgba(239,205,249,1) 92%, rgba(239,205,249,1) 96%);
background: -ms-linear-gradient(left, rgba(237,227,242,1) 3%, rgba(237,227,242,1) 7%, rgba(220,203,226,1) 27%, rgba(195,168,204,1) 52%, rgba(239,205,249,1) 92%, rgba(239,205,249,1) 96%);
background: linear-gradient(to right, rgba(237,227,242,1) 3%, rgba(237,227,242,1) 7%, rgba(220,203,226,1) 27%, rgba(195,168,204,1) 52%, rgba(239,205,249,1) 92%, rgba(239,205,249,1) 96%);
">
                            <h3>About NEMA</h3>
                            <p>The National Environment Management Authority (NEMA) is a semi-autonomous institution, established in May 1995 under the National Environment Act CAP 153 and became operational in December 1995, as the principal agency in Uganda, charged with the responsibility of coordinating, monitoring, regulating and supervising environmental management in the country.</p>
                        </div>
                        <div class="col-md-4 border shadow mx-3" style="
background: rgba(222,242,247,1);
background: -moz-linear-gradient(left, rgba(222,242,247,1) 0%, rgba(72,211,229,0.94) 50%, rgba(221,244,248,0.89) 97%, rgba(231,246,249,0.89) 100%);
background: -webkit-linear-gradient(left, rgba(222,242,247,1) 0%, rgba(72,211,229,0.94) 50%, rgba(221,244,248,0.89) 97%, rgba(231,246,249,0.89) 100%);
background: -o-linear-gradient(left, rgba(222,242,247,1) 0%, rgba(72,211,229,0.94) 50%, rgba(221,244,248,0.89) 97%, rgba(231,246,249,0.89) 100%);
background: -ms-linear-gradient(left, rgba(222,242,247,1) 0%, rgba(72,211,229,0.94) 50%, rgba(221,244,248,0.89) 97%, rgba(231,246,249,0.89) 100%);
background: linear-gradient(to right, rgba(222,242,247,1) 0%, rgba(72,211,229,0.94) 50%, rgba(221,244,248,0.89) 97%, rgba(231,246,249,0.89) 100%);
">
                            <h4>Mandate</h4>
                            <p>The National Environment Act (NEA), Cap. 153, stipulates the Mandate of NEMA as “the principal Agency in Uganda responsible for the management of the environment by coordinating, monitoring, regulating, and supervising all activities in the field of environment”.</p>
                        </div>
                        <div class="col-md-3 border shadow mx-3" style="
background: rgba(214,255,233,1);background: -moz-linear-gradient(left, rgba(214,255,233,1) 0%, rgba(46,255,126,0.94) 53%, rgba(224,255,238,0.89) 100%);
background: -webkit-linear-gradient(left, rgba(214,255,233,1) 0%, rgba(46,255,126,0.94) 53%, rgba(224,255,238,0.89) 100%);
background: -o-linear-gradient(left, rgba(214,255,233,1) 0%, rgba(46,255,126,0.94) 53%, rgba(224,255,238,0.89) 100%);
background: -ms-linear-gradient(left, rgba(214,255,233,1) 0%, rgba(46,255,126,0.94) 53%, rgba(224,255,238,0.89) 100%);
background: linear-gradient(to right, rgba(214,255,233,1) 0%, rgba(46,255,126,0.94) 53%, rgba(224,255,238,0.89) 100%);
">
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
        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    </body>
</html>
