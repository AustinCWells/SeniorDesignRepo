<?php	
class account {
	protected $logged;
	protected $id;
	protected $email;
	protected $perms = array();
	
	public function __construct() {
		$this->logged = false;
	}
	
	function register() {
		//Validation
		if(empty($_POST['email'])) die("Please enter a email.");
		if(empty($_POST['password'])) die("Please enter a password.");
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) die("Invalid E-Mail Address.");
		
		//Check to see if email is in use
		$query = "SELECT 1 FROM members WHERE email = :email";
		$query_params = array(':email'=>$_POST['email']);
		try {
			$result = $GLOBALS['MySQL']->query($query,$query_params);
		} catch(PDOException $ex) {
			die("Failed to run query: " . $ex->getMessage()); 
		}
		
		if($result->fetch()) die("This email is already in use.");
		
		//Prepare/run statement for entry into database
		$query = " 
		INSERT INTO members ( 
		password, 
		salt, 
		email,
		regIP
		) VALUES (
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
			':password' => $password, 
			':salt' => $salt, 
			':email' => $_POST['email'],
			':regIP' => $_SERVER['REMOTE_ADDR']
		); 
		$result = $GLOBALS['MySQL']->query($query,$query_params);
		
		var_dump($result,$password,$salt);
		//Return to log-in page after register
		header("Location: login.php");
		die("Redirecting to login.php");
	}

	function login() {
		$submitted_username = $_POST['email'];
		
		$query = "SELECT user_id, password, salt, email FROM members WHERE email = :email";
		$query_params = array(':email' => $_POST['email']);
		$result = $GLOBALS['MySQL']->query($query,$query_params);
		
		$login_ok = false;
		
		$row = $result->fetch();
		if($row) {
			//Rehash the password for checking
			$check_password = hash('sha256', $_POST['password'] . $row['salt']);
			for($round = 0; $round < 65536; $round++) 
			{ 
				$check_password = hash('sha256', $check_password . $row['salt']); 
			}
			
			//Verify password
			if($check_password == $row['password']) 
			{
				$login_ok = true; 
			} 
		}
		
		if($login_ok) {
			$this->logged = true;
			$this->email = $row['email'];
			$this->id = $row['user_id'];			
			$_SESSION['account'] = serialize($this);
			header("Location: index.php"); 
			die("Redirecting to index.php"); 
		} else {
			print("Login Failed.");
			$submitted_username = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
		}
	}
	
	function logout() {
		unset($_SESSION['account']);
		header("Location: index.php");
		die("Redirecting to index.php");
	}
	
	function getLogged() {
		return $this->logged;
	}
	
	function getEmail() {
		return $this->email;
	}
	
	function getID() {
		return $this->id;
	}
	
	function getPerms() {
		return $this->perms;
	}
}

//http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html

?>