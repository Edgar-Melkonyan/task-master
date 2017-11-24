<?php
require "Model/ajax.php";

class AjaxController{

	private $ajax;

	public function __construct(){
		$this->ajax = new Ajax();
	}

	public function editEmployee($route,$id){
		$employee = $this->ajax->getEmployeeById($id);

		if(null != $employee){
			echo new View("Views/".$route.".php", array("data" => $employee));
		}else{
			echo new View("Views/404.html");
		}

	}

	public function updateEmployee($route){

		if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['age']) || empty($_POST['country']) || empty($_POST['bankAccountNumber']) || empty($_POST['creditCardNumber']) || empty($_POST['phone_id_0']) || empty($_POST['phone_id_1']) || empty($_POST['phone_id_2']) || empty($_POST['address_id_0']) || empty($_POST['address_id_1'])  || empty($_POST['email']) || empty($_POST['city'])){
			echo "<span style = 'margin-left:20px;color:red' class='error_span'>All Fields Are Required</span>";
			$_POST = [];
		}else{
			$new_data = $this->ajax->updateEmployee($_POST['id']);
			return $new_data;
		}
	}

	public function deleteEmployee($id){
		$employee = $this->ajax->deleteEmployee($id);

		if($employee){
			if(isset($_SERVER['HTTP_REFERER'])){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				header('Location: ' . "/");
			}
		}
	}

	public function createEmployee($route){
		if($route !== null){
			echo new View("Views/".$route.".php");
		}
	}

	public function insertEmployee(){
		if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['age']) || empty($_POST['country']) || empty($_POST['bankAccountNumber']) || empty($_POST['creditCardNumber']) || empty($_POST['phone_id_0']) || empty($_POST['phone_id_1']) || empty($_POST['phone_id_2']) || empty($_POST['address_id_0']) || empty($_POST['address_id_1'])  || empty($_POST['email']) || empty($_POST['city'])){
			echo "<span style = 'margin-left:20px;color:red' class='error_span'>All Fields Are Required</span>";
			$_POST = [];
		}else{
			$employee = $this->ajax->createEmployee();
			return $employee;
		}
	}
}