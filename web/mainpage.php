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
    // if (!isset($_SESSION)) session_start();
    // include('./db_connect.php');
    include 'db_connect.php';
    // if(isset($_SESSION['login_id']))
    //     // header('location:mainpage.php');
    //     echo 'hello';

	include 'header.php' 
    
    ?>
    <link rel="stylesheet" href="assets/dist/css/mainpage/style.css">
    <style>
        /* .grow {
        height: 50px;
        transition: height 0.5s;
        -webkit-transition: height 0.5s;
        text-align: center;
        overflow: hidden;
        } */
        /* .grow:hover {
            height: auto;
            transition: all .5s ease;
        } */

        .auto {
            /* display: block; */
            /* margin: 20px; */
            height: 10;
            overflow: hidden;
            transition: all .5s ease;
        }

        .collapsible {
            /* background-color: #777; */
            /* color: white; */
            cursor: pointer;
            /* padding: 18px; */
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #555;
            transition: all .5s ease;
        }

        .content {
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 0 18px;
            max-height: 0;
            height: 50;
            overflow: hidden;
            transition: all .5s ease;
        }

        a {
            color: white !important;
        }
        .pcontent>*{
            font-family: "Playfair Display", "Didot", "Times New Roman", Times, serif; 
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body class="">
    <!-- Responsive navbar-->

    <nav class="navbar navbar-expand-lg bg-smc">
        <div class="container-fluid">
            <div class="mr-auto mb-2 mb-lg-0 mx-5 d-flex flex-row">
                <a class="navbar-brand" href="mainpage.php"><img src="assets/dist/css/mainpage/img/logo 1.png"
                        style="width:100%; height:auto; max-width:200px;" /></a>
            </div>
            <button class="navbar-toggler bg-light btn-dark btn-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon p-1"><i class="fa-solid fa-angle-down arrow"></i></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto mb-2 mb-lg-0 mx-auto d-flex justify-content-center">
                    <a class="nav-link" href="mailto:info@smciligan.edu.ph"><i class="bi bi-envelope px-2"
                            style="font-size: 1.2rem; color: cornflowerblue;"></i>
                        info@smciligan.edu.ph</a>
                    <a class="nav-link" href="tel:(063) 221-7134"><i class="bi bi-phone px-2"
                            style="font-size: 1.2rem; color: cornflowerblue;"></i> (063)
                        221-7134</a>
                    <a class="nav-link" href="https://www.facebook.com/bed.smc/"><i class="bi bi-facebook px-2"
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
    <header class="bg-gray-light" style="max-width:100%; height: auto; ">
        <img class="" src="assets/dist/css/mainpage/img/header-bg.png"
            style="height: 100%; width: 100%; object-fit: contain; position:relative;" />
    </header>
    <!-- Page content-->
    <section class="pcontent">
        <div class="container">
            <div class="row">
                <!-- Blog entries-->

                <div class="col-lg-7 leftcolumn">
                    <div class="col-lg-12">
                        <h2>Latest News</h2>

                        <hr class="mb-5">
                    </div>
                    <?php 
                    $newsfeed = $conn->query("SELECT * FROM newsfeed ORDER BY dateposted DESC LIMIT 2");
                    while($row=$newsfeed->fetch_assoc()):	
                    ?>
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <img class="card-img-top" src="<?php echo $row['uploads'] ?>" alt="..." />
                        <div class="card-body">
                            <div class="text-uppercase small text-muted"><?php echo date("M d, Y",strtotime($row['dateposted'])) ?>
                            </div>
                            <h1 class=""><?php echo $row['title'] ?></h1>
                            <div class="content">
                                <p class="card-text text-justify "><span
                                        class="mx-4"></span><?php echo $row['content'] ?></p>
                            </div>
                            <button class="btn btn-primary btn-lg collapsible text-center" href="#!">
                                <!-- <i class=" fa-solid fa-angles-down"></i> -->
                                <i class="fa-solid fa-angle-down arrow"></i>
                            </button>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

                <div class="col-lg-5 float-left rightcolumn">
                    <div class="row">
                        <div class="col-lg-12 float-left">
                            <h2>ㅤ</h2>
                            <hr class="mb-5">
                        </div>
                        <?php 
                        $newsfeed = $conn->query("SELECT * FROM newsfeed ORDER BY dateposted DESC LIMIT 4 OFFSET 2");
                        while($row=$newsfeed->fetch_assoc()):	
                        ?>
                        <div class="col-lg-5">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <img class="card-img-top" src="<?php echo $row['uploads'] ?>" alt="..." />
                                <div class="card-body">
                                    <div class="small text-muted">
                                        <?php echo date("M d, Y",strtotime($row['dateposted'])) ?></div>
                                    <h2 class=" h4"><?php echo $row['title'] ?></h2>
                                    <a class="btn btn-primary btn-sm news"
                                        href="news.php?article=<?php echo $row['id'] ?>" target="">Read more →</a>
                                    <!-- <button type="button" class="btn btn-primary getnews" data-id="<?php echo $row['id'] ?>">Read more → -->
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php 
                        $newsfeed = $conn->query("SELECT * FROM newsfeed ORDER BY dateposted DESC LIMIT 4 OFFSET 6");
                        while($row=$newsfeed->fetch_assoc()):	
                        ?>
                        <div class="col-lg-5">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <img class="card-img-top" src="<?php echo $row['uploads'] ?>" alt="..." />
                                <div class="card-body">
                                    <div class="small text-muted">
                                        <?php echo date("M d, Y",strtotime($row['dateposted'])) ?></div>
                                    <h3 class=" h4"><?php echo $row['title'] ?></h3>
                                    <a class="btn btn-primary btn-sm news"
                                        href="news.php?article=<?php echo $row['id'] ?>" target="">Read more →</a>
                                    <!-- <button type="button" class="btn btn-primary getnews" data-id="<?php echo $row['id'] ?>">Read more → -->
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
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
    if (document.getElementsByClassName("auto")) {
        var autos = document.getElementsByClassName("auto");
        for (var i = 0; i < autos.length; i++) {
            autos[i].addEventListener("mouseover", autoOver);
            autos[i].addEventListener("mouseout", autoOut);
        }
    }

    function autoOver() {
        this.style.height = this.scrollHeight + "px";
    }

    function autoOut() {
        this.style.height = "20px";
    }


    ///////////////////


    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");

            var content = this.previousElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                $(".arrow").removeClass("fa-angle-up").addClass("fa-angle-down");

            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                //   $(".arrow").removeClass("fa-angle-up").addClass("fa-angle-down");
                $(".arrow").removeClass("fa-angle-down").addClass("fa-angle-up");
            }
        });
    }
</script>

</html>