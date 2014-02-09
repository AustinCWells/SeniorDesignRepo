<?php	
class account {
	public $logged;
	public $id;
	public $email;
	public $roles;
	
	public function __construct() {
		$this->logged = false;
		$this->roles = array();
	}
	
	function initRoles() {
		$this->roles = array();
		$query = "SELECT t1.role_id, t2.role_name FROM user_role as t1 JOIN roles as t2 ON t1.role_id = t2.role_id WHERE t1.user_id = :user_id";
		$query_params = array(":user_id" => $this->id);
		$result = $GLOBALS['MySQL']->query($query,$query_params);
		while($row = $result->fetch()) {
			$this->roles[$row['role_name']] = role::getRolePerms($row['role_id']);
		}
	}
	
	function hasPrivilege($perm) {
		foreach($this->roles as $role) {
			if($role->hasPerm($perm)) {
				return true;
			}
		}
		return false;
	}
	
	function register() {
		//Validation
		if(empty($_POST['name'])) die("Please enter your name.");
		if(empty($_POST['email'])) die("Please enter a email.");
		if(empty($_POST['password'])) die("Please enter a password.");
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) die("Invalid E-Mail Address.");
		
		//Check to see if email is in use
		$query = "SELECT 1 FROM members WHERE email = :email";
		$query_params = array(':email'=>$_POST['email']);
		$result = $GLOBALS['MySQL']->query($query,$query_params);
		if($result->fetch()) die("This email is already in use.");
		
		//Prepare/run statement for entry into database
		$query = " 
		INSERT INTO members ( 
		name,
		password, 
		salt, 
		email,
		regIP
		) VALUES (
		:name,
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
			':name' => $_POST['name'],
			':password' => $password, 
			':salt' => $salt, 
			':email' => $_POST['email'],
			':regIP' => $_SERVER['REMOTE_ADDR']
		); 
		$result = $GLOBALS['MySQL']->query($query,$query_params);
		
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
			$this->initRoles();
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
}

//http://forums.devshed.com/php-faqs-and-stickies-167/how-to-program-a-basic-but-secure-login-system-using-891201.html

?>