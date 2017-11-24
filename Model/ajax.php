<?php
session_start();

class Ajax{

	private $connection;

	public function __construct(){
		$this->connection = new Db();
	}

	public function getEmployeeById($id){
		$sth = $this->connection->connection->prepare("SELECT * FROM `employees` WHERE id =".$id);
		$sth->execute();

		if ($sth->rowCount() > 0){
		    $check = $sth->fetch(PDO::FETCH_ASSOC);
		}else{
			$check = null;
		}

	    return $check;
	}

	public function deleteEmployee($id){
		$sth = $this->connection->connection->prepare("DELETE FROM `employees` WHERE id =".$id);
		$sth->execute();

		if($sth->execute()){
			return true;
		}

		return false;
	}

	public function updateEmployee($id){
		$address = [ $_POST['address_id_0'],$_POST['address_id_1'] ];
		$address = implode('","', $address);
		$address = '"'.$address.'"';
		$address = '['.$address.']';
		$phone = [ $_POST['phone_id_0'],$_POST['phone_id_1'],$_POST['phone_id_2'] ];
		$phone = implode('","', $phone);
		$phone = '"'.$phone.'"';
		$phone = '['.$phone.']';

		$sql = "UPDATE employees SET firstName = :firstName, 
        lastName = :lastName, 
        age = :age,  
        country = :country,  
        bankAccountNumber = :bankAccountNumber,
        creditCardNumber = :creditCardNumber, 
        phone_id = :phone_id,  
        address_id = :address_id,  
        email = :email,
        city = :city
        WHERE id = :id";

		$stmt = $this->connection->connection->prepare($sql);                                  
		$stmt->bindParam(':firstName', $_POST['firstName'], PDO::PARAM_STR);       
		$stmt->bindParam(':lastName', $_POST['lastName'], PDO::PARAM_STR);    
		$stmt->bindParam(':age', $_POST['age'], PDO::PARAM_STR);
		$stmt->bindParam(':country', $_POST['country'], PDO::PARAM_STR); 
		$stmt->bindParam(':bankAccountNumber', $_POST['bankAccountNumber'], PDO::PARAM_STR);   
		$stmt->bindParam(':creditCardNumber', $_POST['creditCardNumber'], PDO::PARAM_INT);
		$stmt->bindParam(':phone_id', $phone, PDO::PARAM_STR); 
		$stmt->bindParam(':address_id',$address, PDO::PARAM_STR);   
		$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_INT);
		$stmt->bindParam(':city', $_POST['city'], PDO::PARAM_INT);  
		$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
		$stmt->execute();

		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function updateEmploye($data){
		$sth = $this->connection->connection->prepare("UPDATE * FROM `employees` WHERE id =".$id);
		$sth->execute();

		if($sth->execute()){
			return true;
		}
		return false;
	}

	public function createEmployee(){
		$address = [ $_POST['address_id_0'],$_POST['address_id_1'] ];
		$address = implode('","', $address);
		$address = '"'.$address.'"';
		$address = '['.$address.']';
		$phone = [ $_POST['phone_id_0'],$_POST['phone_id_1'],$_POST['phone_id_2'] ];
		$phone = implode('","', $phone);
		$phone = '"'.$phone.'"';
		$phone = '['.$phone.']';

		$stmt = $this->connection->connection->prepare("INSERT INTO employees (firstName,lastName,age,country,bankAccountNumber,creditCardNumber,phone_id,address_id,email,city) 
	    VALUES (:firstName, :lastName, :age , :country, :bankAccountNumber,:creditCardNumber,:phone_id,:address_id,:email,:city)");
	    $stmt->bindParam(':firstName', $_POST['firstName']);
	    $stmt->bindParam(':lastName', $_POST['lastName']);
	    $stmt->bindParam(':age', $_POST['age']);
	    $stmt->bindParam(':country', $_POST['country']);
	    $stmt->bindParam(':bankAccountNumber', $_POST['bankAccountNumber']);
	    $stmt->bindParam(':creditCardNumber', $_POST['creditCardNumber']);
	    $stmt->bindParam(':phone_id', $phone);
	    $stmt->bindParam(':address_id',$address);
	    $stmt->bindParam(':email', $_POST['email']);
	    $stmt->bindParam(':city', $_POST['city']);
	    
	    if($stmt->execute()){
			return true;
		}
		return false;
	}
}