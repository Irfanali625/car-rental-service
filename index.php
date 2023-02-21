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

     <link rel="shortcut icon" href="assets/images/favicon-icon/url.png">
    <title>Car Rental Service</title>
</head> 

<body class="bg-gray-100">

    <!--Header-->
    <?php include('includes/header.php');?>
    <!-- /Header -->
    <main
        class="md:grid md:grid-cols-2 gap-2 mx-10 my-10">
        <div class="pt-6 md:py-20 md:pl-6 md:mx-10">
            <div class="mx-40 md:mx-52">
                <img src="assets/images/logo.png" alt="" class="h-40">
            </div>
            <div class="text-center md:text-left text-4xl md:text-5xl px-10 py-2 mt-6 font-bold">
               <h1 class="ml-0 md:ml-10">Welcome To Car Rental Services</h1>
            </div>
            <p class="text-center md:text-left md:ml-10 p-3">We offer the best car rental services and our prices are affordable.</p>
        </div>
        <div class="md:m-auto md:mt-0">
            <img class="h-[350px] md:h-[400px] w-full relative -top-20" src="assets/images/bg1.png" alt="">
        </div>
    </main>
    <!-- /Banners -->


    <!-- Recent Cat-->
    <section class="section-padding mb-4">
        <div class="container">
            <div class="row border-2 bg-gray-200 border-stone-300 shadow rounded-3xl p-16">

                <!-- Nav tabs -->
                <div class="">
                    <h1 class="text-4xl text-gray-700 font-bold text-center">Get new friend, Car for rent</h1>
                </div>
                <!-- Recently Listed New Cars -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="resentnewcar">

                        <?php 
                        $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {  
                        ?>

                        <div class="col-list-3">
                            <div class="recent-car-list">
                                <div class="car-info-box"> <a
                                        href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img
                                            src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"
                                            class="img-responsive h-96 w-full" alt="image"></a>
                                    <ul>
                                        <li><i class="fa fa-car"
                                                aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?>
                                        </li>
                                        <li><i class="fa fa-calendar"
                                                aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?>
                                            Model</li>
                                        <li><i class="fa fa-user"
                                                aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?>
                                            seats</li>
                                    </ul>
                                </div>
                                <div class="car-title-m">
                                    <h6><a class="hover:text-indigo-800" href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>">
                                            <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                                    <span class="price">PKR:<?php echo htmlentities($result->PricePerDay);?>/Day</span>
                                </div>
                                <div class="inventory_info_m">
                                    <p><?php echo substr($result->VehiclesOverview,0,70);?></p>
                                </div>
                            </div>
                        </div>
                        <?php }}?>

                    </div>
                </div>
            </div>
    </section>
    <!-- /Resent Cat -->

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