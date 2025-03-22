<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	 function __construct(){
		parent::__construct();
		$this->load->model('globalmodel');
		$this->load->model('usersmodel');
	}
	function index(){
		if($this->session->userdata('user_logged_in')==TRUE){
			$this->load->view('dashboard');
		}else{
			$this->load->view('login');
		}
	}
	
//**********************************  Account Settings Module **********************************//start
	function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$this->usersmodel->login($username,$password);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}
	function account(){ //account module
		if($this->session->userdata('user_logged_in')==TRUE){
			$id = $this->session->userdata('id');
			$where = "users.id = $id";
			$join = array();
			$profile_info = $this->globalmodel->selectrow('*','users',$join,$where);
			$data['profile_info'] = $profile_info;
			$this->load->view('account',$data);
		}else{
			redirect('user');
		}
	}
//**********************************  Account Settings Module **********************************//end
}
