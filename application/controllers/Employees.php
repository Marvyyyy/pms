<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('globalmodel');
		$this->load->model('datatablesmodel');
	}
	
	function index(){
		if($this->session->userdata('user_logged_in')==TRUE){
			// $this->dashboard();
			$where = array();
			$join = array();
			$data['role'] = $this->globalmodel->selectresultarray('*','role',$join,$where);
			$this->load->view('employees.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	function add_data(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('fname', 'First name', 'required');
			$this->form_validation->set_rules('mname', 'Middle name', 'required');
			$this->form_validation->set_rules('lname', 'Last name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('contact', 'Contact Number', 'required');
			$this->form_validation->set_rules('role', 'Role Access', 'required');
			
				if ($this->input->post("insert") != '') {
					if($this->form_validation->run()){
						$data = array(
							"first_name" => $this->input->post("fname"),
							"middle_name" => $this->input->post("mname"),
							"last_name" => $this->input->post("lname"),
							"email" => $this->input->post("email"),
							"contact" => $this->input->post("contact"),
							"role_id" => $this->input->post("role"),
							"username" => $this->input->post("email"),
							"password" => md5('itbs2023'),
						);
						$this->globalmodel->insert_data($data,'users');
						$form_error = array(
							'error' => FALSE
						);
						echo json_encode($form_error);
					} else {
						$form_error = array(
							'fname_error' => form_error('fname'),
							'mname_error' => form_error('mname'),
							'lname_error' => form_error('lname'),
							'email_error' => form_error('email'),
							'contact_error' => form_error('contact'),
							'role_error' => form_error('role'),
							'error' => true
						);
						echo json_encode($form_error);
					}
				}
				elseif($this->input->post("update") != ''){
					if($this->form_validation->run()){
						$data = array(
							"subj_name" => $this->input->post("subject"),
							"subj_code" => $this->input->post("subj_code"),
						);
						// $id = $this->input->post("ID");
						// $this->Globalmodel->update_data($data,$table,$where,$this->input->post("update"));
						$form_error = array(
							'error' => FALSE
						);
						echo json_encode($form_error);
					} else {
						$form_error = array(
							'subject_error' => form_error('subject'),
							'subj_code_error' => form_error('subj_code'),
							'error' => true
						);
						echo json_encode($form_error);
					}
				}
			
		} else {
			echo "No direct script access allowed";
		}
	}

	function get_all_employees(){ //list of employees
		$table = "users";
		$where = array();
		$select ="*,users.id as uID";
		$join[0]['table'] = 'role';
		$join[0]['join_table_id'] = 'users.role_id';
		$join[0]['from_table_id'] = 'role.id';
		$join[0]['join_type'] = 'left';

		$column_order = array('users.id');
		$column_search = array('user.sid');
		$ordering = array('users.id' => 'desc');

		$data = array();
		$no = $_POST['start'];
		$list = $this->datatablesmodel->get_datatables($table,$where,$select,$join,$column_order,$column_search,$ordering);
		foreach($list as $record) {
			$button = '<a class="btn btn-sm btn-info" href="'.base_url().'employees/employees_view/'.$record->uID.'">View</a>';
			if($record->role_id == 1){
				$count = $this->globalmodel->countrows('*','tasks',"",array("user_id" => $record->uID,"task_status_id !=" => 7));
				if($count > 0){
					$badge = '<a class="btn btn-app bg-warning" style="height: 31px;margin: 0px;padding: 7px;"><span class="badge bg-success">'.$count.'</span>Pending Tasks</a>';
				}else{
					$badge = '<a class="btn btn-app bg-success" style="height: 31px;margin: 0px;padding: 7px;">No Pending Tasks</a>';
				}
			}else{
				$count = $this->globalmodel->countrows('*','project',"",array("project_manager_id" => $record->uID,"project_status_id !=" => 3));
				if($count > 0){
					$badge = '<a class="btn btn-app bg-danger" style="height: 31px;margin: 0px;padding: 7px;;"><span class="badge bg-success">'.$count.'</span>Pending Projects</a>';
				}else{
					$badge = '<a class="btn btn-app bg-success" style="height: 31px;margin: 0px;padding: 7px;;">No Pending Projects</a>';
				}
			}
			$row = array();
			$row[] = $record->first_name.' '.$record->middle_name.' '.$record->last_name; 
			$row[] = $record->role_name;
			$row[] = $badge;
			$row[] = $button;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->datatablesmodel->count_all($table,$where,$select,$join,$column_order,$column_search,$ordering),
			"recordsFiltered" => $this->datatablesmodel->count_filtered($table,$where,$select,$join,$column_order,$column_search,$ordering),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function employees_view(){
		if($this->session->userdata('user_logged_in')==TRUE){
			$user_id = $this->uri->segment(3);
			$join[0]['table'] = 'role';
			$join[0]['join_table_id'] = 'users.role_id';
			$join[0]['from_table_id'] = 'role.id';
			$join[0]['join_type'] = 'left';
			$data['users'] = $this->globalmodel->selectrow('*,users.id as uID','users',$join,array("users.id"=>$user_id));
			$data['task_count'] = $this->globalmodel->countrows('*','tasks',"",array("user_id" => $user_id,"task_status_id !=" => 7));
			$this->load->view('employee_view.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	function get_all_task(){ //list of employees
		$user_id = $this->uri->segment(3);
		$table = "tasks";
		$where = array("tasks.user_id" => $user_id);
		$select ="*,tasks.id as tID,project.id as pID";
		$join[0]['table'] = 'project';
		$join[0]['join_table_id'] = 'tasks.project_id';
		$join[0]['from_table_id'] = 'project.id';
		$join[0]['join_type'] = 'left';
		$join[1]['table'] = 'priority_level';
		$join[1]['join_table_id'] = 'tasks.priority_level_id';
		$join[1]['from_table_id'] = 'priority_level.id';
		$join[1]['join_type'] = 'left';
		$join[2]['table'] = 'task_status';
		$join[2]['join_table_id'] = 'tasks.task_status_id';
		$join[2]['from_table_id'] = 'task_status.id';
		$join[2]['join_type'] = 'left';
		$join[3]['table'] = 'modules';
		$join[3]['join_table_id'] = 'tasks.module_id';
		$join[3]['from_table_id'] = 'modules.id';
		$join[3]['join_type'] = 'left';

		$column_order = array('tasks.id');
		$column_search = array('tasks.id');
		$ordering = array('tasks.id' => 'desc');

		$data = array();
		$no = $_POST['start'];
		$list = $this->datatablesmodel->get_datatables($table,$where,$select,$join,$column_order,$column_search,$ordering);
		foreach($list as $record) {
			$row = array();
			$row[] = '<a href="'.base_url().'project/view/'.$record->pID.'"><u>'.$record->project_name.'</u></a>'; 
			$row[] = $record->task_name; 
			$row[] = $record->module_name; 
			if($record->priority_level_id == 1){
				$style = 'background-color:#ffc107;color:black;';
			}else if($record->priority_level_id == 2){
				$style = 'background-color:#fd7e14;color:white;';
			}else if($record->priority_level_id == 3){
				$style = 'background-color:#dc3545;color:white;';
			}
			$row[] = '<label class="btn btn-sm p-1 m-0" style="font-size:x-small;'.$style.'width:30%">'.$record->priority_name.'</label>';
			$row[] = $record->date_end;
			if($record->task_status_id == 1){
				$style = 'background-color:#6c757d;color:white;';
			}else if($record->task_status_id == 2){
				$style = 'background-color:#007bff;color:white;';
			}else if($record->task_status_id == 3){
				$style = 'background-color:#ffc107;color:black;';
			}else if($record->task_status_id == 4){
				$style = 'background-color:#e83e8c;color:white;';
			}else if($record->task_status_id == 5){
				$style = 'background-color:#6f42c1;color:white;';
			}else if($record->task_status_id == 6){
				$style = 'background-color:#dc3545;color:white;';
			}else if($record->task_status_id == 7){
				$style = 'background-color:#28a745;color:white;';
			}
			$row[] = '<label class="btn btn-xs p-1 m-0" style="font-size:x-small;'.$style.'width:80%">'.$record->status.'</label>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->datatablesmodel->count_all($table,$where,$select,$join,$column_order,$column_search,$ordering),
			"recordsFiltered" => $this->datatablesmodel->count_filtered($table,$where,$select,$join,$column_order,$column_search,$ordering),
			"data" => $data,
		);
		echo json_encode($output);
	}
}
