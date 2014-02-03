<?php
class project {
	public $id;
	public $title;
	public $sponsorName;
	public $phoneNumber;
	public $email;
	public $description;
	public $userNeeds;
	public $budget;
	public $resources;
	public $dt;
	public $approval;
	public $files;
	private $uploaddir;
	
	public function __construct() {
	
	}
		
	static function getProject($id) {
		$project = new project();
		
		$query = "SELECT * FROM projects WHERE project_id = :id";
		$query_params = array(
			":id" => $id
		);
		$result = $GLOBALS['MySQL']->query($query,$query_params)->fetch();
		
		//Assign all variables from database
		$project->id = $result['project_id'];
		$project->title = $result['title'];
		$project->sponsorName = $result['sponsorName'];
		$project->phoneNumber = $result['phoneNumber'];
		$project->email = $result['email'];
		$project->description = $result['description'];
		$project->userNeeds = $result['userNeeds'];
		$project->budget = $result['budget'];
		$project->resources = $result['resources'];
		$project->dt = $result['dt'];
		$project->approval = $result['approval'];
		
		//Get files in the project folder if any exist
		$directory = array_diff(scandir(getcwd()."/uploads/projects/".$id),array('..','.'));
		if(count($directory) > 0) {
			$project->files = array();
			foreach($directory as $filename) array_push($project->files,$filename);
		}
		
		return $project;
	}
	
	static function getProjects() {
		$limit = 15;
		$page;
		if(!isset($_GET['page']) || !filter_input(INPUT_GET,'page',FILTER_VALIDATE_INT)) $page = 1;
		else $page = $_GET['page'];
		
		$offset = ($page-1)*$limit;
		
		$query = "SELECT * FROM projects ORDER BY project_id DESC LIMIT %d OFFSET %d";
		$query = sprintf($query,$limit,$offset);
		$query_params = array();
		$result = $GLOBALS['MySQL']->query($query,$query_params)->fetchAll();
		return $result;
	}
	
	static function getAllProjects() {
		$query = "SELECT * FROM projects ORDER BY project_id DESC";
		$result = $GLOBALS['MySQL']->query($query,array());
		return $result->fetchAll();
	}
	
	static function getNumProjects() {
		$query = "SELECT COUNT(*) FROM projects";
		$result = $GLOBALS['MySQL']->query($query,array());
		return $result->fetch()[0];
	}
	
	static function submit() {
		$project = new project();
		
		//Collect all the information (minus file upload)
		$project->title = $_POST['title'];
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
		$query = "INSERT INTO projects(title,sponsorName,phoneNumber,email,description,userNeeds,budget,resources) VALUES (:title,:sponsorName,:phoneNumber,:email,:description,:userNeeds,:budget,:resources);";
		$query_params = array(
			':title' => $project->title,
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
		
		header("Location: projects.php");
		die("Redirecting to projects.php");
	}
}
?>