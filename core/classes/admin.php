<?php

/**
 * 
 */
class Admin extends Main
{
    /**
     * @param string $class hello
     */
    
   public function checkMemberId($id){
		$stmt = $this->pdo->prepare("SELECT memb_id FROM member WHERE memb_id = :id");
		$stmt->bindParam(':id', 	$id,  	PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
				return true ;
			}else{
				return false;
			}

	}

	public function ListMembers(){
		$stmt = $this->pdo->prepare("SELECT * FROM member LEFT JOIN bank_details ON member.mem_id = bank_details.member_id LEFT JOIN banks ON bank_details.bank_name = banks.id LEFT JOIN roles ON member.role = roles.role_id LEFT JOIN reg_fee ON member.mem_id = reg_fee.member_id ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}
	 public function MemID($mem){
		$stmt = $this->pdo->prepare("SELECT mem_id FROM member WHERE member_id = :mem");
		$stmt->bindParam(':mem', 	$mem,  	PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	 }

	 public function DeleteItem($table, $col, $id){
		$stmt = $this->pdo->prepare("DELETE FROM $table WHERE $col = :id");
		$stmt->bindParam(':id', 	$id,  	PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	 }

	 public function DisplayAllContribution(){
		$stmt = $this->pdo->prepare("SELECT * FROM contribution INNER JOIN member ON contribution.member_id = member.mem_id LEFT JOIN bank_details ON member.mem_id = bank_details.member_id");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }

	 public function DispContUser($id){
		$stmt = $this->pdo->prepare("SELECT * FROM contribution INNER JOIN member ON contribution.member_id = member.mem_id LEFT JOIN bank_details ON member.mem_id = bank_details.member_id WHERE member.mem_id = :id" );
		$stmt->bindParam(':id', 	$id,  	PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }

	 public function DisplayAdmin(){
	 	$stmt = $this->pdo->prepare("SELECT * FROM member WHERE role != '3' "); 
	 	$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	 }

	 public function DisplayBankDetails($id){
	 	$stmt = $this->pdo->prepare("SELECT * FROM bank_details INNER JOIN banks ON bank_details.bank_name = banks.id WHERE member_id = :id"); 
		$stmt->bindParam(':id', 	$id,  	PDO::PARAM_INT);
	 	$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	 }
	 
	public function checkEntity($col){
		$stmt = $this->pdo->prepare("SELECT col FROM classes WHERE col = :col");
		$stmt->bindParam(':col', 	$col,  	PDO::PARAM_STR);
		$stmt->execute();
		$user  = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();

		if($count > 0){
				return true ;
			}else{
				return false;
			}

	}

	public function checkClass($class){
		$stmt = $this->pdo->prepare("SELECT class FROM classes WHERE class = :class");
		$stmt->bindParam(':class', 	$class,  	PDO::PARAM_STR);
		$stmt->execute();
		$user  = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();

		if($count > 0){
				return true ;
			}else{
				return false;
			}

	}
	public function checkItem($item){
		$stmt = $this->pdo->prepare("SELECT item FROM payment_items WHERE item = :item");
		$stmt->bindParam(':item', 	$item,  	PDO::PARAM_STR);
		$stmt->execute();
		$user  = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();

		if($count > 0){
				return true ;
			}else{
				return false;
			}

	}
	public function checkSubject($subject){
		$stmt = $this->pdo->prepare("SELECT name FROM subjects WHERE name = :subject");
		$stmt->bindParam(':subject', $subject,  	PDO::PARAM_STR);
		$stmt->execute();
		$user  = $stmt->fetch(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();

		if($count > 0){
				return true ;
			}else{
				return false;
			}

	}

	public function displaySubject($id){
		$stmt = $this->pdo->prepare("SELECT name FROM subjects WHERE subject_id = :id");
		$stmt->bindParam(':id', $id,  	PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
		
	}

	public function update1($table, $username, $fields = array()){
        $columns = '';
        $i      = 1;

        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
            $sql = "UPDATE {$table} SET {$columns} WHERE admin_id = '$username'";
            if ($stmt = $this->pdo->prepare($sql)) {
                foreach ($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
            $stmt->execute();
            }
        }

    public function updateSubject($table, $subject, $fields = array()){
        $columns = '';
        $i      = 1;

        foreach ($fields as $name => $value) {
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }
            $sql = "UPDATE {$table} SET {$columns} WHERE name = '$subject'";
            if ($stmt = $this->pdo->prepare($sql)) {
                foreach ($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
            $stmt->execute();
            }
        }

	 public function session($session_id){
		$stmt = $this->pdo->prepare("SELECT * FROM session WHERE session_id =:session_id");
		$stmt->bindParam(":session_id", $session_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function student($num){
		$stmt = $this->pdo->prepare("SELECT * FROM student WHERE username LIKE :num ORDER BY username DESC LIMIT 1 ");
		$stmt->bindParam(":num", $num, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {
			return $stmt->fetch(PDO::FETCH_OBJ);
		}else{
			return '';
		}
		
	}

	public function teacher(){
		$stmt = $this->pdo->prepare("SELECT username FROM teacher ORDER BY username DESC LIMIT 1 ");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function guard(){
		$stmt = $this->pdo->prepare("SELECT username FROM guard ORDER BY username DESC LIMIT 1 ");
		$stmt->execute();
		$count = $stmt->rowCount();

		if ($count > 0) {
		return $stmt->fetch(PDO::FETCH_OBJ);
			
    		
		}else{
			return 'PN0001';
			
		}
	}
 
	public function getTeacherForClass($class){
 		$stmt = $this->pdo->prepare("SELECT * FROM teacher WHERE class = :class");
		$stmt->bindParam(":class", $class, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function countStudents($class){
		$a = substr($class, 0,1);
		if ($a == 'J') {
			$form = substr($class, 0, 4);
			$class = substr($class, 4, 1);
						
		}else{
			$form = substr($class, 0, 3);
			$class = substr($class, 3,1);
		}
    	$stmt = $this->pdo->prepare("SELECT * FROM student WHERE form = :form AND class = :class");
    	$stmt->bindParam(":class", $class, PDO::PARAM_STR);
		$stmt->bindParam(":form", $form, PDO::PARAM_STR);

    	$stmt->execute();
		return $stmt->rowCount();

    }

    public function paymentSchema($session, $form, $term){
		$stmt = $this->pdo->prepare("SELECT * FROM feeschema WHERE session = :session AND form = :form AND term = :term");
    	$stmt->bindParam(":session", $session, PDO::PARAM_STR);
    	$stmt->bindParam(":form", $form, PDO::PARAM_STR);
    	$stmt->bindParam(":term", $term, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function displaySession(){
		$stmt = $this->pdo->prepare("SELECT * FROM session LEFT JOIN term_duration ON session.session = term_duration.session ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function getSessionTerm(){
		
		$stmt = $this->pdo->prepare("SELECT * FROM session GROUP BY session, term");
		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	

	public function getDistinctClass($table, $column){

		$stmt = $this->pdo->prepare("SELECT * FROM classes GROUP BY form");
		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	
	public function PaymentSchemaBasedOnForm($session, $form, $term){
		$stmt = $this->pdo->prepare("SELECT session, term, form, payment_items.item, amount FROM feeschema INNER JOIN session ON feeschema.session_term = session.session_id INNER JOIN payment_items ON feeschema.item = payment_items.item_id WHERE session.session = :session AND form = :form AND term = :term");
    	$stmt->bindParam(":session", $session, PDO::PARAM_STR);
    	$stmt->bindParam(":form", $form, PDO::PARAM_STR);
    	$stmt->bindParam(":term", $term, PDO::PARAM_STR);

		$stmt->execute();
		$count = $stmt->rowCount();
		if ($count > 0) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
			
		}else{
			return '<h3 class="text-uppercase text-center text-danger">No Such records Exist</h3>';
			
		}

		
	}
	public function TitleForPaymentSchema($session, $form, $term){
		$stmt = $this->pdo->prepare("SELECT session, term, form FROM feeschema INNER JOIN session ON feeschema.session_term = session.session_id INNER JOIN payment_items ON feeschema.item = payment_items.item_id WHERE session.session = :session AND form = :form AND term = :term LIMIT 1");
    	$stmt->bindParam(":session", $session, PDO::PARAM_STR);
    	$stmt->bindParam(":form", $form, PDO::PARAM_STR);
    	$stmt->bindParam(":term", $term, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
			
		
		
	}

	public function amountSum($session, $form, $term){
		$stmt = $this->pdo->prepare("SELECT SUM(amount) AS AmountSum FROM feeschema INNER JOIN session ON feeschema.session_term = session.session_id INNER JOIN payment_items ON feeschema.item = payment_items.item_id WHERE session.session = :session AND form = :form AND term = :term");
    	$stmt->bindParam(":session", $session, PDO::PARAM_STR);
    	$stmt->bindParam(":form", $form, PDO::PARAM_STR);
    	$stmt->bindParam(":term", $term, PDO::PARAM_STR);

		$stmt->execute();
		$count = $stmt->rowCount();
		if ($count > 0) {
			return $stmt->fetch(PDO::FETCH_OBJ);
			
		}

		
	}

	public function studentList($class_id){
		$stmt = $this->pdo->prepare("SELECT * FROM classes WHERE class_id = :class_id ");
		$stmt->bindParam(":class_id", $class_id, PDO::PARAM_STR);
		$stmt->execute();
		$class = $stmt->fetch(PDO::FETCH_OBJ);

		$class = $class->class;

		$class1 = substr($class, 4, 1);
      	$form = substr($class, 0, 4);

      	$stmt = $this->pdo->prepare("SELECT * FROM student WHERE form = :form AND class = :class1 ");
		$stmt->bindParam(":form", $form, PDO::PARAM_STR);
		$stmt->bindParam(":class1", $class1, PDO::PARAM_STR);

      	$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);


	}

	public function paymentDetails(){
		$stmt = $this->pdo->prepare("SELECT amount, surname, first, middle, classes.class, classes.class_id, feescollection.session FROM feescollection INNER JOIN student ON feescollection.student_id = student.student_id INNER JOIN classes ON student.class = classes.class_id INNER JOIN session ON feescollection.session = session.session_id");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	public function displaySumAmount($session, $form){
		$stmt = $this->pdo->prepare("SELECT SUM(amount) AS Amount FROM feeschema WHERE session_term = $session AND form = $form");
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		if ($result->Amount == NULL) {
			$error = "NO FEES YET";
			return $error;
		}else {
			return $result;
		}
	}

	public function SessionDuration(){
		$stmt = $this->pdo->prepare("SELECT term_duration_id, start, ending, session.session, term.term FROM term_duration INNER JOIN session_term ON term_duration.session_term = session_term.id INNER JOIN session ON session_term.session = session.session_id INNER JOIN term ON session_term.term = term.term_id");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
 
	public function SessionDur($id){
		$stmt = $this->pdo->prepare("SELECT * FROM term_duration INNER JOIN session_term ON term_duration.session_term = session_term.id INNER JOIN session ON session_term.session = session.session_id INNER JOIN term ON session_term.term = term.term_id WHERE term_duration_id = $id");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	} 

//IN CLASS PAGE 
	public function displayForm($form){
		$stmt = $this->pdo->prepare("SELECT DISTINCT(form.form) FROM form INNER JOIN classes on form.form_id = classes.form WHERE form_id = :form");
		$stmt->bindParam(":form", $form, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function displayTeacher($class){
		$stmt = $this->pdo->prepare("SELECT first, surname, middle, classes.class FROM `teacher` LEFT JOIN classes ON teacher.class = classes.class_id WHERE teacher.class = $class");
		$stmt->bindParam(":form", $form, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
// RECORDS PAGE
	public function displayClass(){
		$stmt = $this->pdo->prepare("SELECT * FROM classes ORDER BY class ASC ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function displaysubjects($form){
		$stmt = $this->pdo->prepare("SELECT * FROM subjects WHERE form = :form OR form = 'both' ");
		$stmt->bindParam(":form", $form, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function displaySessionTerm(){
		$stmt = $this->pdo->prepare("SELECT * FROM session_term INNER JOIN term ON session_term.term = term.term_id INNER JOIN session ON session_term.session = session.session_id");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function checkIfScoresExist($column, $session, $subject, $student){
		$stmt = $this->pdo->prepare("SELECT $column, id FROM score WHERE session_term = $session AND subject = $subject AND student = $student");
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
		

	}
	public function displayResult($session, $student){
		$sql =  "SELECT exams, ca1, ca2, student, session_term, name AS subject, exams + ca1 + ca2 AS total FROM score INNER JOIN subjects ON score.subject = subjects.subject_id WHERE session_term = :session  AND student = :student";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(":student", $student, PDO::PARAM_INT);
		$stmt->bindParam(":session", $session, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
		
	}

	public function displayResultInfo($session, $student){
		$sql = "SELECT student.first, surname, middle, (SELECT session.session FROM session_term INNER JOIN session ON session_term.session = session.session_id LIMIT 1) AS sess, (SELECT term.term FROM session_term INNER JOIN term ON session_term.term = term.term_id LIMIT 1) AS term FROM score INNER JOIN student ON score.student = student.student_id INNER JOIN session_term ON score.session_term = session_term.id WHERE session_term = :session  AND student = :student LIMIT 1";
		
		$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(":student", $student, PDO::PARAM_INT);
			$stmt->bindParam(":session", $session, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);

		}
}