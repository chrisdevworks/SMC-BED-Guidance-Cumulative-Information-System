<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SMC-BED Guidance Office</title>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();

    }

    // $_SESSION['myid'] = $_POST['id'];
    // if (!isset($_SESSION)) session_start();
    // if(isset($_GET["id"]))
    // {
    //     $data = $_GET["id"];
    // }else{
    //     header("Location: mainpage.php");
    //     die();
    // }
    // include('./db_connect.php');
    include 'db_connect.php';
    // if(isset($_SESSION['login_id']))
    //     // header('location:mainpage.php');
    //     echo 'hello';

	include 'header.php' 

        
    ?>
    <link rel="stylesheet" href="assets/dist/css/mainpage/style.css">
    <style>
   
    </style>
    <script>
        //    xhr.abort();
    </script>
</head>

<body class="">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg bg-smc">
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto">
                <a class="navbar-brand" href="mainpage.php"><img src="assets/dist/css/mainpage/img/logo 1.png"
                        style="width:100%; height:auto; max-width:200px;" /></a>
            </div>
            <div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto">
                <a class="nav-link" href="mailto:info@smciligan.edu.ph" style="margin: auto; width: auto"><i
                        class="bi bi-envelope px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i>
                    info@smciligan.edu.ph</a>
                <a class="nav-link" href="tel:(063) 221-7134" style="margin: auto; width: auto"><i
                        class="bi bi-phone px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i> (063)
                    221-7134</a>
                <a class="nav-link ml-auto" href="https://www.facebook.com/bed.smc/"
                    style="margin: auto; width: auto"><i class="bi bi-facebook px-2"
                        style="font-size: 1.2rem; color: cornflowerblue;"></i> bed.smc</a>
            </div>
           
            <?php if(isset($_SESSION['login_id'])): ?>
            <div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto">
                <span class="nav-item" id="loginbtn"><a href="index.php" class="nav-link nav-new_user tree-item"><i
                            class="bi bi-speedometer2 px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i>
                        Dashboard</a></span>
            </div>
            <?php else:?>
            <div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto">
                <span class="nav-item" id="loginbtn"><a href="login.php" class="nav-link nav-new_user tree-item"><i
                            class="bi bi-person-circle px-2" style="font-size: 1.2rem; color: cornflowerblue;"></i>
                        Sign-in</a></span>
            </div>
            <?php endif; ?>
        </div>
        </div>
    </nav>

    <!-- Page header with logo and tagline-->
    <!-- <header class="pt-5 px-5  mb-5 bg-gray-light" style="max-width:100%; height: auto; ">
        <img class="px-5" src="assets/dist/css/mainpage/img/header-bg.png" style="width:100%; height:auto;" />
    </header> -->
    <!-- Page content-->
    <section class="">
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-12">
                    <?php 
                    // echo extract($_POST);
                    $id = $_GET['article'];

                    $newsfeed = $conn->query("SELECT * FROM newsfeed WHERE id='".$id."'");
                    while($row=$newsfeed->fetch_assoc()):	
                    ?>
                    <!-- Featured blog post-->
                    
                    <div class="card mb-4">
                        <img class="card-img-top" src="<?php echo $row['uploads'] ?>" alt="..." />
                        <div class="card-body">
                            <h2 class=""><?php echo $row['title'] ?></h2><br>
                            <div class="small text-muted mb-4"><?php echo date("M d, Y",strtotime($row['dateposted'])) ?>
                            </div>
                            <div class="content">
                                <p class="card-text text-justify "><span class="mx-4"></span><?php echo $row['content'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="px-auto bg-smc">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <a href target="_blank">St. Michael's College
                    Information Technology Center</a></p>
        </div>
    </footer>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
//Table Pagination
   

</script>
</html>