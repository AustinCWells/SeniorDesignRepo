<?php	
class account {
	protected $logged;
	protected $id;
	protected $perms = array();
	
	public function __construct() {
		if(!isset($_SESSION['id'])) {
			$this->logged = false;
		} else {
			$this->logged = true;
			$this->id = $_SESSION['id'];
		}
	}
}

//http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html

function register() {
	//Validation
	if(empty($_POST['username'])) die("Please enter a username.");
	if(empty($_POST['password'])) die("Please enter a password.");
	if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) die("Invalid E-Mail Address.");
	
	//Check to see if username is in use
	$query = "SELECT 1 FROM members WHERE username = :username";
	$query_params = array(':username'=>$_POST['username']);
	$result = runquery($query,$query_params);
	if($stmt->fetch()) die("This username is already in use.");
	
	//Check to see if email is in use
	$query = "SELECT 1 FROM members WHERE email = :email";
	$query_params = array(':email'=>$_POST['email']);
	try {
		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_params);
	} catch(PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage()); 
	}
	if($stmt->fetch()) die("This email is already in use.");
	
	//Prepare/run statement for entry into database
	$query = " 
	INSERT INTO users (
	username, 
	password, 
	salt, 
	email,
	regIP
	) VALUES (
	:username, 
	:password, 
	:salt, 
	:email,
	:regIP
	)";
	$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
	$password = hash('sha256', $_POST['password'] . $salt);
	for($round = 0; $round < 65536; $round++) 
	{ 
		$password = hash('sha256', $password . $salt); 
	}
	$query_params = array( 
		':username' => $_POST['username'], 
		':password' => $password, 
		':salt' => $salt, 
		':email' => $_POST['email'],
		':regIP' => $_SERVER['REMOTE_ADDR']
	); 
	$result = runquery($query,$query_params);
	
	//Return to log-in page after register
	header("Location: login.php");
	die("Redirecting to login.php");
}

function login() {
	$submitted_username = $_POST['username'];
	
	$query = "SELECT user_id, username, password, salt, email FROM users WHERE username = :username";
	$query_params = array(':username' => $_POST['username']);
	$result = runquery($query,$query_params);
	
	$login_ok = null;
	
	$row = $result->fetch();
	if($row) {
		//Rehash the password for checking
		$check_password = hash('sha256', $_POST['password'] . $row['salt']);
		for($round = 0; $round < 65536; $round++) 
		{ 
			$check_password = hash('sha256', $check_password . $row['salt']); 
		}
		
		//Verify password
		if($check_password === $row['password']) 
            {
                $login_ok = true; 
            } 
	}
	
	if($login_ok) {
		unset($row['salt']); 
            unset($row['password']);
		$_SESSION['user'] = $row;
		header("Location: index.php"); 
            die("Redirecting to index.php"); 
	} else {
		print("Login Failed.");
		$submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
	}
}
?>