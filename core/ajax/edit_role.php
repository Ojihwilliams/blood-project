<?php include '../init.php';
if (isset($_POST['ID'])) {
  $ID = $_POST['ID'];
  $display = $admin->DisplayOne('roles', NULL, array('role_id'=>$ID));
  echo  '<form class="role_form" method="post"> 
			<div class="col-lg-12">
				<h4>Please fill in the information below</h4>
				  <fieldset class="form-group">
				    <label>Role</label>
				    <input id="role_name" name="role" data-id="'.$ID.'" value="'.$display->role_name.'" class="form-control" id="basicInput" type="text">
				  </fieldset>
		    </div>';
}

 if (isset($_POST['role_id']) && !empty($_POST['role_id']) && isset($_POST['PAR'])) {
   echo $ID2 = $_POST['role_id'];
   echo $PAR = $_POST['PAR'];

   $main->updateB('roles', 'role_id', $ID2, array('role_name'=>ucfirst($PAR), 'last_update'=>date('Y-m-d H:i:s'), 'createdBy'=>$userDetails->staff_id));
 }
 