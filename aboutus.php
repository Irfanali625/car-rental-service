<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
     <!-- tailwind -->
     <script src="https://cdn.tailwindcss.com"></script>

     <link rel="shortcut icon" href="assets/images/url.png">
    <title>Car Rental Service</title>
</head>

<body>

    <!--Header-->
    <?php include('includes/header.php');?>
    <!-- /Header -->

           
        <section class="bg-gray-100 h-[500px]">
            <div class="text-center p-20">
                <h1 class="text-4xl font-bold my-5">About Us</h1>
                <p class="px-32">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, hic nisi, nulla repellat molestias iusto incidunt sit cupiditate modi possimus eum nesciunt numquam recusandae voluptas. Eos et rerum dolores veniam!
                Natus neque et debitis, doloremque maiores autem dignissimos asperiores eum tempora laborum. Omnis iure consectetur, deserunt saepe quo cum eum, sapiente rerum dolorem eos exercitationem. Iste, fugiat sequi? Omnis, in.
                Eligendi doloremque totam dolores, ipsa sapiente cupiditate nam laudantium quis harum ex tempora nostrum labore voluptate explicabo hic dolor pariatur, qui dolorem temporibus quisquam blanditiis quos quae, modi iure! Harum.</p>
            </div>
        </section>

    <!--Footer -->
    <?php include('includes/footer.php');?>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    <!--Login-Form -->
    <?php include('includes/login.php');?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php include('includes/registration.php');?>

    <!--/Register-Form -->

    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php');?>
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>