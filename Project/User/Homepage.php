<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>GalarieDArt</title>

    <!-- Favicon  -->
    <link rel="icon" href="../Assets/Template/Main/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../Assets/Template/Main/css/core-style.css">
    <link rel="stylesheet" href="../Assets/Template/Main/style.css">

    <!-- Responsive CSS -->
    <link href="../Assets/Template/Main/css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="showbox">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
            </div>
        </div>
        <div class="questions-area text-center">
            <p>Did you know?</p>
            <ul>
                <li>The largest photography competition is 353,768 entries.</li>
                <li>Photography is the toughest profession in the world.</li>
                <li>The world’s largest photo album by dimensions was 13 ft 11.5 in x 17 ft.</li>
                <li>The world’s largest photo mosaic featured 176,175 pictures.</li>
                <li>The world’s largest camera lens was a 5200mm lens attached to a canon.</li>
            </ul>
        </div>
    </div>

    <!-- Gradient Background Overlay -->
    <div class="gradient-background-overlay"></div>

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="../Assets/Template/Main/index.html" style="color:#FFF;font-size:30px;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif">GalarieDArt</a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                            <div class="collapse navbar-collapse" id="studioMenu">
                                <!-- Menu Area Start  -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="Homepage.php">Home<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="SearchArtist.php">search Artist</a>
                                            <a class="dropdown-item" href="SearchShop.php">Search Shop</a>
                                            <a class="dropdown-item" href="SearchProduct.php">Search Product</a>
                                             <a class="dropdown-item" href="SearchArt.php">Search Art</a>
                                             <a class="dropdown-item" href="ViewExhibitionDetails.php">Exhibition Details</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="Myprofile.php">My Profile</a>
                                            <a class="dropdown-item" href="Editprofile.php">Edit Profile</a>
                                            <a class="dropdown-item" href="Changepassword.php">Change Password</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bookings</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="ViewExhibitionBooking.php">Exhibition Bookings</a>
                                            <a class="dropdown-item" href="ViewArtBooking.php">Art Bookings</a>
                                            <a class="dropdown-item" href="MyBooking.php">Product Bookings</a>
                                            <a class="dropdown-item" href="MyCart.php">Cart</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Complaint.php">Complaints</a>
                                   </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Feedback.php">Feedback</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" href="../index.php">Logout</a>
                                   </li>
                                </ul>
                               
                               <!-- <div class="header-search-form ml-auto">
                                    <form action="#">
                                        <input type="search" class="form-control" placeholder="Input your keyword then press enter..." id="search" name="search">
                                        <input class="d-none" type="submit" value="submit">
                                    </form>
                                </div>
                                
                                <div id="searchbtn">
                                    <img src="../../Assets/Template/Main/img/core-img/search.png" alt="">
                                </div>-->
                                
                                
                                
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="carousel h-100 slide" data-ride="carousel" id="welcomeSlider">
            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">

                <div class="carousel-item h-100 bg-img active" style="background-image: url(../Assets/Template/Main/img/1.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>
                        </div>
                    </div>
                </div>

                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/2.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                        <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/3.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                       <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/4.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                      <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/5.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                       <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/6.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                       <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/7.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                        <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/8.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                       <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
               
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/11.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                        <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(../Assets/Template/Main/img/14.png);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                                                       <h2>Welcome <?php echo $_SESSION["uname"]  ?></h2>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#welcomeSlider" data-slide-to="0" class="active bg-img" style="background-image: url(../Assets/Template/Main/img/1.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="1" class="bg-img" style="background-image: url(../Assets/Template/Main/img/2.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="2" class="bg-img" style="background-image: url(../Assets/Template/Main/img/3.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="3" class="bg-img" style="background-image: url(../Assets/Template/Main/img/4.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="4" class="bg-img" style="background-image: url(../Assets/Template/Main/img/5.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="5" class="bg-img" style="background-image: url(../Assets/Template/Main/img/6.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="6" class="bg-img" style="background-image: url(../Assets/Template/Main/img/7.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="7" class="bg-img" style="background-image: url(../Assets/Template/Main/img/8.png);"></li>
                <li data-target="#welcomeSlider" data-slide-to="10" class="bg-img" style="background-image: url(../Assets/Template/Main/img/11.png);"></li> 
                <li data-target="#welcomeSlider" data-slide-to="11" class="bg-img" style="background-image: url(../Assets/Template/Main/img/12.png);"></li>
               
            </ol>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

   

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="../Assets/Template/Main/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../Assets/Template/Main/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../Assets/Template/Main/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../Assets/Template/Main/js/plugins.js"></script>
    <!-- Active js -->
    <script src="../Assets/Template/Main/js/active.js"></script>

</body>

</html>