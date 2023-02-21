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

      <!-- Recent Cat-->
      <section class="section-padding gray-bg bg-gray-100 mb-4">
        <div class="container">
            <div class="row p-14">

                <!-- Nav tabs -->
                <div class="">
                    <h1 class="text-4xl text-gray-700 font-bold text-center">Choose Your Best</h1>
                </div>
                <!-- Recently Listed New Cars -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="resentnewcar">

                    <!-- Pagination -->
                    <?php
                     $numperpage = 9;
                     $sql = "SELECT * FROM tblvehicles";
                     $query = $dbh -> prepare($sql);
                     $query->execute();
                     $row = $query->rowCount();
                     $numlinks = ceil($row/$numperpage);
                     if(isset($_GET["page"])){
                        $page = $_GET["page"];
                    }
                    else{
                        $page = 1;
                    }
                    $start_from = ($page-1)*9; 
                    ?>
                    <!-- pagination -->

                        <?php 
                        $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit $start_from,$numperpage";
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
            <div class="text-center">
            <!-- pagination -->
            <?php
             if($page>1){
                echo "
                <a class='border-2 p-1' href='all-cars.php?page=".($page-1)."'>Previous</a>";
            }

            for ($i=1; $i <= $numlinks; $i++) { 
                echo "
                <a class='border-2 p-1' href='all-cars.php?page=".$i."'>".$i."</a>";
            }

            if($i>$page){
                echo "
                <a class='border-2 p-1' href='all-cars.php?page=".($page+1)."'>Next</a>";
            }
            ?>
            <!-- pagination -->
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