<?php include '../init.php';
if (isset($_POST['ID'])) {
  $ID = $_POST['ID'];
  $display = $admin->DisplayOne('investment_type', NULL, array('investment_id'=>$ID));
  echo '<form method="post"> 
               <div class="col-lg-12">
                  <fieldset class="form-group">
                    <label>Name</label>
                    <input name="name" data-id="'.$ID.'" value="'.$display->investment_name.'"  class="invest_body form-control" id="basicInput" type="text">
                  </fieldset>
                </div>';
}


 
 if (isset($_POST['ID1']) && !empty($_POST['ID1']) && isset($_POST['PAR'])) {
    $ID2 = $_POST['ID1'];
    $PAR = $_POST['PAR'];

    $main->updateB('investment_type', 'investment_id', $ID2, array('investment_name'=>ucfirst($PAR)));
 }