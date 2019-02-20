
<?php    include "core/init.php";?>

<?php include "includes/register.php";?>
<?php include "includes/header.php";?>

<body class="register-page">


<?php include "includes/navbar.php";

if (isset($prompt['create'])) {
    echo'<h1>'.$prompt['create'].'</h1>';
    
}
if (isset($error)) {
    echo"<div class='container'>
            <p>$error</p>
        </div>";
    
}
?>
        <section class="section-content-block section-process">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-center">
                <h3 class="section-heading">Sign Up to be a donor on the platform</h3>
                <p class="section-subheading"></p>
              </div> <!-- end .col-sm-10  -->                    
            </div> <!--  end .row  -->
            
            <div class="row wow fadeInUp">
              <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="process-layout">
                     <form action="includes/register.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control sty1" name="surname" placeholder="Surname ">
                                    <p>Please type in Surname</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control sty1" name="first" placeholder="First Name">
                                    <p>Please type in First Name</p>

                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="password" name="pass" class="form-control sty1" placeholder="password">
                                    <p>Please type in desired password</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="password" name="cpass" class="form-control sty1" placeholder="confirmation of selected password ">
                                    <p>Please type in initial password for confirmation </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="email" name="email" class="form-control sty1" placeholder="Email Address('e.g abc123@yahoo.com')">
                                    <p>Please type in valid E-Mail</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <input type="type" name="phone" class="form-control sty1" placeholder="Phone Number (e.g '08010000000')">
                                    <p>Please type in active phone number</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                  <select name="gender" class="form-control custom-select">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  <p>Please Select Gender</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="form-group has-feedback">
                                      <input type="date" name="dob" class="form-control sty1">
                                    <p>Please choose date of birth</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                  <select name="blood_group" class="form-control custom-select">
                                    <option value="">Select Desire Blood Type</option>
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                  </select>
                                  <p>Please Select Desired Blood Group</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="form-group has-feedback">
                                      <select name="landmark" class="form-control custom-select">
                                        <option value="">Select Closest Landmark </option>
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                      </select>
                                      <p>Please Select Nearest Landmark to your Address</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <input type="text" name="address" class="form-control sty1" placeholder="Home Address">
                                    <p>Please type in home address</p>
                                </div>
                            </div>
                        </div>  
                       <div>
                          <button type="submit" name="signup" class="btn btn-danger btn-block btn-flat">Sign Up</button>
                        </div>
                    </form>
                    <div class="m-t-2">
                        Already have an account? <a href="login.php" class="text-center">Sign In</a>
                    </div>
                </div> <!--  end .process-layout -->
              </div> <!--  end .col-lg-3 -->
            </div> <!--  end .row --> 
          </div> <!--  end .container  -->
        </section> <!--  end .section-process -->

        </footer>

        <!-- END FOOTER  -->


        <!-- Back To Top Button  -->

        <a id="backTop">Back To Top</a>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.backTop.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/waypoints-sticky.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/venobox.min.js"></script>
        <script src="js/custom-scripts.js"></script>
    </body>


<!-- Mirrored from templates.bwlthemes.com/blood_donation/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Oct 2018 16:05:25 GMT -->
</html>