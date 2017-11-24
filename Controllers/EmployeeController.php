<?php
	require "Model/employee.php";
	require "core/view.php";

class EmployeeController{

	public function showResult($route){
		
		$model = new Employee;
		$data = $model->getEmployees($route);

		if($route == ""){
			$route = "employees";
		}
		echo new View("Views/".$route.".php", array("data" => $data));
	}
}