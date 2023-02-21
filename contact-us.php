<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Message Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

}
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

    <link rel="shortcut icon" href="assets/images/favicon-icon/url.png">
    <title>Car Rental Services | Page details</title>
    <style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
    </style>

</head>

<body class="bg-gray-100">

    <!--Header-->
    <?php include('includes/header.php');?>

    <!-- contact us -->
    <section class=" md:grid md:grid-cols-2 gap-4 p-8 m-4">
        <div>
            <img src="assets/images/contact1.png" class="h-[400px] mx-10 md:mx-40" alt="" srcset="">
        </div>
        <div>
           
            <form method="post" class="bg-gray-200 p-5 px-10 rounded-3xl">
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?>
            </div><?php } 
                            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:
                <?php echo htmlentities($msg); ?> </div>
            <?php }?>
                <div class="form-group">
                    <label class="control-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control white_bg rounded-2xl" id="fullname" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Email Address</label>
                    <input type="email" name="email" class="form-control white_bg rounded-2xl" id="emailaddress" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="text" name="contactno" class="form-control white_bg rounded-2xl" id="phonenumber" required
                        maxlength="10" pattern="[0-9]+">
                </div>
                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea class="form-control white_bg rounded-2xl" name="message" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <button
                        class="w-full bg-indigo-800 p-3 text-white hover:bg-white hover:text-indigo-900 border-2 border-white text-2xl rounded-2xl font-semibold"
                        type="submit" name="send" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    <!--Footer -->
    <?php include('includes/footer.php');?>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
    </div>
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

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->

</html>