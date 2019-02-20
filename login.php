<?php 
  include "./core/init.php";

include "includes/header.php";?>

<body class="">
<?php //Sinclude "includes/navbar.php";

if (isset($_POST['login'])) {
  $pass   =   $_POST['pass'];
  $email  =   $_POST['email'];

  if (!empty($email) && !empty($pass)) {
      
      $email   =  $main->checkInput($email);
      $pass   = $main->checkInput($pass);
      
     
      if ($main->login($email, md5($pass)) === false){

        $error = "The email or password is incorrect";
      }

    }else {
      $error = "Please enter email and password";
     }
  
  
}else{
  $error = "Please enter email and password";

}
?>
<div class="col-lg-4 col-lg-offset-4">
  <div class="login-box">
    <h3 class="login-box-msg">Sign In</h3>
     <?php if (isset($error)) {
        echo "<p class='text-danger'>$error</p>";      
    }
    ?>
    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control sty1" placeholder="Email">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control sty1" placeholder="Password">
      </div>
      <div>
        
        <!-- /.col -->
        <div>
          <button type="submit" name="login" class="btn btn-danger btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
   
    <div class="m-t-2">Don't have an account? <a href="signup.php" class="text-center">Sign Up</a></div>
  </div>
  <!-- /.login-box-body --> 
</div>
