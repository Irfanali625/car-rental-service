          <?php
//error_reporting(0);
              if(isset($_POST['signup']))
              {
              $fname=$_POST['fullname'];
              $email=$_POST['emailid']; 
              $mobile=$_POST['mobileno'];
              $password=md5($_POST['password']); 
              $cpassword=md5($_POST['confirmpassword']); 
              if($password == $cpassword){
                if(strlen($_POST['password']) < '8'){
                    echo "<script>alert('Password must be at least 8 characters');</script>
                    ";
                }
                else{

                    $sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
                    $query->bindParam(':email',$email,PDO::PARAM_STR);
                    $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
                    $query->bindParam(':password',$password,PDO::PARAM_STR);
                    $query->execute();
                    $lastInsertId = $dbh->lastInsertId();
                    if($lastInsertId)
                    {
                    echo "<script>alert('Registration successfull. Now you can login');
                    </script>";
                    }
                    else 
                    {
                    echo "<script>alert('Something went wrong. Please try again');</script>";
                    }
  
                    }
                }
                  else{
                    echo "<script>alert('Passwords do not match');
                    </script>";
                  }
              }
            ?>

            <script>
            function checkAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'emailid=' + $("#emailid").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
                    </script>
                 

          <div class="modal fade" id="signupform">
              <div class="modal-dialog px-10 md:px-40" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                          <h3 class="modal-title">Sign Up</h3>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="signup_wrap">
                                  <div class="col-md-12 col-sm-6">
                                      <form method="post" name="signup" onSubmit="return valid();">
                                          <div class="form-group mx-8 md:mx-10">
                                              <input type="text" class="form-control" name="fullname"
                                                  placeholder="Full Name" required="required">
                                          </div>
                                          <div class="form-group mx-8 md:mx-10">
                                              <input type="text" class="form-control" name="mobileno"
                                                  placeholder="Mobile Number" maxlength="10" required="required">
                                          </div>
                                          <div class="form-group mx-8 md:mx-10">
                                              <input type="email" class="form-control" name="emailid" id="emailid"
                                                  onBlur="checkAvailability()" placeholder="Email Address"
                                                  required="required">
                                              <span id="user-availability-status" style="font-size:12px;"></span>
                                          </div>
                                          <div class="form-group mx-8 md:mx-10">
                                              <input type="password" class="form-control" name="password"
                                                  placeholder="Password" required="required">
                                          </div>
                                          <div class="form-group mx-8 md:mx-10">
                                              <input type="password" class="form-control" name="confirmpassword"
                                                  placeholder="Confirm Password" required="required">
                                          </div>
                                          <div class="form-group">
                                              <input type="submit" value="Sign Up" name="signup" id="submit"
                                                  class="w-1/3 mx-44 md:mx-52 rounded-lg bg-indigo-800 p-3 text-white hover:bg-white hover:text-indigo-800 border-2 border-white text-2xl">
                                          </div>
                                      </form>
                                  </div>

                              </div>
                          </div>
                      </div>
                      <div class="modal-footer text-center">
                          <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal"
                                  class="text-indigo-700 hover:text-indigo-800">Login
                                  Here</a></p>
                      </div>
                  </div>
              </div>
          </div>