                    <?php
                      if(isset($_POST['login']))
                      {
                      $email=$_POST['email'];
                      $password=md5($_POST['password']);
                      $sql ="SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
                      $query= $dbh -> prepare($sql);
                      $query-> bindParam(':email', $email, PDO::PARAM_STR);
                      $query-> bindParam(':password', $password, PDO::PARAM_STR);
                      $query-> execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      if($query->rowCount() > 0)
                      {
                      session_start();
                      $_SESSION['ulogin'] = true;
                      $_SESSION['ulogin']=$_POST['email'];
                      $_SESSION['fname']=$results->FullName;
                      $currentpage=$_SERVER['REQUEST_URI'];
                      echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
                      } else{
                        
                        echo "<script>alert('Invalid Details');</script>";

                      }

                      }

                    ?>
                        <div class="modal fade" id="loginform">
                          <div class="modal-dialog px-10 md:px-40" role="document">
                            <div class="bg-gray-200 p-10 rounded-lg w-full">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Login</h3>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="login_wrap">
                                    <div class="col-md-12 col-sm-6">
                                      <form method="post">
                                        <div class="form-group mx-8 md:mx-10">
                                          <input type="email" class="form-control" name="email" placeholder="Email address">
                                        </div>
                                        <div class="form-group mx-8 md:mx-10">
                                          <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                          <input type="submit" name="login" value="Login" class="w-1/3 mx-44 md:mx-52 rounded-lg bg-indigo-800 p-3 text-white hover:bg-white hover:text-indigo-800 border-2 border-white text-2xl">
                                        </div>
                                      </form>
                                    </div>
                                  
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer text-center">
                                <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal" class="text-indigo-700 hover:text-indigo-800">Signup Here</a></p>
                                <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal" class="text-indigo-700 hover:text-indigo-800">Forgot Password ?</a></p>
                              </div>
                            </div>
                          </div>
                        </div>