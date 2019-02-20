<?php 
  include "./core/init.php";

include "includes/header.php";?>

<body class="">
<?php include "includes/navbar.php";?>
  <section class="section-content-block section-process">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-center">
                <h3 class="section-heading">Sign In</h3>
                <p class="section-subheading"></p>
              </div> <!-- end .col-sm-10  -->                    
            </div> <!--  end .row  -->
            
            <div class="row wow fadeInUp">
              <div class="col-lg-6 col-lg-offset-3 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="process-layout">
                  <form method="post">
                    <div class="form-group has-feedback">
                      <input type="name" name="name" class="form-control sty1" placeholder="Full Name (e.g 'Bello Adewale Emeka')">
                      <em>Please type in Full Name </em>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="email" name="email" class="form-control sty1" placeholder="Email Address('e.g abc123@yahoo.com')">
                      <p>Please type in valid E-Mail</p>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="phone" name="phone" class="form-control sty1" placeholder="Phone Number (e.g '08010000000')">
                      <p>Please type in active phone number</p>
                    </div>
                    <div class="form-group has-feedback">
                      <select class="form-control custom-select">
                        <option value="">Select Desire Blood Type</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                      </select>
                      <p>Please Select Desired Blood Group</p>

                    </div>
                    <div class="form-group has-feedback">
                      <select class="form-control custom-select">
                        <option value="">Select Closest Hospital </option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                      </select>
                      <p>Please Select Nearest Hospital</p>

                    </div>

                    <div class="form-group has-feedback">
                      <input type="password" name="pass" class="form-control sty1" placeholder="Password">
                    </div>
                    <div>
                      <button type="submit" name="login" class="btn btn-danger btn-block btn-flat">Submit</button>
                    </div>
                  </form>
                </div> <!--  end .process-layout -->
              </div> <!--  end .col-lg-3 -->
            </div> <!--  end .row --> 
          </div> <!--  end .container  -->
  </section> <!--  end .section-process -->



<?php include "includes/footer.php";?>