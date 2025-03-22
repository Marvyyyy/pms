<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

date_default_timezone_set('Asia/Manila');
class Usersmodel extends CI_Model {
    public function login($username,$password){
		$pass = md5($password);
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
		$query = $this->db->query($sql);
		$rows = $query->num_rows();
		if($rows == 1){
			if($query->row()->is_active == 1){
					$user_id = $query->row()->id;
					$username = $query->row()->username;
					$role = $query->row()->role_id;
					$newdata = array(
						'id'  => $user_id,
						'username'  => $username,
						'password'  => $password,
						'role_id'  => $role,
						'user_logged_in' => TRUE,
					);
					$this->session->set_userdata($newdata);
					$data["response"] = "yes";
					print json_encode($data);
			}else{
				$data["response"] = "Your account is disabled.";
				print json_encode($data);
			}
		}else{
			$data["response"] = "Incorrect username or password. Please try again.";
			print json_encode($data);
		}
	}
}
?>
