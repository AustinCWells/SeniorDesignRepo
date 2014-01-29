<?php
class project {
	public $sponsorName;
	public $phoneNumber;
	public $email;
	public $description;
	public $userNeeds;
	public $budget;
	public $resources;
	public $file;
	
	
	public function __construct() {
	
	}
	
	function submit() {
		$project = new project();
		
		//Collect all the information (minus file upload)
		$project->sponsorName = cleanInput($_POST['sponsorName']);
		$project->phoneNumber = cleanInput($_POST['phoneNumber']);
		$project->email = cleanInput($_POST['email']);
		$project->description = cleanInput($_POST['description']);
		$project->userNeeds = cleanInput($_POST['userNeeds']);
		$project->budget = cleanInput($_POST['budget']);
		$project->resources = cleanInput($_POST['resources']);
		
		//Clean phone number
		$project->phoneNumber = str_replace(array("-","(",")","+"," "),"",$project->phoneNumber);
		
		
		
		//Insert the project into the database
		$query = "INSERT INTO projects(sponsorName,phoneNumber,email,description,userNeeds,budget,resources,filePath) VALUES (:sponsorName,:phoneNumber,:email,:description,:userNeeds,:budget,:resources,:filepath)";
		$query_params = array(
			':sponsorName' => $project->sponsorName,
			':phoneNumber' => $project->phoneNumber,
			':email' => $project->email,
			':description' => $project->description,
			':userNeeds' => $project->userNeeds,
			':budget' => $project->budget,
			':resources' => $project->resources,
			':filepath' => 
		);
		
	}
}
?>