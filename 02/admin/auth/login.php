<?php
include_once 'auth.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate the user
    if (authenticateUser($username, $password)) {
        // User is authenticated, redirect to a secure page
        header('Location: index.php');
        exit;
    } else {
        // Authentication failed, display an error message
        $error = 'Login failed. Check your username and password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesbrand" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- css -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../css/colors/cyan.css" id="color-opt">
    <link rel="stylesheet" type="text/css" href="../../css/pe-icon-7-stroke.css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

    
    <body data-bs-theme="light">
    <!-- START NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-white navbar-custom sticky sticky-white" role="navigation"
        id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="index.php">
                <i class="mdi mdi-alien"></i>Hiric
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-center" id="navbar-navlist">
                    <li class="nav-item">
                        <a data-scroll href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="../02/admin/awards/index.php" class="nav-link">Awards</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="../02/admin/products/index.php" class="nav-link">Listings</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="../02/admin/team/index.php" class="nav-link">Teams</a>
                    </li>                    
                    <li class="nav-item">
                        <a data-scroll href="../02/admin/contacts/index.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a data-scroll href="../02/admin/auth/index.php" class="nav-link">Login</a>
                    </li>  

                </ul>
                <div class="nav-button ms-auto">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a data-scroll href="../02/admin/auth/registration.php">
                            <button type="button"
                                class="btn btn-primary navbar-btn btn-rounded waves-effect waves-light">Sign Up</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!--START HOME-->
    <section class="section bg-home home-half" id="home" data-image-src="images/bg-home.jpg">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-white text-center">
                    <h4 class="home-small-title">EverGreen Estates Realty</h4>
                    <h1 class="home-title">Login</h1>
                    <p class="pt-3 home-desc mx-auto">Access your account</p>
                    <p class="play-shadow mt-4" data-bs-toggle="modal" data-bs-target="#watchvideomodal"><a
                            href="javascript: void(0);" class="play-btn video-play-icon"><i
                                class="mdi mdi-play text-center"></i></a></p>
                                </div>         
                    <!-- Modal -->
                    <div class="modal fade" id="watchvideomodal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body p-0" style="margin-bottom: -8px;">
                                    <video id="VisaChipCardVideo" class="video-box" controls  width="800" >
                                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" >
                                        <!--Browser does not support <video> tag -->
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HOME-->

    <!-- CONTACT FORM START-->
    <section class="section " id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="section-title text-center">Welcome back!</h1>
                    <div class="section-title-border mt-3"></div>
                    <p class="section-subtitle text-muted text-center font-secondary pt-4">Join the many users looking for their dream home.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">

                    <?php if (isset($error)) : ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <form method="post" action="">
                                
                    <div class="mt-4 pt-4">
                        <p class="mt-4"><span class="h5"><label for="username">Username: </label>
                        </span><br> <span
                                class="text-muted d-block mt-2"></span></p>
                        <p class="mt-4"><span class="h5"><label for="password">Password: </label>
                    
                    </div></form>
                </div>
                <div class="col-lg-8">
                    <div class="custom-form mt-4 pt-4">
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <p id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                    <input type="text" name="username" type="required" class="form-control"
                                            placeholder="Your username*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input name="textl" id="password" type="required" class="form-control"
                                            placeholder="Your password*">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control" id="subject"
                                            placeholder="Your Subject.." />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                    <input name="email" id="email" type="email" class="form-control"
                                            placeholder="Your email">
                                    </div>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-end">
                    
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary"
                                        value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT FORM END-->


    <!-- CLIENT LOGO -->
    <section class="section-sm bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="client-images my-3 my-md-0">
                        <img src="../../images/clients/1.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="client-images my-3 my-md-0">
                        <img src="../../images/clients/2.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="client-images my-3 my-md-0">
                        <img src="../../images/clients/3.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="client-images my-3 my-md-0">
                        <img src="../../images/clients/4.png" alt="logo-img" class="mx-auto img-fluid d-block">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CLIENT LOGO -->
    <!--START FOOTER-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mt-4">
                    <a class="footer-logo text-uppercase" href="#">
                        <i class="mdi mdi-alien"></i>Hiric
                    </a>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <h4>Information</h4>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Bookmarks</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <h4>Support</h4>
                    <div class="text-muted mt-4">
                        <ul class="list-unstyled footer-list">
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Disscusion</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 mt-4">
                    <h4>Subscribe</h4>
                    <div class="mt-4">
                        <p></p>
                    </div>
                    <form class="form subscribe">
                        <input placeholder="Email" class="form-control text-white" required>
                        <a href="#" class="submit"><i class="pe-7s-paper-plane"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!--END FOOTER-->

    <!--START FOOTER ALTER-->
    <div class="footer-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-sm-start pull-none">
                        <p class="copy-rights  mb-3 mb-sm-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Hiric - Themesbrand
                        </p>
                    </div>
                    <div class="float-sm-end pull-none copyright">
                        <ul class="list-inline d-flex flex-wrap social m-0">
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="" class="social-icon"><i
                                        class="mdi mdi-microsoft-xbox"></i></a></li>
                        </ul>
                    </div>
                    <!-- <div class="clearfix"></div> -->
                </div>
            </div>
        </div>
    </div>
    <!--END FOOTER ALTER-->

    <!-- Style switcher -->
    <div id="style-switcher">
        <div>
            <h3 class="">Select your color</h3>
            <ul class="pattern">
                <li>
                    <a class="color1" href="javascript: void(0);" onclick="setColor('cyan')"></a>
                </li>
                <li>
                    <a class="color2" href="javascript: void(0);" onclick="setColor('red')"></a>
                </li>
                <li>
                    <a class="color3" href="javascript: void(0);" onclick="setColor('green')"></a>
                </li>
                <li>
                    <a class="color4" href="javascript: void(0);" onclick="setColor('pink')"></a>
                </li>
                <li>
                    <a class="color5" href="javascript: void(0);" onclick="setColor('blue')"></a>
                </li>
                <li>
                    <a class="color6" href="javascript: void(0);" onclick="setColor('purple')"></a>
                </li>
                <li>
                    <a class="color7" href="javascript: void(0);" onclick="setColor('orange')"></a>
                </li>
                <li>
                    <a class="color8" href="javascript: void(0);" onclick="setColor('yellow')"></a>
                </li>
            </ul>
        </div>
        <div class="bottom">
            <a href="javascript: void(0);" id="mode" class="mode-btn text-white">
                <i class="mdi mdi-weather-sunny bx-spin mode-light"></i>
                <i class="mdi mdi-moon-waning-crescent mode-dark"></i>
            </a>
            <a href="javascript: void(0);" class="settings" onclick="toggleSwitcher()"><i
                    class="mdi mdi-cog  mdi-spin"></i></a>
        </div>
    </div>
    <!-- end Style switcher -->

    <!-- javascript -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/smooth-scroll.polyfills.min.js"></script>
    <script src="../../js/gumshoe.polyfills.min.js"></script>
    <script src="../../js/app.js"></script>

</body>
</html>
