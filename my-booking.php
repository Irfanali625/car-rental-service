      <?php
        session_start();
        // error_reporting(0);
        include('includes/config.php');
        if(strlen($_SESSION['ulogin'])==0)
          { 
        header('location:index.php');
        }
        else{ 
          if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "DELETE From tblbooking where id=:id";
            $query = $dbh->prepare($sql);
            $query-> bindParam(':id',$id, PDO::PARAM_STR);
            $query-> execute();
            if($query)
                {
                echo "<script>alert('Booking Canceled successfull');</script>";
                echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
                }
                else 
                {
                echo "<script>alert('Something went wrong. Please try again');</script>";
                echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
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

     <link rel="shortcut icon" href="assets/images/url.png">
<title>Car Rental Services | My Booking</title>
</head>
<body class="bg-gray-100">
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 


                      <?php 
                        $useremail=$_SESSION['ulogin'];
                        $sql = "SELECT * from tblusers where EmailId=:useremail";
                        $query = $dbh -> prepare($sql);
                        $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        { ?>
                        <section class="user_profile inner_pages">
                          <div class="container">
                            <div class="user_profile_info gray-bg padding_4x4_40">
                              <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
                              </div>

                              <div class="dealer_info">
                                <h5 class="text-3xl font-semibold mb-4"><?php echo htmlentities($result->FullName);
                                ?></h5>
                                <p><?php echo htmlentities($result->Address);?><br>
                                  <?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country); }}?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3 col-sm-3">
                              <?php include('includes/sidebar.php');?>
                          
                              <div class="col-md-8 col-sm-8">
                                <div class="profile_wrap">
                                  <h5 class="uppercase">My Booikngs </h5>
                                  <div class="my_vehicles_list">
                                    <ul class="vehicle_listing">
                        <?php 
                        $useremail=$_SESSION['ulogin'];
                        $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.id,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail order by tblbooking.id desc";
                        $query = $dbh -> prepare($sql);
                        $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                          foreach($results as $result)
                          {  ?>
                          <li>
                            <h4 style="color:red">Booking No #<?php echo htmlentities($result->BookingNumber);?></h4>
                                        <div class="vehicle_img"> <a href=""><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                                        <div class="vehicle_title">

                                          <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                                          <p><b>From </b> <?php echo htmlentities($result->FromDate);?> <b>To </b> <?php echo htmlentities($result->ToDate);?></p>
                                          <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>
                                        </div>
                                        <?php if($result->Status==1)  
                                        { ?>
                                        <div class="vehicle_status"> <a href="#" class="border-2 border-green-500 text-xl p-2 bg-white rounded hover:text-green-500">Confirmed</a>
                                                  <div class="clearfix"></div>
                                        </div>

                        <?php } else if($result->Status==2) { ?>
                        <div class="vehicle_status"> <a href="#" class="border-2 border-red-500 text-xl p-2 bg-white rounded hover:text-green-500">Cancelled</a>
                                    <div class="clearfix"></div>
                                </div>
                                    


                              <?php } else { ?>
                              <div class="vehicle_status"> <a href="#" class="border-2 border-yellow-500-500 text-xl p-2 bg-white rounded">Not Confirm yet</a>
                                    <div class="clearfix"></div>
                                </div>
                                <?php } ?>
                                <div class="ml-[340px] md:ml-[710px] mt-20 grid absolute text-xl text-center">
                                  <a href="my-booking.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Cancel this Booking')"><button class="bg-red-600 text-white p-2 border-2 border-white rounded-lg">Cancel Booking</button></a>

                                  <a href="update-booking.php?vhid=<?php echo htmlentities($result->vid);?>&id=<?php echo htmlentities($result->id);?>"><button class="bg-blue-600 text-white p-2 border-2 border-white rounded-lg my-2">Update Booking</button></a>
                                </div>
                                      </li>
                                          <h5 style="color:blue">Invoice</h5>
                                          <table>
                                            <tr>
                                              <th>Car Name</th>
                                              <th>From Date</th>
                                              <th>To Date</th>
                                              <th>Total Days</th>
                                              <th>Rent / Day</th>
                                            </tr>
                                            <tr>
                                              <td><?php echo htmlentities($result->VehiclesTitle);?>, <?php echo htmlentities($result->BrandName);?></td>
                                              <td><?php echo htmlentities($result->FromDate);?></td>
                                                <td> <?php echo htmlentities($result->ToDate);?></td>
                                                <td><?php echo htmlentities($tds=$result->totaldays);?></td>
                                                  <td> <?php echo htmlentities($ppd=$result->PricePerDay);?></td>
                                            </tr>
                                            <tr>
                                              <th colspan="4" style="text-align:center;"> Grand Total</th>
                                              <th><?php echo htmlentities($tds*$ppd);?></th>
                                            </tr>
                                          </table>
                                          <hr />
                                      <?php }}  else { ?>
                                        <h5 align="center" style="color:red">No booking yet</h5>
                                      <?php } ?>
                                    
                                
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

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
<?php } ?>