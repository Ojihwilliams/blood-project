<?php


class Main 
{
    /**
     * summary
     */
    protected $pdo;
    protected $column;
	protected $table;
	protected $where;
	protected $a = array();
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}

	public function check($table, $col, $par){
		$stmt = $this->pdo->prepare("SELECT $col FROM $table WHERE $col = :par");
		if (is_string($par)) {
			$stmt->bindParam(':par', $par, PDO::PARAM_STR);
		}else{
			$stmt->bindParam(':par', $par, PDO::PARAM_INT);

		}
		$stmt->execute();
		$user  = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();

		if($count > 0){
				return true ;
			}else{
				return false;
			}

	}

	public function create($table, $fields = array()){
		$columns = implode(',', array_keys($fields));
		$values = ':'.implode(', :', array_keys($fields));
		$sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $data) {
				$stmt->bindValue(':'.$key, $data);
			}
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}

	
	public function login($user, $pass){
		$stmt = $this->pdo->prepare("SELECT role FROM user WHERE email = :user AND password = :pass");
		$stmt->bindParam(':user', 	$user,  	PDO::PARAM_STR);
		$stmt->bindParam(':pass', 	$pass, PDO::PARAM_STR);
		$stmt->execute();
		$user1	= $stmt->fetch(PDO::FETCH_OBJ);
		$count 	= $stmt->rowCount();
		
		if ($count > 0 ){
			if($user1->role === 'seeker') {
	 			$stmt = $this->pdo->prepare("SELECT * FROM seeker WHERE email = :user");
				$stmt->bindParam(':user', 	$user,  	PDO::PARAM_STR);
				$stmt->execute();
				$seeker	= $stmt->fetch(PDO::FETCH_OBJ);
				$_SESSION['id'] = $seeker->id;
				header('Location:'.BASE_URL.'seeker/');
 		}else if($user1->role === 'donor') {
 			$stmt = $this->pdo->prepare("SELECT * FROM donor WHERE email = :user");
			$stmt->bindParam(':user', 	$user,  	PDO::PARAM_STR);
			$stmt->execute();
			$donor	= $stmt->fetch(PDO::FETCH_OBJ);
			
			$_SESSION['id'] = $donor->id;
 			header('Location:'.BASE_URL.'donor/');

 		}
 	}else {
			return false;
 	 	}   
	}


	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location: '.BASE_URL.'index.php');
	}
	public function loggedIn(){
		return (isset($_SESSION['username'])) ? true : false;
	}

	public function userData($table, $col, $par){
		$stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $col = :par");
		if (is_string($par)) {
			$stmt->bindParam(':par', $par, PDO::PARAM_STR);
		}else{
			$stmt->bindParam(':par', $par, PDO::PARAM_INT);

		}
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}


	public function countRow($table, $where = NULL){
		if ($where != NULL) {
			if (!empty($where)) {
			
				foreach ($where as $key => $value) {
		 			$a[] = $key. "=" .$value;
				}
				$where = "WHERE " . implode(" AND ", $a);
			}else {
				$where = "";
			}
		}

    	$stmt = $this->pdo->prepare("SELECT * FROM $table $where ");
    	$stmt->execute();
		

		return $stmt->rowCount();

    }

    public function uploadImage($file){
        $filename = basename($file['name']);
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $error = $file['error'];

        $ext = explode('.', $filename);
        $ext = strtolower(end($ext));
        $allowed_ext = array('jpg', 'png', 'jpeg');

        if (in_array($ext, $allowed_ext) === true) {
            if ($error === 0) {
                if ($fileSize <= 209272152) {
                    $fileRoot = '../images/' . $filename;
                    move_uploaded_file($fileTmp, $fileRoot);
                    return $fileRoot;
                }else{
                  $GLOBALS['imageError'] = "The file size is to large";

                }
            }
        }else {
            $GLOBALS['imageError'] = "The Extension is not allowed";
        }
    }

    public function update($table, $username,  $fields = array()){
        $columns = '';
        $i      = 1;

        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
            $sql = "UPDATE {$table} SET {$columns} WHERE username = '$username'";
            if ($stmt = $this->pdo->prepare($sql)) {
                foreach ($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
            $stmt->execute();
            }
        }

    public function updateA($table, $no,  $fields = array()){
        $columns = '';
        $i      = 1;
       
        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
            $sql = "UPDATE {$table} SET {$columns} WHERE mem_id = '$no'";
            if ($stmt = $this->pdo->prepare($sql)) {
                foreach ($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
            $stmt->execute();
            }
        }

  
         public function updateB($table, $col, $no,  $fields = array()){
        $columns = '';
        $i      = 1;
       
        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
            $sql = "UPDATE {$table} SET {$columns} WHERE $col = '$no'";
            if ($stmt = $this->pdo->prepare($sql)) {
                foreach ($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
            $stmt->execute();
            }
        }
        public function updateC($table, $whereColumn, $whereValue,  $fields = array()){
        $columns = '';
        $i      = 1;
       
        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
            $sql = "UPDATE {$table} SET {$columns} WHERE $whereColumn = $whereValue";
            if ($stmt = $this->pdo->prepare($sql)) {
                foreach ($fields as $key => $value) {
                	if (is_int($value)){
                		$param = PDO::PARAM_INT;
                	} else if (is_string($value)) {
                		$param = PDO::PARAM_STR;
                	}
                	else{
                	 $param = FALSE;
                	}
                	if($param) $stmt->bindValue(":$key", $value, $param);
                }
           $stmt->execute();

            }

        }


    public function DisplayOne($table, $column = NULL, $where = NULL){
		if ($where != NULL) {
			if (!empty($where)) {
			
				foreach ($where as $key => $value) {
		 			$a[] = $key. " = " .$value;
				}
				$where = "WHERE " . implode(" AND ", $a);
			}else {
				$where = "";
			}
		}
		
		if ($column != NULL) {
			if (is_array($column)){
				$column = implode(", ", $column);
			}else{
				$column = $column;

			}
		}else{
			$column = "*";
		}
		
		
		$stmt = $this->pdo->prepare("SELECT $column FROM $table $where");
    	$stmt->execute();
    	return $stmt->fetch(PDO::FETCH_OBJ);

	}

  public function DisplayAll($table, $column = NULL, $where = NULL){
		if ($where != NULL) {
			if (!empty($where)) {
			
				foreach ($where as $key => $value) {
		 			$a[] = $key. " =  " .$value;
				}
				$where = "WHERE " . implode(" AND ", $a);
			}else {
				$where = "";
			}
		}
		
		if ($column != NULL) {
			if (is_array($column)){
				$column = implode(", ", $column);
			}else{
				$column = $column;

			}
		}else{
			$column = "*";
		}
		
		
		$stmt = $this->pdo->prepare("SELECT $column FROM $table $where ");
    	$stmt->execute();
    	return $stmt->fetchALL(PDO::FETCH_OBJ);

	}
   
   public function DisplayWithOrdering($table, $column = NULL, $orderedColumn = NULL, $limit = NULL){
		if ($column != NULL) {
			if (is_array($column)){
				$column = implode(", ", $column);
			}else{
				$column = $column;

			}
		}else{
			$column = "*";
		}

		if ($orderedColumn != NULL) {
			
			if (is_array($orderedColumn)) {
				$orderedColumn = implode(", ", $orderedColumn);
				if($limit != NULL) {
					$order = "ORDER BY $orderedColumn DESC LIMIT $limit";
				}else{
					$order = $orderedColumn;
				}
			}else{
				if ($orderedColumn != NULL) {
					if($limit != NULL) {
						$order = "ORDER BY $orderedColumn DESC LIMIT $limit";
					}else{
						$order = $orderedColumn;
					}
				}
			}
		}else {
			$order = '';
		}
    	$stmt = $this->pdo->prepare("SELECT $column FROM $table $order");
    	$stmt->execute();
    	return $stmt->fetch(PDO::FETCH_OBJ);

	}

	public function DisplayDistinct($table, $column,  $where = NULL){
		if ($where != NULL) {
			if (!empty($where)) {
			
				foreach ($where as $key => $value) {
		 			$a[] = $key. "=" .$value;
				}
				$where = "WHERE " . implode(" AND ", $a);
			}else {
				$where = "";
			}
		}
		$stmt = $this->pdo->prepare("SELECT DISTINCT $column FROM $table $where");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	} 


	

	public function checkVariable1($table, $column = NULL, $conditions = NULL){
		if ($column != NULL) {

			if (is_array($column)){
				$columnA = implode(", ", $column);
			}else{
				$columnA= $column;

			}
		}else {
			$columnA = "*";
		}

		if ($conditions != NULL) {
			$columns 	= '';
        	$i      	= 1;
        	$net = '';

			foreach ($conditions as $key => $value) {
	  			$columns .= "{$key} = {$value}";
		            if ($i < count($conditions)) {
		                $columns .= ' AND ';
		            }
		            $i++;	
			}

			$net = "WHERE ". $columns;
		}
		
		$stmt = $this->pdo->prepare("SELECT $columnA FROM $table $net");
				
		 		$stmt->execute();
		 		$count = $stmt->rowCount();

				if($count > 0){
					return true;
				}else{
					return false;
				}
		}

	public function deleteEntry($table, $column, $id){
		$stmt = $this->pdo->prepare("DELETE FROM $table WHERE $column = $id");
		$stmt->execute();


	}
	//EDIT_PARENT PAGE
	public function EditUserTable($username){
		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = $username");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	}
?>