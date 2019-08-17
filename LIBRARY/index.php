
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
        <meta name="keywords" content="Dissertations, Thesis, Journals, Books, Gulu University Library">
        <meta name="author" content="Domo Daniel Ongom">
        <meta http-equiv="refresh" content="300">
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
                    <a href='https://www.gulib.gu.ac.ug'>
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
                            <a class="dropdown-item" href="index.php?page=binding">Binding</a>
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
                    <?php if(isset($_SESSION['is_Admin']) || isset($_SESSION['member_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=log-out">Log Out</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=log-in">Log In</a>
                    </li>
                    <?php endif; ?>
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
                <div class="col-lg-2 col-md-6 border ml-5 mr-4 my-4 p-3">
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
                <div class="col-lg-9 col-md-6">
                    <!-- Home Page -->
                    <?php if($page == 'home'): ?>
                    <div class="row mt-4 mb-5">
                        <div class="col border ml-4 mr-5 p-3">
                            <div id="demo" class="carousel slide" data-ride="carousel">
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ul>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/background1.jpeg" alt="background1" width="1400" height="500">
                                        <div class="carousel-caption">
                                            <h3>Background 1</h3>
                                            <p>We had such a great time in LA!</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/background2.jpeg" alt="Background2" width="1400" height="500">
                                        <div class="carousel-caption">
                                            <h3>Background2</h3>
                                            <p>Awesome</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/background.jpeg" alt="Background" width="1400" height="500">
                                        <div class="carousel-caption">
                                            <h3>Background</h3>
                                            <p>We love the Big Apple!</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php elseif($page == 'log-in'): ?>
                    <!-- Login Form With an Alternative Sign UP -->
                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6 border ml-4 mr-3 p-3">
                            <div class="login-form">
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        if(login_successful($username, $password)){
                                            if(isset($_SESSION['is_Admin'])){
                                                header('Location: index.php?page=add-collections');
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
                                ?>
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
                                    <p>Don't have account, <a href="index.php?page=sign-up">Register Here</a></p>
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
                <?php elseif ($page == 'log-out'): ?>
                    <?php
                        unset($_SESSION['member_id']);

                        if(isset($_SESSION['is_Admin'])) {
                            unset($_SESSION['is_Admin']);
                        }

                        header("Location: index.php?page=log-in");
                        exit();
                    ?>

                <?php elseif ($page == 'sign-up'): ?>
                    <!-- Registration Form  Page-->
                    <div class="row my-5">
                        <div class="col-lg-6 col-md-6 border ml-4 mr-3 p-3">
                            <div class="form">
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
                                            $error_message = "Error, Passwords do not match.";
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
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?=((isset($_POST['fname']))?$_POST['fname']:'');?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" class="form-control" name="lname" p      laceholder="Last Name" value="<?=((isset($_POST['lname']))?$_POST['lname']:'');?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?=((isset($_POST['username']))?$_POST['username']:'');?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?=((isset($_POST['email']))?$_POST['email']:'');?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Telephone:</label>
                                        <input type="tel" class="form-control" name="telephone" placeholder="Telephone" value="<?=((isset($_POST['telephone']))?$_POST['telephone']:'');?>">
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

                <?php elseif ($page == 'add-collections'): ?>
                    <!-- Add Collections to the Database -->
                    <div class="row my-5">
                        <div class="col-lg-8 col-md-8 border ml-4 mr-3 p-3">
                            <div class="collections">

                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $type = clean_data($_POST['type']);
                                        $title = clean_data($_POST['title']);
                                        $author = clean_data($_POST['author']);
                                        $number = clean_data($_POST['number']);
                                        $item_type = '';

                                        $sql = sprintf("SELECT * FROM Collections WHERE Title = '$title' AND Author = '$author'");
                                        if(isset($_GET['edit'])) {
                                            $edit_id = (int) $_GET['edit'];
                                            $sql = sprintf("SELECT * FROM Collections WHERE Title = '$title' AND id != '$edit_id'");
                                        }
                                        $result = mysqli_query($connect, $sql);
                                        $count = mysqli_num_rows($result);

                                        if(empty($type && $title && $author && $number)) {
                                            $error_message = "Invalid, all field is required.";
                                        }
                                        elseif ($count > 0) {
                                            $error_message = "Item, ".$title." already exist, please add new item.";
                                        }
                                        else {
                                            add_collection($type, $title, $author, $number, $edit_id);

                                            $success_message = "Item, ".$title.", Added Successfully.";
                                        }

                                        if(isset($_GET['edit'])) {
                                            $success_message = "Item, ".$title.", Editted Succesfully.";
                                        }
                                    }
                                ?>

                                <h1 class="text-center"><?=((isset($_GET['edit']))?'Edit':'Add');?> Item</h1>
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
                                        <?php
                                            $item_type = '';
                                            if(isset($_GET['edit'])) {
                                            $edit_id = (int) $_GET['edit'];
                                            $sql2 = sprintf("SELECT * FROM Collections WHERE id = '$edit_id'");
                                            $edit_result = mysqli_query($connect, $sql2);
                                            $edit_item = mysqli_fetch_array($edit_result);

                                            $item_type = $edit_item['Type'];
                                            }
                                            else {
                                                if(isset($_POST['type'])) {
                                                    $item_type = $_POST['type'];
                                                }
                                            }
                                        ?>
                                        <label for="type">Type:</label>
                                        <input type="text" class="form-control" name="type" placeholder="Book, Journal, Thesis etc." value="<?=$item_type;?>">
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            $item_title = '';
                                            if(isset($_GET['edit'])) {
                                                $item_title = $edit_item['Title'];
                                            }
                                            else {
                                                if(isset($_POST['title'])) {
                                                    $item_title = $_POST['title'];
                                                }
                                            }
                                        ?>
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?=$item_title;?>">
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            $item_author = '';
                                            if(isset($_GET['edit'])) {
                                                $item_author = $edit_item['Author'];
                                            }
                                            else {
                                                if(isset($_POST['author'])) {
                                                    $item_author = $_POST['author'];
                                                }
                                            }
                                        ?>
                                        <label for="author">Author:</label>
                                        <input type="text" class="form-control" name="author" placeholder="Enter Author's name" value="<?=$item_author;?>">
                                    </div>
                                    <div class="form-group">
                                        <?php
                                            $item_number = '';
                                            if(isset($_GET['edit'])) {
                                                $item_number = $edit_item['Number'];
                                            }
                                            else {
                                                if(isset($_POST['number'])) {
                                                    $item_number = $_POST['number'];
                                                }
                                            }
                                        ?>
                                        <label for="number">Number:</label>
                                        <input type="text" class="form-control" name="number" placeholder="Enter Number" value="<?=$item_number;?>">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="<?=((isset($_GET['edit']))?'Edit':'Add');?> Item">
                                    <?php if(isset($_GET['edit'])): ?>
                                        <?php if ($item_type == 'Books'): ?>
                                            <a href="index.php?page=books" class="btn btn-default ml-3">Cancel</a>
                                        <?php elseif($item_type == 'Thesis'): ?>
                                            <a href="index.php?page=thesis" class="btn btn-default ml-3">Cancel</a>
                                        <?php elseif($item_type == 'Journal'): ?>
                                            <a href="index.php?page=journals" class="btn btn-default ml-3">Cancel</a>
                                        <?php elseif($item_type == 'Dissertation'): ?>
                                            <a href="index.php?page=dissertations" class="btn btn-default ml-3">Cancel</a>
                                        <?php else: ?>
                                            <a href="index.php?page=books" class="btn btn-default ml-3">Cancel</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php elseif ($page == 'reports'): ?>

                    <!-- General Report for the Library -->
                    <div class="row my-5">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="journals">
                                <h1 class="text-center">General Reports</h1>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Available Materials</th>
                                            <th>Borrowed</th>
                                            <th>Requested</th>
                                            <th>No. of New Users</th>
                                            <th>No. of total Users</th>
                                            <th>Others</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2000</td>
                                            <td>200</td>
                                            <td>40</td>
                                            <td>600</td>
                                            <td>1500</td>
                                            <td>Null</td>
                                        </tr>
                                        <tr>
                                            <td>2000</td>
                                            <td>200</td>
                                            <td>40</td>
                                            <td>600</td>
                                            <td>1500</td>
                                            <td>Null</td>
                                        </tr>
                                        <tr>
                                            <td>2000</td>
                                            <td>200</td>
                                            <td>40</td>
                                            <td>600</td>
                                            <td>1500</td>
                                            <td>Null</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End of the Jounals -->

                <?php elseif ($page == 'books'): ?>

                    <!-- Page Available Books -->
                    <div class="row my-4">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="books">

                                <?php
                                    // Delete item from the Database
                                    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                        $delete_id = (int) $_GET['delete'];
                                        $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");
                                        if(mysqli_query($connect, $sql)) {
                                            header('Location: index.php?page=books');
                                        }
                                    }

                                    $sql_book = sprintf("SELECT * FROM Collections WHERE Type = 'Book'");
                                    $result = mysqli_query($connect, $sql_book);

                                ?>

                                <h1 class="text-center" style="font-family:'Times New Roman';">Available Books</h1>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Book Number</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <a href="index.php?page=add-collections" class="btn btn-outline-success btn-lg mb-3" style="margin-left: 1100px;"><span class="display-5">Add Books</span></a>
                                        </tr>
                                        <?php while($books = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <th><a href = "index.php?page=add-collections&edit=<?=$books['id'];?>" class="btn btn-outline-info"><span class="fas fa-pencil-alt"><span></a></th>
                                                <td><?=$books['Title']?></td>
                                                <td><?=$books['Author']?></td>
                                                <td><?=$books['Number']?></td>
                                                <td><?=$books['Status']?></td>
                                                <th><a href = "index.php?page=books&delete=<?=$books['id'];?>" class="btn btn-outline-danger"><span class="fas fa-trash-alt"><span></a></th>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php elseif ($page == 'dissertations'): ?>

                    <!-- Available Dissertations -->
                    <div class="row my-5">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="dissertations">
                                <?php
                                    // Delete item from the Database
                                    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                        $delete_id = (int) $_GET['delete'];
                                        $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");
                                        if(mysqli_query($connect, $sql)) {
                                            header('Location: index.php?page=dissertations');
                                        }
                                    }

                                    $sql_dissertation = sprintf("SELECT * FROM Collections WHERE Type = 'Dissertation'");
                                    $result = mysqli_query($connect, $sql_dissertation);

                                ?>

                                <h1 class="text-center" style="font-family:'Times New Roman';">Available Dissertations</h1>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Number</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <a href="index.php?page=add-collections" class="btn btn-outline-success btn-lg mb-3" style="margin-left: 1100px;"><span class="display-5">Add Dissertations</span></a>
                                        </tr>
                                        <?php while($dissertations = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <th><a href = "index.php?page=dissertations&edit=<?=$dissertations['id'];?>" class="btn btn-outline-info"><span class="fas fa-pencil-alt"><span></a></th>
                                                <td><?=$dissertations['Title']?></td>
                                                <td><?=$dissertations['Author']?></td>
                                                <td><?=$dissertations['Number']?></td>
                                                <td><?=$dissertations['Status']?></td>
                                                <th><a href = "index.php?page=dissertations&delete=<?=$dissertations['id'];?>" class="btn btn-outline-danger"><span class="fas fa-trash-alt"><span></a></th>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php elseif ($page == 'thesis'): ?>

                    <!-- Available Thesis-->
                    <div class="row my-4">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="thesis">

                                <?php
                                    // Delete item from the Database
                                    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                        $delete_id = (int) $_GET['delete'];
                                        $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");
                                        if(mysqli_query($connect, $sql)) {
                                            header('Location: index.php?page=thesis');
                                        }
                                    }
                                    $sql_thesis = sprintf("SELECT * FROM Collections WHERE Type = 'Thesis'");
                                    $result = mysqli_query($connect, $sql_thesis);

                                ?>

                                <h1 class="text-center" style="font-family:'Times New Roman';">Available Thesis</h1>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Thesis Number</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <a href="index.php?page=add-collections" class="btn btn-outline-success btn-lg mb-3" style="margin-left: 1100px;"><span class="display-5">Add Thesis</span></a>
                                        </tr>
                                        <?php while($thesis = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <th><a href = "index.php?page=add-collections&edit=<?=$thesis['id'];?>" class="btn btn-outline-info"><span class="fas fa-pencil-alt"><span></a></th>
                                                <td><?=$thesis['Title']?></td>
                                                <td><?=$thesis['Author']?></td>
                                                <td><?=$thesis['Number']?></td>
                                                <td><?=$thesis['Status']?></td>
                                                <th><a href = "index.php?page=thesis&delete=<?=$thesis['id'];?>" class="btn btn-outline-danger"><span class="fas fa-trash-alt"><span></a></th>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php elseif ($page == 'journals'): ?>

                    <!-- Available Journals -->
                    <div class="row my-5">
                        <div class="col border ml-4 mr-5 py-2 px-4">
                            <div class="journals">

                                <?php
                                    // Delete item from the Database
                                    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                                        $delete_id = (int) $_GET['delete'];
                                        $sql = sprintf("DELETE FROM Collections WHERE id = '$delete_id'");
                                        if(mysqli_query($connect, $sql)) {
                                            header('Location: index.php?page=journls');
                                        }
                                    }
                                    $sql_journal = sprintf("SELECT * FROM Collections WHERE Type = 'Journal'");
                                    $result = mysqli_query($connect, $sql_journal);

                                ?>

                                <h1 class="text-center" style="font-family:'Times New Roman';">Available Journals</h1>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Volume Number</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <a href="index.php?page=add-collections" class="btn btn-outline-success btn-lg mb-3" style="margin-left: 1100px;"><span class="display-5">Add Journals</span></a>
                                        </tr>
                                        <?php while($journals = mysqli_fetch_array($result)): ?>
                                            <tr>
                                                <th><a href = "index.php?page=add-collections&edit=<?=$journals['id'];?>" class="btn btn-outline-info"><span class="fas fa-pencil-alt"><span></a></th>
                                                <td><?=$journals['Title']?></td>
                                                <td><?=$journals['Author']?></td>
                                                <td><?=$journals['Number']?></td>
                                                <td><?=$journals['Status']?></td>
                                                <th><a href = "index.php?page=journals&delete=<?=$journals['id'];?>" class="btn btn-outline-danger"><span class="fas fa-trash-alt"><span></a></th>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End of the Jounals -->

                <?php elseif ($page == 'staff-info'): ?>

                    <!-- Our Staff Information Page -->
                    <div class="row border ml-3 my-4 py-3 px-2">
                        <!-- Staff List -->
                        <div class="col-md-6 mr-n3">
                            <div class="card">
                                <div class="card-header text-primary">
                                    <span style="font-size: 1rem; color: Mediumslateblue;">
                                        <i class="fas fa-camera"></i>
                                        <i style="font-size: 2rem; font-family: 'Times New Roman'">
                                            Staff
                                        </i>
                                    </span>
                                </div>
                                <div class="card-body" style="margin:0px;">
                                    Horizontal rule down
                                    <hr class="horizontal-rule">
                                    <div class="staff-list">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Job Title</th>
                                                    <th>Employment Status</th>
                                                    <th>Spoken Language</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Janet</td>
                                                    <td>Supervisor</td>
                                                    <td>Full-time</td>
                                                    <td>English</td>
                                                </tr>
                                                <tr>
                                                    <td>Sharon</td>
                                                    <td>Librarian</td>
                                                    <td>Paid Work Experience</td>
                                                    <td>English, French</td>
                                                </tr>
                                                <tr>
                                                    <td>Lanyero</td>
                                                    <td>IT Manager</td>
                                                    <td>no-info</td>
                                                    <td>no-info</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr class="horizontal-rule">
                                    <div class="staff-number">
                                        <h4>Staff Number: 3</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Staff Information -->
                        <div class="col-md-6 ml-n2 mr-4">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="text-white"  style="font-family:'Times New Roman';">Staff Info</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <div class="row">
                                            <div class="col-1">
                                                <img src="images/gulu.jpeg" alt="Image" style="width: 70px; height: 60px;">
                                            </div>
                                            <div class="col-2">
                                                Name <br> Age
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal-rule">
                                    <div class="">
                                        <ul style="list-style:none;">
                                            <li>Phone:</li>
                                            <li>Email:</li>
                                        </ul>
                                    </div>
                                    <div class="card my-2">
                                        <div class="card-header text-primary">
                                            <h4>Address</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                Main Address
                                            </div>
                                            57 <br>
                                            Cousthood road <br>
                                            Califonia
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header text-primary">
                                            <h4>Staff Profile</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                Employee Number
                                            </div>
                                            STF0001
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Staff Information Page -->

                <?php elseif ($page == 'daily'): ?>

                    <!-- Daily Library Report Page -->
                    <div class="row">
                        <div class="col border mt-3 mb-5 mx-4 px-4 pb-4 pt-2">
                            <?php
                                $sql = "SELECT * FROM Collections";
                                $result = mysqli_query($connect, $sql);
                            ?>
                            <h1 class="text-center" style="font-family:'Times New Roman';">Daily Library Report</h1>
                            <div class="daily">
                                <form class="my-3" action="" method="post">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" name="search">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text rounded" name="button-search">@</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>No. of Times Borrowed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($daily = mysqli_fetch_array($result)): ?>
                                        <tr>
                                            <td><?=$daily['Title']?></td>
                                            <td><?=$daily['Author']?></td>
                                            <td><?=$daily['Status']?></td>
                                            <td>0</td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End of Daily Report Page -->

                <?php elseif ($page == 'monthly'): ?>

                    <!-- Monthly Library Report Page -->
                    <div class="row monthly">
                        <div class="col border mt-3 mb-5 mx-4 px-4 pb-4 pt-2">
                            <?php
                                $sql = "SELECT * FROM Collections";
                                $result = mysqli_query($connect, $sql);
                            ?>
                            <h1 class="text-center" style="font-family:'Times New Roman';">Monthly Library Report</h1>
                            <div class="daily">
                                <form class="my-3" action="" method="post">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" name="search">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text rounded" name="button-search">@</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>No. of Times Borrowed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($monthly = mysqli_fetch_array($result)): ?>
                                        <tr>
                                            <td><?=$monthly['Title']?></td>
                                            <td><?=$monthly['Author']?></td>
                                            <td><?=$monthly['Status']?></td>
                                            <td>0</td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End of Monthly Report Page -->

                <?php elseif ($page == 'annual'): ?>

                    <!-- Annual Library Report Page -->
                    <div class="row annual">
                        <div class="col border mt-3 mb-5 mx-4 px-4 pb-4 pt-2">
                            <?php
                                $sql = "SELECT * FROM Collections";
                                $result = mysqli_query($connect, $sql);
                            ?>
                            <h1 class="text-center" style="font-family:'Times New Roman';">Annual Library Report</h1>
                            <div class="daily">
                                <form class="my-3" action="" method="post">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" name="search">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text rounded" name="button-search">@</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>No. of Times Borrowed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($annual = mysqli_fetch_array($result)): ?>
                                        <tr>
                                            <td><?=$annual['Title']?></td>
                                            <td><?=$annual['Author']?></td>
                                            <td><?=$annual['Status']?></td>
                                            <td>0</td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End of Annaul Library Report Page -->

                <?php elseif ($page == 'gallery'): ?>

                    <!-- Gallery Page -->
                    <div class="row gallery border mx-3 mt-3 mb-4">
                        <div class="col">
                            <div class="w3-container w3-teal">
                    		<h1 class="text-center">Library Gallery</h1>
                    		</div>
                            <div class="card-columns my-3">
                                <div class="card">
                                    <img class="card-img-top p-2" src="images/gulu.jpeg" alt="Card image" style="width:432px;height:390px;">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">Gulu</h3>
                                        <p class="card-text">Some text inside the first card</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top p-2" src="images/gulu.jpeg" alt="Card image" style="width:432px;height:390px;">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">Gulu</h3>
                                        <p class="card-text">Some text inside the first card</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top mx-auto d-block" src="images/lib5.jpeg" alt="Card image" style="width:432px;height:390px;">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">Gulu</h3>
                                        <p class="card-text">Some text inside the first card</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top p-2" src="images/gulu.jpeg" alt="Card image" style="width:432px;height:390px;">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">Gulu</h3>
                                        <p class="card-text">Some text inside the first card</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top p-2" src="images/gulu.jpeg" alt="Card image" style="width:432px;height:390px;">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">Gulu</h3>
                                        <p class="card-text">Some text inside the first card</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top p-2 mx-auto d-block" src="images/gulu.jpeg" alt="Card image" style="width:432px;height:390px;">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">Gulu</h3>
                                        <p class="card-text">Some text inside the first card</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End of Gallery Page -->

                <?php elseif ($page == 'ask-librarian'): ?>

                    <!-- Ask the Librarian Page -->
                    <div class="row my-5 mx-4 p-2 border">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="text-center">Ask the Librarian</h2>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">Chat</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="phone-tab" data-toggle="tab" href="#phone" role="tab" aria-controls="phone" aria-selected="false">Phone</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Ask the Librarian Tab Contents -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                                            <div class="row chat">
                                                <div class="col">
                                                    <h4>If you are free now, let's chat</h4>
                                                    <form class="" action="index.html" method="post">
                                                        <h1>Live Chat</h1>
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="question">Your Question</label>
                                                            <textarea class="form-control" name="question" rows="8" cols="80"></textarea>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" value="Ask Me">
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- End of Live Chat Page -->
                                        <!-- Email Us Your Question -->
                                        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                                            <div class="row">
                                                <div class="col">
                                                    <form class="" action="index.html" method="post">
                                                        <h1>Contact Us</h1>
                                                        <div class="form-group">
                                                            <label for="name">Email</label>
                                                            <input type="text" class="form-control" name="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="question">Message</label>
                                                            <textarea class="form-control" name="question" rows="8" cols="80"></textarea>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" value="Send">
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- End of Email Us Tab -->
                                        <!-- Contact Us via Phone -->
                                        <div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone-tab">
                                            <div class="row">
                                                <div class="col">
                                                    <?php
                                                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                            $basic  = new \Nexmo\Client\Credentials\Basic('0b5ea899', 'vMfq6tWJuOTWJ4Vh');

                                                            $client = new \Nexmo\Client($basic);

                                                            $message = $client->message()->send([
                                                                'to' => $_POST['phone'],
                                                                'from' => 'Library',
                                                                'text' => $_POST['question']
                                                            ]);
                                                        }
                                                    ?>

                                                    <form class="" action="" method="post">
                                                        <h1>Contact Us</h1>
                                                        <div class="form-group">
                                                            <label for="question">Message</label>
                                                            <textarea class="form-control" name="question" rows="8" cols="80"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Phone Number</label>
                                                            <input type="tel" class="form-control" name="phone" placeholder="Eg. 256789175126">
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" value="Send">
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- End of Contact Us via Phone Page -->
                                    </div><!-- End of Ask the Librarian Tab Contents -->
                                </div><!-- End of Card Body -->
                            </div>
                        </div>
                    </div><!-- End of Ask Librarian Page -->

                <?php elseif ($page == 'about-us'): ?>

                    <!-- About us Page -->
                    <div class="row">
                        <div class="col">
                            <p>About Us Page</p>
                        </div>
                    </div><!-- End of About us Page -->
                </div><!-- End of the Main Body -->

            <?php endif; ?>
                <!-- Right Side Section of the Page
                <div class="col-*-1 col-md-6 border">
                    Lorem Ipsum is simply dummy
                    <i class="fab fa-whatsapp fa-3x fa-pull-right fa-border"></i><br>

                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><br>
                    <span class="sr-only">Loading...</span>

                    <i class="fab fa-facebook fa-3x"></i><br><br>

                    <i class="fa fa-cog fa-spin fa-3x fa-fw"></i><br><br>
                    <span class="sr-only">Loading...</span>

                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><br>
                    <span class="sr-only">Loading...</span>
                </div>-->
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
