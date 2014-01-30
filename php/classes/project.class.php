<?php
class project {
	public $sponsorName;
	public $phoneNumber;
	public $email;
	public $description;
	public $userNeeds;
	public $budget;
	public $resources;
	public $files;
	private $uploaddir;
	
	public function __construct() {
	
	}
	
	static function submit() {
		$project = new project();
		
		//Collect all the information (minus file upload)
		$project->sponsorName = $_POST['sponsorName'];
		$project->phoneNumber = $_POST['phoneNumber'];
		$project->email = $_POST['email'];
		$project->description = $_POST['description'];
		$project->userNeeds = $_POST['userNeeds'];
		$project->budget = $_POST['budget'];
		$project->resources = $_POST['resources'];
		$project->uploaddir = getcwd().'/uploads/projects/';
		
		//Clean phone number
		$project->phoneNumber = str_replace(array("-","(",")","+"," "),"",$project->phoneNumber);
		
		//Validate email
		if(!filter_var($project->email,FILTER_VALIDATE_EMAIL)) {
			die("Invalid e-mail!");
		}
		
		//Insert the project into the database
		$query = "INSERT INTO projects(sponsorName,phoneNumber,email,description,userNeeds,budget,resources) VALUES (:sponsorName,:phoneNumber,:email,:description,:userNeeds,:budget,:resources);";
		$query_params = array(
			':sponsorName' => $project->sponsorName,
			':phoneNumber' => $project->phoneNumber,
			':email' => $project->email,
			':description' => $project->description,
			':userNeeds' => $project->userNeeds,
			':budget' => $project->budget,
			':resources' => $project->resources
		);
		$result = $GLOBALS['MySQL']->query($query,$query_params);
		
		//Need project ID for upload directory
		$lastinsert = $GLOBALS['MySQL']->c->lastInsertId();
		
		//Check to see if directory exists. If not, create it.
		if(!is_dir($project->uploaddir.$lastinsert)) {
			mkdir($project->uploaddir.$lastinsert);
		}
		
		//Move files into project directory and 
		foreach($_FILES['files']['error'] as $key => $error) {
			if($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES['files']['tmp_name'][$key];
				$name = $_FILES['files']['name'][$key];
				move_uploaded_file($tmp_name,$project->uploaddir.$lastinsert."/$name");
			}
		}
		
		//header("Location: projects.php");
		//die("Redirecting to projects.php");
	}
}
?>