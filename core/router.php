<?php

require "Controllers/EmployeeController.php";
require "Controllers/AjaxController.php";

class Router{

	public static $routes=
	[
		"employees",'',
		'createEmployee',
		'editEmployee',
		'deleteEmployee',
		'updateEmployee',
		'insertEmployee',
	];

	public static function getRoute($route){
		$url = trim($route, '/');
    	$urlSegments = explode('/', $url);
    	//var_dump($urlSegments);die;
		if(in_array($route, self::$routes)){
			return self::getRouteClass($route);
		}elseif(isset($urlSegments[2]) && in_array($urlSegments[2], self::$routes)){
			return self::getRouteClass($urlSegments[2],$urlSegments[1]);
		}elseif(isset($urlSegments[1]) && in_array($urlSegments[0], self::$routes)){
			return self::getRouteClass($urlSegments[1]);
		}else{
			return "404";
		}
	}

	public static function getRouteClass($route ,$id = null){
		if($route == "employees" || $route == ""){
			$employees = new EmployeeController;
			return $employees->showResult($route);
		}else{
			$ajax = new AjaxController;
			switch ($route) {
				case 'createEmployee':
					return $ajax->createEmployee($route);
					break;
				case 'editEmployee':
					return $ajax->editEmployee($route,$id);
					break;
				case 'updateEmployee':
					return $ajax->updateEmployee($route);
					break;
				case 'insertEmployee':
					return $ajax->insertEmployee();
					break;	
				case 'deleteEmployee':
					return $ajax->deleteEmployee($id);
					break;
			}
			
		}
	}
}