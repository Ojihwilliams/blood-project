<?php
if(isset($_POST['signup'])){
     if (isset($_POST['surname']) && !empty($_POST['surname']) && isset($_POST['first']) && !empty($_POST['first'])  && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['gender']) && !empty($_POST['gender']) && isset($_POST['dob']) && !empty($_POST['dob']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['cpass']) && !empty($_POST['cpass']) && isset($_POST['landmark']) && !empty($_POST['landmark']) && isset($_POST['address']) && !empty($_POST['address']) && isset($_POST['blood_type']) && !empty($_POST['blood_type'])) {

        $surname    = $main->checkInput($_POST['surname']);
        $first      = $main->checkInput($_POST['first']);
        $email      = $main->checkInput($_POST['email']);
        $phone      = $main->checkInput($_POST['phone']);
        $gender     = $main->checkInput($_POST['gender']);
        $dob        = $main->checkInput($_POST['dob']);
        $address    = $main->checkInput($_POST['address']);
        $pass       = $main->checkInput($_POST['pass']);
        $landmark   = $_POST['landmark'];
        $blood_type   = $_POST['blood_type'];
        $cpass      = $_POST['cpass'];

        if (strlen($pass) < 5 && strlen($pass) <=10 ) {
            $error['pass'] = "Password must between 5-10 charcters";
        }
        else if($main->check('user', 'email', $email) === true){
            $error['email'] = "Email already used!";
        }
        
        else if ($pass !== $cpass) {
            $error['cpass'] = "The two passwords do not match";
        }
    
        else{
            $main->create('user', array('email'=>$email, 'password'=>md5($pass), 'role'=>'donor', 'createdOn'=>date('Y-m-d H:i:s')));
            $main->create('donor', array('surname'=>ucfirst($surname), 'first'=>ucfirst($first), 'email'=>$email, 'phone'=>$phone, 'gender'=>$gender, 'DOB'=>$dob, 'address'=>ucfirst($address),  'status'=> 'pending'));
            $prompt['create'] = 'New User Created';
        }

        
    }else {
        $error = "All fields are required";
    }
}else{
    $error = "Please Fill in your details to join";
}

if (isset($prompt['create'])) {
    echo'<h1>'.$prompt['create'].'</h1>';
    
}
?>
