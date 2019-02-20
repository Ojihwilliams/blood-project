<?php include '../init.php';
if (isset($_POST['ID'])) {
  $ID = $_POST['ID'];
  $display = $admin->DisplayOne('loan_type', NULL, array('loan_id'=>$ID)); 
            
        echo'
                 <form class="loan_form" method="post"> 
                       <div class="col-lg-12">
                          <fieldset class="form-group">
                            <label>Name</label>
                            <input id="data-name" name="name" data-id="'.$ID.'" value="'.$display->loan_name.'" class="form-control" id="basicInput" type="text">
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset class="form-group">
                            <label>Rate</label>
                            <input name="rate" value="'.$display->rate.'" placeholder="e.g 4%" class="form-control" id="basicInput" type="text">
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset class="form-group">
                            <label>min month(s)</label>
                              <select name="min" class="form-control">';
                          for($i = 1; $i <= 12; $i++){
                              if ($i == $display->min_month) {
                                  echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
                              }else {
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                
                              }
                            }
                             
                            echo'  </select>
                          </fieldset>
                          </div>
                          <div class="col-lg-12">
                          <fieldset class="form-group">
                            <label>max month(s)</label>
                              <select name="max" class="form-control">';
                           for($i = 1; $i <= 12; $i++){
                            if ($i == $display->max_month) {
                                  echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
                                 
                                  
                              }else {
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                
                              }
                            }
                             
                            echo'  </select>
                          </fieldset>
                          </div>
                          <div class="col-lg-12">
                          <fieldset class="form-group">
                            <label>Guarantor(s) month(s)</label>
                              <select name="guarantor" class="form-control">';
                                if ($display->max_month === "yes") {
                                echo'  <option selected = "selected" value="yes">With Guarantor</option>
                                  <option value="no">No Guarantor</option>';
                                }else{
                                 echo' <option value="yes">With Guarantor</option>
                                  <option selected = "selected"  value="no">No Guarantor</option>';
                                }
                              echo'</select>
                          </fieldset>
                          </div>
                          ';
}

if (isset($_POST['Loanid']) && isset($_POST['PAR'])) {
   $loanID = $_POST['Loanid'];
  
   $arr = array();
   parse_str($_POST['PAR'], $arr);
  $main->updateB('loan_type', 'loan_id', $loanID, array('loan_name'=> ucfirst($arr['name']), 'rate'=> $arr['rate'], 'min_month'=> $arr['min'], 'max_month'=> $arr['max'], 'guarantor'=> $arr['guarantor'], 'modified_date'=>date('Y-m-d H:i:s')));

}
   ?>             
           