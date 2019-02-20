<?php	
	include '../init.php';
	if (isset($_GET['page']) && $_GET['page'] ==='profile') {
    	$id = 'Mb-'.rand(100000, 900000);

    	if ($admin->checkMemberId($id) === true) {
    		$id = 'Mb-'.rand(100000, 900000);
     		
     	}else{
     		echo '<div class="col-md-6">
                    <div class="form-group has-feedback">
                      <label class="control-label">Member ID</label>
                      <input class="form-control" name="other" value="$id" type="text">
                      <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                  </div>';
     	}
    } 
	if (isset($_POST['param2'])) {

		$session 	= $_POST['param2'];
		$a = substr($session, 2,2 );
		$num = 'SN'.$a.'%';

		$reg = $admin->student($num);

		if ($reg === '') {
			$reg1 = 'SN'.$a.'0001';
		}else{
			$b = $reg->username;
			$an = substr($b, 4,4);
			
				$reg = $an + 1;
				$reg1 = 'SN'.$a.$reg;
			}

			
				
		echo '<div class="col-lg-6">
                	<div class="form-group">
                        <label>Student Number</label>
                        <input type="text" class="form-control" id="other" name="st_no" minlength="8" maxlength="8" value="'.$reg1.'" >
						                               
					</div>
                </div>';
				
	}	
