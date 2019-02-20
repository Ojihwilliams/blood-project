<?php include '../init.php';
if (isset($_POST['ID']) && isset($_POST['User'])) {
  $ID = $_POST['ID'];
  $User = $_POST['User'];
  $display = $admin->DisplayOne('property', NULL, array('property_id'=>$ID)); 
  
        echo'<form id="property_form" enctype="multipart/form-data" method="post">
                <h4>Update Desired Information(s)</h4>
                <p class="text-danger">Ensure all input fields contain information</p>
                <div class="row">
                 <div class="col-lg-6">
                    <fieldset class="form-group">
                      <label>Name</label>
                        <input id="data-name" data-user="'.$User.'" data-id="'.$ID.'" name="name" value="'.$display->name.'" placeholder="Enter Property Name" class="form-control" id="basicInput" type="text">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                      <fieldset class="form-group">
                        <label>Quantity</label>
                        <input name="qty" value="'.$display->qty.'" placeholder="Available Quantity" class="form-control" id="basicInput" type="text">
                      </fieldset>
                    </div>
                </div>
               
                <div class="row">
                  <div class="col-lg-6">
                      <fieldset class="form-group">
                        <label>Unit Cost</label>
                        <input name="cost" value="'.$display->cost.'" placeholder="Enter Unit Cost" class="form-control" id="basicInput" type="text">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset class="form-group">
                        <label>Unit Price</label>
                        <input name="price" value="'.$display->price.'" placeholder="Enter Unit Price" class="form-control" id="basicInput" type="text">
                      </fieldset>
                    </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-12">
                      <fieldset class="form-group">
                        <label>Property Information</label>
                        <textarea name="info" placeholder="Give a brief description about Property" class="form-control" >'.$display->info.'</textarea>
                       
                      </fieldset>
                    </div>
                </div>
                          ';
}

if (isset($_POST['property_id']) && isset($_POST['PAR'])) {
  $propertyID = $_POST['property_id'];
  $userID = $_POST['user_id'];
   
  
   $arr = array();
   parse_str($_POST['PAR'], $arr);
   
  $main->updateB('property', 'property_id', $propertyID, array('qty'=>$arr['qty'], 'info'=>$arr['info'], 'cost'=>$arr['cost'], 'price'=>$arr['price'],  'modifiedBy'=>$userID, 'name'=>ucfirst($arr['name'])));

}
   ?>             
           