<?php
require "db.php";
require "Views/employees.php";

class Employee{
	private $connection;

	public function getEmployees($route){
		$this->connection = new Db();

		$sth = $this->connection->connection->prepare("SELECT * FROM `employees`");
		$sth->execute();

		if ($sth->rowCount() > 0){
		    $check = $sth->fetchAll(PDO::FETCH_ASSOC);
		}else{
			return $this->insertData();
		}

	    if($route == ""){
	    	$route = "employees";
	    }
	    return $check;
	}

	public function insertData(){
		$myfile = fopen("employees.json", "r") or die("Unable to open file!");
		$context = fread($myfile,filesize("employees.json"));
		fclose($myfile);

		for ($i = 0; $i <= 31; ++$i) { 
		    $context = str_replace(chr($i), "", $context); 
		}

		$context = str_replace(chr(127), "", $context);

		if (0 === strpos(bin2hex($context), 'efbbbf')) {
		   $context = substr($context, 3);
		}

		$context = json_decode( $context );
		
		foreach ($context as $key => $output ) {
			$phones = json_encode($output->phones);
			$addresses = json_encode($output->addresses);
			$stmt = $this->connection->connection->prepare("INSERT INTO employees (firstName,lastName,age,country,bankAccountNumber,creditCardNumber,phone_id,address_id,email,city) 
			    VALUES (:firstName, :lastName, :age , :country, :bankAccountNumber,:creditCardNumber,:phone_id,:address_id,:email,:city)");
			    $stmt->bindParam(':firstName', $output->firstName);
			    $stmt->bindParam(':lastName', $output->lastName);
			    $stmt->bindParam(':age', $output->age);
			    $stmt->bindParam(':country', $output->country);
			    $stmt->bindParam(':bankAccountNumber', $output->bankAccountNumber);
			    $stmt->bindParam(':creditCardNumber', $output->creditCardNumber);
			    $stmt->bindParam(':phone_id', $phones);
			    $stmt->bindParam(':address_id',$addresses);
			    $stmt->bindParam(':email', $output->email);
			    $stmt->bindParam(':city', $output->city);
			    $stmt->execute();
		}
	}

}