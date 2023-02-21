<?php 
                session_start();
                include('includes/config.php');
                // error_reporting(0);
               
                if(isset($_POST['submit']))
                {
                $fromdate=$_POST['fromdate'];
                $todate=$_POST['todate']; 
                $message=$_POST['message'];
                $useremail=$_SESSION['ulogin'];
                // $status=0;
                $vhid=$_GET['vhid'];
                // $bookingno=mt_rand(100000000, 999999999);
                // $ret="SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
                // $query1 = $dbh -> prepare($ret);
                // $query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
                // $query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
                // $query1->bindParam(':todate',$todate,PDO::PARAM_STR);
                // $query1->execute();
                // $results1=$query1->fetchAll(PDO::FETCH_OBJ);

                // if($query1->rowCount()==1)
                // {

                    $id=$_GET['id'];
                    $sql = "UPDATE tblbooking SET Fromdate=:fromdate,ToDate=:todate,message=:message where VehicleId=:vhid and id=:id and userEmail=:useremail";
                    $query2 = $dbh->prepare($sql);
                    $query2 -> bindParam(':fromdate',$fromdate, PDO::PARAM_STR);
                    $query2 -> bindParam(':todate',$todate, PDO::PARAM_STR);
                    $query2 -> bindParam(':message',$message, PDO::PARAM_STR);
                    $query2 -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
                    $query2 -> bindParam(':vhid',$vhid, PDO::PARAM_STR);
                    $query2-> bindParam(':id',$id, PDO::PARAM_STR);
                    $query2 -> execute();
                if($query2)
                {
                echo "<script>alert('Booking Updated successfull');</script>";
                echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
                }
                else 
                {
                echo "<script>alert('Something went wrong. Please try again');</script>";
                echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
                } 
            }  
                // else{
                // echo "<script>alert('Car already booked for these days');</script>"; 
                // echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                // }

                // }
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
                <title>Car Rental Services | Vehicle Details</title>

            </head>

            <body class="bg-gray-100">
                <!--Header-->
                <?php include('includes/header.php');?>
                <!-- /Header -->

                <?php 
                    $vhid=intval($_GET['vhid']);
                    $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
                    $query = $dbh -> prepare($sql);
                    $query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {  
                    $_SESSION['brndid']=$result->bid;  
                ?>

                <section id="listing_img_slider">
                    <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"
                            class="img-responsive" alt="image" width="900" height="560"></div>
                    <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>"
                            class="img-responsive" alt="image" width="900" height="560"></div>
                    <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>"
                            class="img-responsive" alt="image" width="900" height="560"></div>
                    <!-- <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"
                                alt="image" width="900" height="560"></div>
                        <?php if($result->Vimage5=="")
                {

                } 
                else { ?>
                
                        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive"
                                alt="image" width="900" height="560"></div>
                        <?php } ?> -->
                </section>
                <!--/Listing-Image-Slider-->


                <!--Listing-detail-->
                <section class="listing-detail">
                    <div class="container">
                        <div class="listing_detail_head row">
                            <div class="col-md-9 text-4xl">
                                <h2><?php echo htmlentities($result->BrandName);?> ,
                                    <?php echo htmlentities($result->VehiclesTitle);?></h2>
                            </div>
                            <div class="col-md-3">
                                <div class="price_info">
                                    <p>PKR:<?php echo htmlentities($result->PricePerDay);?> </p>Per Day

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="main_features mx-11 md:mx-[265px]">
                                    <ul>

                                        <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <h5><?php echo htmlentities($result->ModelYear);?></h5>
                                            <p>Reg.Year</p>
                                        </li>
                                        <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                                            <h5><?php echo htmlentities($result->FuelType);?></h5>
                                            <p>Fuel Type</p>
                                        </li>

                                        <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
                                            <p>Seats</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing_more_info">
                                    <div class="listing_detail_wrap">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs gray-bg" role="tablist">
                                            <li role="presentation" class="active"><a href="#vehicle-overview "
                                                    aria-controls="vehicle-overview" role="tab"
                                                    data-toggle="tab">Vehicle Overview
                                                </a></li>

                                            <li role="presentation"><a href="#accessories" aria-controls="accessories"
                                                    role="tab" data-toggle="tab">Accessories</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <!-- vehicle-overview -->
                                            <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                                                <p><?php echo htmlentities($result->VehiclesOverview);?></p>
                                            </div>


                                            <!-- Accessories -->
                                            <div role="tabpanel" class="tab-pane" id="accessories">
                                                <!--Accessories-->
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Accessories</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Air Conditioner</td>
                                                            <?php if($result->AirConditioner==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>AntiLock Braking System</td>
                                                            <?php if($result->AntiLockBrakingSystem==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } 
                                                else {?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>Power Steering</td>
                                                            <?php if($result->PowerSteering==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>


                                                        <tr>

                                                            <td>Power Windows</td>

                                                            <?php if($result->PowerWindows==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>CD Player</td>
                                                            <?php if($result->CDPlayer==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>Leather Seats</td>
                                                            <?php if($result->LeatherSeats==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } 
                                                else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>Central Locking</td>
                                                            <?php if($result->CentralLocking==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } 
                                                else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>Power Door Locks</td>
                                                            <?php if($result->PowerDoorLocks==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } 
                                                else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <td>Brake Assist</td>
                                                            <?php if($result->BrakeAssist==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php  } else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>Driver Airbag</td>
                                                            <?php if($result->DriverAirbag==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } 
                                                else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>Passenger Airbag</td>
                                                            <?php if($result->PassengerAirbag==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } 
                                                else {?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                        <tr>
                                                            <td>Crash Sensor</td>
                                                            <?php if($result->CrashSensor==1)
                                                {
                                                ?>
                                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                                            <?php } 
                                                else { ?>
                                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                                            <?php } ?>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php }} ?>

                            </div>

                            <!--Side-Bar-->
                            <?php 
                       $vhid=intval($_GET['vhid']);
                       $bid=intval($_GET['id']);
                       $useremail=$_SESSION['ulogin'];
                       $sql = "SELECT * from tblbooking where VehicleId=:vhid and id=:bid";
                       $query = $dbh -> prepare($sql);
                       $query -> bindParam(':vhid',$vhid, PDO::PARAM_STR);
                       $query -> bindParam(':bid',$bid, PDO::PARAM_STR);
                       $query->execute();
                       $results=$query->fetchAll(PDO::FETCH_OBJ);
                       $cnt=1;
                       if($query->rowCount() > 0)
                       {
                       foreach($results as $result)
                       { ?>
                            <aside class="col-md-3 -top-52">
                                <div class="sidebar_widget">
                                    <div class="widget_heading">
                                        <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
                                    </div>
                                    <form method="post">
                                        <div class="form-group">
                                            <label>From Date:</label>
                                            <input type="date" value="<?php echo htmlentities($result->FromDate);?>" class="form-control" name="fromdate"
                                                placeholder="From Date" required>
                                        </div>
                                        <div class="form-group">
                                            <label>To Date:</label>
                                            <input type="date" value="<?php echo htmlentities($result->ToDate);?>" class="form-control" name="todate" placeholder="To Date"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control" name="message" placeholder="Message"
                                                required><?php echo htmlentities($result->message);?></textarea>
                                        </div>
                                        <?php if($_SESSION['ulogin'])
                            { ?>
                                        <div class="form-group">
                                            <input type="submit"
                                                class="bg-indigo-800 text-white text-2xl font-medium py-2 px-3 hover:bg-white hover:text-indigo-800 border-2 border-white rounded mx-[170px] md:mx-36"
                                                name="submit" value="Update Now">
                                        </div>
                                        <!-- <a href="update-booking.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm this booking')" class="bg-indigo-800 text-white text-2xl font-medium py-2 px-3 hover:bg-white hover:text-indigo-800 border-2 border-white rounded mx-[170px] md:mx-36"> Update</a> -->
                                        <?php } ?>
                                    </form>
                                </div>
                            </aside>
                          <?php }} ?>
                            <!--/Side-Bar-->
                        </div>

                        <div class="space-20"></div>
                        <div class="divider"></div>

                        <!--Similar-Cars-->
                        <div class="similar_cars">
                            <h3 class="text-3xl">Similar Cars</h3>
                            <div class="row">
                                <?php 
                        $bid=$_SESSION['brndid'];
                        $sql="SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:bid";
                        $query = $dbh -> prepare($sql);
                        $query->bindParam(':bid',$bid, PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        { ?>
                                <div class="col-md-3 grid_listing">
                                    <div class="product-listing-m gray-bg">
                                    <div class="car-info-box"> <a
                                        href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img
                                            src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"
                                            class="img-responsive h-80 w-full" alt="image"></a>
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
                                        <h1><a class="text-2xl font-bold hover:text-indigo-800" href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>">
                                            <?php echo htmlentities($result->VehiclesTitle);?></a></h1>
                                    <span class="price">PKR:<?php echo htmlentities($result->PricePerDay);?>/Day</span>
                                    </div>
                                    <div class="inventory_info_m">
                                    <p><?php echo substr($result->VehiclesOverview,0,50);?></p>
                                    </div>
                                    </div>
                                </div>
                                 <?php }}?>

                            </div>
                        </div>
                        <!--/Similar-Cars-->
                    </div>
                </section>
                <!--/Listing-detail-->

                <!--Footer -->
                <?php include('includes/footer.php');?>
                <!-- /Footer-->

                <!--Back to top-->
                <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i>
                    </a> </div>
                <!--/Back to top-->

                <!--ulogin-Form -->
                <?php include('includes/ulogin.php');?>
                <!--/ulogin-Form -->

                <!--Register-Form -->
                <?php include('includes/registration.php');?>

                <!--/Register-Form -->

                <!--Forgot-password-Form -->
                <?php include('includes/forgotpassword.php');?>

                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/bootstrap.min.js"></script>
                <script src="assets/js/interface.js"></script>
                <script src="assets/switcher/js/switcher.js"></script>
                <script src="assets/js/bootstrap-slider.min.js"></script>
                <script src="assets/js/slick.min.js"></script>
                <script src="assets/js/owl.carousel.min.js"></script>

            </body>

            </html>