
<?php
    require_once 'functions.php';

    if (empty($_SESSION['member_id'])) {
        if((empty($_SESSION['member_id'])) && isset($_GET['page'])) {
            if($_GET['page'] == 'sign-up') {
                $page = 'sign-up';
            }
            else {
                $page = 'log-in';
            }
        }
        else {
            $page = 'log-in';
        }
    }
    elseif(empty($_GET['page'])) {
        $page = 'log-in';
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
                    <?php if(isset($_SESSION['is_Admin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=sign-up">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=remove-user">Remove User</a>
                    </li>
                    <?php else: ?>
                    <?php endif; ?>
                </ul>
            </div>
            <?php if($page == 'user-guide'): ?>
                <?php
                    if(isset($_SESSION['is_Admin'])) {
                        $sql = sprintf("SELECT * FROM Messages WHERE Status = 'Pending'");
                    }
                    else {
                        $sql = sprintf("SELECT * FROM Messages WHERE Status = 'Answered'");
                    }
                    $result = mysqli_query($connect, $sql);
                    $count = mysqli_num_rows($result);

                    $user_id = (int) $_SESSION['member_id'];

                ?>
                <div class="dropleft" style="margin-right:100px;">
                    <button class="btn btn-primary btn-lg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Messages <span class="badge badge-light"><?=$count?></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if(isset($_SESSION['is_Admin']) && $count > 0):?>
                            <?php while($message = mysqli_fetch_array($result)): ?>
                                <div>
                                    <a href="index.php?page=user-guide&reply=<?=$message['id']?>" data-toggle="modal" data-target="#exampleModalCenter"
                                    class="dropdown-item alert alert-success">
                                    <p class="font-italic"><?=$message['Date']?></p>
                                    <p><?=$message['Question']?></p>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <?php if(isset($_SESSION['is_Admin']) && $count <= 0): ?>
                                <div class="alert alert-danger">
                                    <h4>No Question to reply to, Thanks.</h4>
                                </div>
                            <?php endif;?>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['member_id']) && empty($_SESSION['is_Admin'])): ?>
                            <?php if($count > 0):?>
                                <?php while($message = mysqli_fetch_array($result)): ?>
                                    <?php if($message['User_id'] == $user_id): ?>
                                        <div>
                                            <a href="index.php?page=user-guide&reply=<?=$message['id']?>" class="dropdown-item alert alert-success">
                                            <p class="font-italic"><?=$message['Date']?></p>
                                            <p><?=$message['Question']?></p>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <?php if(empty($_SESSION['is_Admin']) && ($message['User_id'] == $user_id) && $count <= 0): ?>
                                    <div class="alert alert-danger">
                                        <h4>No reply yet from the Librarian. Please wait a little while.</h4>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
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

               <?php elseif(($page == 'sign-up') && (isset($_SESSION['member_id']) || isset($_SESSION['is_Admin']) || empty($_SESSION['member_id']) || empty($_SESSION['is_Admin']))): ?>
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

                <?php elseif($page == 'remove-user'): ?>
                    <!-- Remove User -->
                    <div class="row my-5 mx-2">
                        <div class="col border shadow p-3">
                            <?php
                                // Delete User from the Database
                                if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                    $delete_id = (int) $_GET['delete'];
                                    $sql = sprintf("DELETE FROM Members WHERE id = '$delete_id'");
                                    if(mysqli_query($connect, $sql)) {
                                        header('Location: index.php?page=remove-user');
                                    }
                                }

                                // Get all the Users From the Database
                                $sql = sprintf("SELECT * FROM Members WHERE is_admin = FALSE");
                                $result = mysqli_query($connect, $sql);
                                $count = 1;
                            ?>
                            <table class="table table-bordered table-striped table-light" style="font-size:20px">
                                <h1 class="text-center mb-3 font-weight-bold font-italic" style="font-family:'Times New Roman';">Available Library Users</h1>
                                <thead class="table-dark">
                                    <tr>
                                        <th># ssn</th>
                                        <th colspan="2">Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Telephone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($query_result = mysqli_fetch_array($result)): ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td><?=$query_result['Last Name']?></td>
                                            <td><?=$query_result['First Name']?></td>
                                            <td><?=$query_result['Username']?></td>
                                            <td><?=$query_result['Email']?></td>
                                            <td><?=$query_result['Gender']?></td>
                                            <td><?=$query_result['Telephone']?></td>
                                            <td>
                                                <a href="index.php?page=remove-user&delete=<?=$query_result['id']?>" style="font-size:25px;color:Tomato;">
                                                    <span class="fas fa-trash-alt"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End of remove user page -->

                <?php elseif($page == 'add-materials'): ?>
                    <!-- Uploading a new Item -->
                    <div class="row my-5">
                        <div class="col-md-6 border shadow py-2 px-4">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $author = clean_data($_POST['author']);
                                    $title = clean_data($_POST['title']);
                                    $type = clean_data($_POST['type']);
                                    var_dump($type);
                                    $description = clean_data($_POST['description']);

                                    $file_name = $_FILES['file']['name'];
                                    $temp_name = $_FILES['file']['tmp_name'];

                                    $folder = "web/".$file_name;
                                    $edit_id = 0;

                                    $sql = sprintf("SELECT * FROM Collections WHERE Author = '$author' AND Title = '$title' AND Type = '$type'");

                                    if(isset($_GET['edit'])) {
                                        $edit_id = (int) $_GET['edit'];
                                        $sql = sprintf("SELECT * FROM Collections WHERE Title = '$title' AND id != '$edit_id'");
                                    }
                                    $result = mysqli_query($connect, $sql);

                                    if(mysqli_num_rows($result) > 0) {
                                        $error_message = "Error, <br>   File/Material already exist. Please try again.";
                                    }else {

                                        if(file_exists($folder) && isset($_GET['edit'])) {
                                            add_collection ($author, $title, $type, $file_name, $description, $edit_id);

                                            $success_message = "Success, <br> Files/Materials editted Successfully.";
                                        }
                                        elseif (move_uploaded_file($temp_name, $folder)) {
                                            if (add_collection ($author, $title, $type, $file_name, $description, $edit_id)) {
                                                $success_message = "Success, <br> Files/Materials uploaded Successfully.";
                                            }
                                        }else {
                                            $error_message = "Error, <br> File upload failed, please try again.";
                                        }
                                    }
                                }
                            ?>
                            <h1 class="text-center"><?=((isset($_GET['edit']))?'Edit':'Add');?> Materials</h1>
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
                                <?php
                                    $edit_author = '';
                                    if(isset($_GET['edit'])) {
                                        $edit_id = (int) $_GET['edit'];
                                        $sql2 = sprintf("SELECT * FROM Collections WHERE id = '$edit_id'");
                                        $edit_result = mysqli_query($connect, $sql2);
                                        $edit_item = mysqli_fetch_array($edit_result);

                                        $edit_author = $edit_item['Author'];
                                    }else {
                                        if(isset($_POST['Author'])) {
                                            $edit_author = $_POST['author'];
                                        }
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" name="author" value="<?=$edit_author?>" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                        $edit_title = '';
                                        if(isset($_GET['edit'])) {
                                            $edit_title = $edit_item['Title'];
                                        }
                                        else {
                                            if(isset($_POST['title'])) {
                                                $edit_title = $_POST['title'];
                                            }
                                        }
                                    ?>
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="<?=$edit_title?>" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                        $edit_type = '';
                                        if(isset($_GET['edit'])) {
                                            $edit_type = $edit_item['Type'];
                                        }
                                        elseif(isset($_POST['type'])) {
                                            $edit_type = $_POST['type'];
                                        }
                                    ?>
                                    <label for="title">Type</label>
                                    <select class="custom-select" name="type" required>
                                        <?php if(isset($_GET['edit'])): ?>
                                        <option selected><?=$edit_type?></option>
                                        <?php elseif(isset($_POST['type'])): ?>
                                        <option selected><?=$edit_type?></option>
                                        <?php else: ?>
                                        <option selected>Book</option>
                                        <option value="Report">Report</option>
                                        <option value="Year-Book">Year-Book</option>
                                        <option value="Encyclopedia">Encylopedia</option>
                                        <option value="Journal">Journal</option>
                                        <option value="Dictionary">Dictionary</option>
                                        <option value="Brochure">Brochure</option>
                                        <option value="Periodical">Periodical</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php
                                        $edit_description = '';
                                        if(isset($_GET['edit'])) {
                                            $edit_description = $edit_item['Description'];
                                        }
                                        else {
                                            if(isset($_POST['description'])) {
                                                $edit_description = $_POST['description'];
                                            }
                                        }
                                    ?>
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="8" cols="80" value=""><?=$edit_description?></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <?php
                                            $edit_file = '';
                                            if(isset($_GET['edit'])) {
                                                $edit_file = $edit_item['File_Name'];
                                            }
                                            else {
                                                if(isset($_POST['file'])) {
                                                    $edit_file = $_POST['file'];
                                                }
                                            }
                                        ?>
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                                        <label class="custom-file-label" for="inputGroupFile01">
                                            <?php
                                                if(isset($_GET['edit'])) {
                                                    echo $edit_file;
                                                }else {
                                                    echo "Choose file to Upload";
                                                }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-outline-success mt-2" value="<?=((isset($_GET['edit']))?'Upload Edit':'Upload')?>">
                                <?php if(isset($_GET['edit'])): ?>
                                    <?php if ($edit_type == 'Book'): ?>
                                        <a href="index.php?page=books" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php elseif($edit_type == 'Report'): ?>
                                        <a href="index.php?page=report" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php elseif($edit_type == 'Year-Book'): ?>
                                        <a href="index.php?page=year-book" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php elseif($edit_type == 'Dictionary'): ?>
                                        <a href="index.php?page=dictionary" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php elseif($edit_type == 'Encyclopedia'): ?>
                                        <a href="index.php?page=encyclopedia" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php elseif($edit_type == 'Journal'): ?>
                                        <a href="index.php?page=journals" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php elseif($edit_type == 'Brochure'): ?>
                                        <a href="index.php?page=brochures" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php elseif($edit_type == 'Periodical'): ?>
                                        <a href="index.php?page=periodicals" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php else: ?>
                                        <a href="index.php?page=books" class="btn btn-outline-secondary ml-3 m mt-1">Cancel</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div><!-- Upload a new File -->

                <?php elseif($page == 'books'): ?>
                    <!-- Available Books -->
                    <div class="row my-5">
                        <div class="col border py-2 px-4">
                            <?php
                                // Delete item from the Database
                                if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                    $delete_id = (int) $_GET['delete'];
                                    $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                    if(mysqli_query($connect, $sql)) {
                                        header('Location: index.php?page=books');
                                    }
                                }

                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Book'");
                                $result = mysqli_query($connect, $sql);
                                $count = 1;
                            ?>
                            <h1 class="text-center">Books Available</h1>
                            <table class="table table-bordered table-striped table-hover" style="font-size:20px">
                                <?php if(isset($_SESSION['is_Admin'])): ?>
                                    <div class="col-md my-2">
                                        <a href="index.php?page=add-materials" class="btn btn-outline-warning" style="margin-bottom: 5px;"><i style="font-size:18px;">Add <?= (($_GET['page'] == 'books')?'Books':''); ?></i></a>
                                    </div>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th># ssn</th>
                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                        <th colspan="2"></th>
                                        <?php endif; ?>
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
                                       <?php if(isset($_SESSION['is_Admin'])): ?>
                                           <td>
                                               <a href="index.php?page=add-materials&edit=<?=$books['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                                   <span class="fas fa-pencil-alt"></span>Edit
                                               </a>
                                           </td>
                                           <td>
                                               <a href="index.php?page=books&delete=<?=$books['id']?>" style="font-size:25px;color:Tomato;">
                                                   <span class="fas fa-trash-alt"></span>Delete
                                               </a>
                                           </td>
                                        <?php endif; ?>
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
                                // Delete item from the Database
                                if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                    $delete_id = (int) $_GET['delete'];
                                    $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                    if(mysqli_query($connect, $sql)) {
                                        header('Location: index.php?page=journals');
                                    }
                                }

                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Journal'");
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
                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                            <th colspan="2"></th>
                                        <?php endif; ?>
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
                                       <?php if(isset($_SESSION['is_Admin'])): ?>
                                       <td>
                                           <a href="index.php?page=add-materials&edit=<?=$journals['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                               <span class="fas fa-pencil-alt"></span>Edit
                                           </a>
                                       </td>
                                       <td>
                                           <a href="index.php?page=journals&delete=<?=$journals['id']?>" style="font-size:25px;color:Tomato;">
                                               <span class="fas fa-trash-alt"></span>Delete
                                           </a>
                                       </td>
                                        <?php endif; ?>
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
                                // Delete item from the Database
                                if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                    $delete_id = (int) $_GET['delete'];
                                    $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                    if(mysqli_query($connect, $sql)) {
                                        header('Location: index.php?page=reports');
                                    }
                                }

                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Report'");
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
                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                            <th colspan="2"></th>
                                        <?php endif; ?>
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
                                       <?php if(isset($_SESSION['is_Admin'])): ?>
                                       <td>
                                           <a href="index.php?page=add-materials&edit=<?=$reports['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                               <span class="fas fa-pencil-alt"></span>Edit
                                           </a>
                                       </td>
                                       <td>
                                           <a href="index.php?page=reports&delete=<?=$reports['id']?>" style="font-size:25px;color:Tomato;">
                                               <span class="fas fa-trash-alt"></span>Delete
                                           </a>
                                       </td>
                                        <?php endif; ?>
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
                                // Delete item from the Database
                                if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                    $delete_id = (int) $_GET['delete'];
                                    $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                    if(mysqli_query($connect, $sql)) {
                                        header('Location: index.php?page=periodicals');
                                    }
                                }

                                $sql = sprintf("SELECT * FROM Collections WHERE Type = 'Periodical'");
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
                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                            <th colspan="2"></th>
                                        <?php endif; ?>
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
                                       <?php if(isset($_SESSION['is_Admin'])): ?>
                                       <td>
                                           <a href="index.php?page=add-materials&edit=<?=$periodicals['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                               <span class="fas fa-pencil-alt"></span>Edit
                                           </a>
                                       </td>
                                       <td>
                                           <a href="index.php?page=periodicals&delete=<?=$periodicals['id']?>" style="font-size:25px;color:Tomato;">
                                               <span class="fas fa-trash-alt"></span>Delete
                                           </a>
                                       </td>
                                        <?php endif; ?>
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
                                        // Delete item from the Database
                                        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                            $delete_id = (int) $_GET['delete'];
                                            $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                            if(mysqli_query($connect, $sql)) {
                                                header('Location: index.php?page=encyclopedia');
                                            }
                                        }

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
                                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                                        <th colspan="2"></th>
                                                    <?php endif; ?>
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
                                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                                            <td>
                                                                <a href="index.php?page=add-materials&edit=<?=$Encyclopedia['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                                                    <span class="fas fa-pencil-alt"></span>Edit
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="index.php?page=encyclopedia&delete=<?=$Encyclopedia['id']?>" style="font-size:25px;color:Tomato;">
                                                                    <span class="fas fa-trash-alt"></span>Delete
                                                                </a>
                                                            </td>
                                                         <?php endif; ?>
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
                                        // Delete item from the Database
                                        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                            $delete_id = (int) $_GET['delete'];
                                            $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                            if(mysqli_query($connect, $sql)) {
                                                header('Location: index.php?page=dictionary');
                                            }
                                        }

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
                                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                                        <th colspan="2"></th>
                                                    <?php endif; ?>
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
                                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                                            <td>
                                                                <a href="index.php?page=add-materials&edit=<?=$Dictionary['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                                                    <span class="fas fa-pencil-alt"></span>Edit
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="index.php?page=dictionary&delete=<?=$Dictionary['id']?>" style="font-size:25px;color:Tomato;">
                                                                    <span class="fas fa-trash-alt"></span>Delete
                                                                </a>
                                                            </td>
                                                         <?php endif; ?>
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
                                        // Delete item from the Database
                                        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                            $delete_id = (int) $_GET['delete'];
                                            $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                            if(mysqli_query($connect, $sql)) {
                                                header('Location: index.php?page=brochures');
                                            }
                                        }

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
                                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                                        <th colspan="2"></th>
                                                    <?php endif; ?>
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
                                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                                            <td>
                                                                <a href="index.php?page=add-materials&edit=<?=$Brochures['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                                                    <span class="fas fa-pencil-alt"></span>Edit
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="index.php?page=brochures&delete=<?=$Brochures['id']?>" style="font-size:25px;color:Tomato;">
                                                                    <span class="fas fa-trash-alt"></span>Delete
                                                                </a>
                                                            </td>
                                                         <?php endif; ?>
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
                                        // Delete item from the Database
                                        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                            $delete_id = (int) $_GET['delete'];
                                            $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");

                                            if(mysqli_query($connect, $sql)) {
                                                header('Location: index.php?page=year-book');
                                            }
                                        }

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
                                                    <?php if(isset($_SESSION['is_Admin'])): ?>
                                                        <th colspan="2"></th>
                                                    <?php endif; ?>
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
                                                        <?php if(isset($_SESSION['is_Admin'])): ?>
                                                            <td>
                                                                <a href="index.php?page=add-materials&edit=<?=$YearBook['id']?>" style="font-size:25px;color:Mediumslateblue;">
                                                                    <span class="fas fa-pencil-alt"></span>Edit
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="index.php?page=year-book&delete=<?=$YearBook['id']?>" style="font-size:25px;color:Tomato;">
                                                                    <span class="fas fa-trash-alt"></span>Delete
                                                                </a>
                                                            </td>
                                                         <?php endif; ?>
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
                                        <option value="Report">Report</option>
                                        <option value="Year-Book">Year-Book</option>
                                        <option value="Encyclopedia">Encyclopedia</option>
                                        <option value="Journal">Journal</option>
                                        <option value="Dictionary">Dictionary</option>
                                        <option value="Brochure">Brochure</option>
                                        <option value="Periodical">Periodical</option>
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

                <?php elseif($page == 'user-guide'): ?>
                    <div class="row my-5">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6 border shadow py-2 px-3 m-2" style="font-size:20px;background: rgba(76,76,76,0.2);">
                            <?php
                                $user_id = (int) $_SESSION['member_id'];

                                if(isset($_POST['query'])) {

                                    $question = clean_data($_POST['question']);

                                    if(submit_question($question, $user_id)) {
                                        $success_message = "Querry submitted. <br>Please wait for the feedback from the Librarian.";
                                    }else {
                                        $error_message = "Sorry, <br> An Error Occured.Please try again.";
                                    }
                                }

                                $sql = sprintf("SELECT * FROM Members WHERE id = '$user_id' AND is_admin = FALSE");
                                $query = mysqli_query($connect, $sql);
                                $result = mysqli_fetch_array($query);

                            ?>
                            <h1 class="text-center font-weight-bolder" style="font-family:'Times New Roman';margin-bottom:40px;">Ask the Librarian</h1>
                            <?php if(isset($success_message)): ?>
                                <div class="alert alert-success">
                                    <p><?=$success_message?></p>
                                </div>
                            <?php elseif(isset($error_message)): ?>
                                <div class="alert alert-danger">
                                    <p><?=$error_message?></p>
                                </div>
                            <?php else: ?>
                            <?php endif; ?>
                            <form class="" action="" method="POST">
                                <h3 class="font-italic" style="font-family:'Times New Roman';margin:20px 30px;">Hello <span class="font-weight-bold"><?=$result['First Name']?></span>, How may I help you?</h3>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?=$result['First Name']." ".$result['Last Name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <textarea class="form-control" name="question" rows="5" cols="50"></textarea>
                                </div>
                                <input type="submit" name="query" class="btn btn-outline-info mb-3" value="Ask Me" style="margin-left:650px;font-size:25px;">
                            </form>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>

                    <!-- Modal Message Reply to User Querry -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Respond to User's Querry.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <?php
                                    $user_id = 0;
                                    if(isset($_POST['reply'])) {
                                        $reply_message = clean_data($_POST['message']);
                                        if(isset($_SESSION['is_Admin'])) {
                                            $user_id = (int) $_SESSION['is_Admin'];
                                        }
                                        else {
                                            $user_id = (int) $_SESSION['member_id'];
                                        }

                                        if (submit_question($reply_message, $user_id)) {
                                            $success_message = "Message reply succesful.";
                                        }
                                        else {
                                            $error_message = "Sorry, <br> Unable to complete the message reply process. <br><br> Only the Librarian can reply to messages.";
                                        }

                                        $sql = sprintf("UPDATE `Messages` SET `Status` = 'Answered' WHERE `id` = '$question_id'");
                                    }
                                ?>
                                <form class="" action="" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="messages">Reply Messages</label>
                                            <textarea name="message" rows="4" cols="40"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" name="reply" class="btn btn-primary" value="Reply">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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
