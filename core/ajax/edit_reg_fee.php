<?php include '../init.php';
if (isset($_POST['ID'])) {
  $ID = $_POST['ID'];
  $display = $admin->DisplayOne('reg_fee', NULL, array('reg_fee_id'=>$ID)); 
  

echo'<form class="reg_fee_form" method="post"> 
        <div class="row">
         <div class="col-lg-12">
          <h4>Please fill in the information below</h4>
          

            <fieldset class="form-group">
              <label>Member Name</label>
                <select name="memberId" class="form-control custom-select">';
                    $memList = $admin->ListMembers();
                      foreach ($memList as $value) {
                        if ($display->member_id == $value->mem_id) {
                            echo'<option selected="selected" value="'.$value->mem_id.'">'.$value->surname.' '.$value->first.' '.$value->other.'</option>';
                        }else{
                            echo'<option value="'.$value->mem_id.'">'.$value->surname.' '.$value->first.' '.$value->other.'</option>';
                        }
                      }
              
            echo'</select>
              </fieldset>
            </div>
          </div>
               
                <div class="row">
                  <div class="col-lg-6">
                      <fieldset class="form-group">
                        <label>Amount</label>
                        <input id="data-id" data-id="'.$ID.'" name="amt" value="'.$display->amount.'"  placeholder="Enter Registration Amount" class="form-control" id="basicInput" type="text">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset class="form-group">
                        <label>Payment Date</label>
                        <input name="date" value="'.$display->payment_date.'" class="form-control" id="basicInput" type="date">
                      </fieldset>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                      <fieldset class="form-group">
                        <label>Note</label>
                        <textarea name="note" placeholder="Type brief Note" class="form-control" > '.$display->note.'</textarea>
                       
                      </fieldset>
                    </div>
                </div>';

        }

  if (isset($_POST['Reg_id']) && isset($_POST['PAR'])) {
      $Reg_id = $_POST['Reg_id'];
      $arr = array();
     parse_str($_POST['PAR'], $arr);
    $main->updateB('reg_fee', 'reg_fee_id', $Reg_id, array('member_id'=> $arr['memberId'], 'amount'=> $arr['amt'], 'note'=> $arr['note'], 'payment_date'=>$arr['date']));

}

?>