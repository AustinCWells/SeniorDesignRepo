<?php
class role {
	public $permissions;
	
	function __construct() {
		$this->permissions = array();
	}
	
	//Returns role object with all associated perms
	static function getRolePerms($role_id) {
		$role = new role();
		$query = "SELECT t2.perm_desc FROM role_perm as t1 JOIN permissions as t2 ON t1.perm_id = t2.perm_id WHERE t1.role_id = :role_id";
		$query_params = array(":role_id" => $role_id);
		$result = $GLOBALS['MySQL']->query($query,$query_params);
		while($row = $result->fetch()) {
			$role->permissions[$row['perm_desc']] = true;
		}
		return $role;
	}
	
	//Check if a permission is set
	function hasPerm($permission) {
		return isset($this->permissions[$permission]);
	}
}
?>