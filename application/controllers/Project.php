<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('globalmodel');
		$this->load->model('datatablesmodel');
	}

	function index(){
		if($this->session->userdata('user_logged_in')==TRUE){
			$this->load->view('projects.php');
		}else{
			$this->load->view('login');
		}
	}

	function project_add(){
		if($this->session->userdata('user_logged_in')==TRUE){
			$join = array();
			$data['role'] = $this->globalmodel->selectresultarray('*','role',$join,array());
			$data['p_manager'] = $this->globalmodel->selectresultarray('*','users',$join,array("role_id !=" => 1));
			$data['p_members'] = $this->globalmodel->selectresultarray('*','users',$join,array("role_id" => 1));
			$data['status'] = $this->globalmodel->selectresultarray('*','project_status',$join,array());
			$this->load->view('project_add.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	function add_data(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('name', 'Project Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('deadline', 'Taget Date', 'required');
			$this->form_validation->set_rules('client', 'Client Company name', 'required');
			$this->form_validation->set_rules('p_manager', 'Project Manager', 'required');
			$this->form_validation->set_rules('member[]', 'Project Members', 'required');
			
				if ($this->input->post("insert") != '') {
					if($this->form_validation->run()){
						$data = array(
							"project_name" => $this->input->post("name"),
							"project_desc" => $this->input->post("description"),
							"client" => $this->input->post("client"),
							"project_manager_id" => $this->input->post("p_manager"),
							"project_status_id" => $this->input->post("status"),
							'target_date' => date("Y-m-d",strtotime($this->input->post("deadline"))),
							'date_created' => date("Y-m-d h:i:s"),
						);
						$this->globalmodel->insert_data($data,'project');
						$insertId = $this->db->insert_id();
						$member = $this->input->post("member");
						$data2 = array();
						for ($i = 0; $i < count($member); $i++) {
							$this->globalmodel->insertData(
								"project_members", 
								"user_id,project_id", 
								"'$member[$i]','$insertId'"
							);
						}
						$usertype = $this->input->post("usertype");
						$username = $this->input->post("username");
						$password = $this->input->post("password");
						if(!empty($usertype)){
							$data3 = array();
							for ($i = 0; $i < count($usertype); $i++) {
								$this->globalmodel->insertData(
									"project_credentials", 
									"project_id,user_type,username,password", 
									"'$insertId','$usertype[$i]','$username[$i]','$password[$i]'"
								);
							}
						}
						$links = $this->input->post("links");
						if(!empty($links)){
							$data4 = array();
							for ($i = 0; $i < count($links); $i++) {
								$this->globalmodel->insertData(
									"project_links", 
									"project_id,links", 
									"'$insertId','$links[$i]'"
								);
							}
						}
						$modules = $this->input->post("modules");
						if(!empty($modules)){
							$data = array();
							for ($i = 0; $i < count($modules); $i++) {
								$this->globalmodel->insertData(
									"modules", 
									"project_id,module_name", 
									"'$insertId','$modules[$i]'"
								);
							}
						}
						$form_error = array(
							'error' => FALSE,
							'url' => base_url('project/view/'.$insertId.'')
						);
						echo json_encode($form_error);
					} else {
						$form_error = array(
							'name_error' => form_error('name'),
							'description_error' => form_error('description'),
							'client_error' => form_error('client'),
							'p_manager_error' => form_error('p_manager'),
							'status_error' => form_error('status'),
							'deadline_error' => form_error('deadline'),
							'member_error' => form_error('member'),
							'error' => true
						);
						echo json_encode($form_error);
					}
				}
				elseif($this->input->post("update") != ''){
					if($this->form_validation->run()){
						$data = array(
							"project_name" => $this->input->post("name"),
							"project_desc" => $this->input->post("description"),
							"client" => $this->input->post("client"),
							"project_manager_id" => $this->input->post("p_manager"),
							"project_status_id" => $this->input->post("status"),
							'target_date' => date("Y-m-d",strtotime($this->input->post("deadline"))),
						);
						$this->globalmodel->update_data($data,'project','id',$this->input->post("update"));
						$member = $this->input->post("member");
						// if(!empty($member)){
						$data2 = array();
						for ($i = 0; $i < count($member); $i++) {
							$data2[] = array(
								'user_id' => $member[$i],
								'project_id' => $this->input->post("update"),
							);
						}
						$this->globalmodel->deletInsertBatch($data2,'project_members',array("project_id" => $this->input->post("update")));

						// }
						$usertype = $this->input->post("usertype");
						if($usertype != ""){
							$data = array();
							for ($i = 0; $i < count($usertype); $i++) {
								$data[] = array(
									'id' => $this->input->post("credsID")[$i],
									'project_id' => $this->input->post("update"),
									'user_type' => $this->input->post("usertype")[$i],
									'username' => $this->input->post("username")[$i],
									'password' => $this->input->post("password")[$i],
								);
							}
							$this->globalmodel->deletInsertBatch($data,'project_credentials',array("project_id" => $this->input->post("update")));
						}else{
							$this->globalmodel->delete_data('project_credentials',array("project_id" => $this->input->post("update")));
						}
						$usertype_add = $this->input->post("usertype_add");
						if($usertype_add != ""){
							$data = array();
							for ($i = 0; $i < count($usertype_add); $i++) {
								$data[] = array(
									'project_id' => $this->input->post("update"),
									'user_type' => $this->input->post("usertype_add")[$i],
									'username' => $this->input->post("username_add")[$i],
									'password' => $this->input->post("password_add")[$i],
								);
							}
							$this->globalmodel->insertBatch($data,'project_credentials');
						}
						$links = $this->input->post("links");
						if($links != ""){
							$data = array();
							for ($i = 0; $i < count($links); $i++) {
								$data[] = array(
									'id' => $this->input->post("linksID")[$i],
									'project_id' => $this->input->post("update"),
									'links' => $this->input->post("links")[$i],
								);
							}
							$this->globalmodel->deletInsertBatch($data,'project_links',array("project_id" => $this->input->post("update")));
						}else{
							$this->globalmodel->delete_data('project_links',array("project_id" => $this->input->post("update")));
						}
						$links_add = $this->input->post("links_add");
						if($links_add != ""){
							$data = array();
							for ($i = 0; $i < count($links_add); $i++) {
								$data[] = array(
									'project_id' => $this->input->post("update"),
									'links' => $this->input->post("links_add")[$i],
								);
							}
							$this->globalmodel->insertBatch($data,'project_links');
						}
						$module = $this->input->post("module");
						if($module != ""){
							$data = array();
							for ($i = 0; $i < count($module); $i++) {
								$data[] = array(
									'id' => $this->input->post("moduleID")[$i],
									'project_id' => $this->input->post("update"),
									'module_name' => $this->input->post("module")[$i],
								);
							}
							$this->globalmodel->deletInsertBatch($data,'modules',array("project_id" => $this->input->post("update")));
						}else{
							$this->globalmodel->delete_data('modules',array("project_id" => $this->input->post("update")));
						}
						$module_add = $this->input->post("module_add");
						if($module_add != ""){
							$data = array();
							for ($i = 0; $i < count($module_add); $i++) {
								$data[] = array(
									'project_id' => $this->input->post("update"),
									'module_name' => $this->input->post("module_add")[$i],
								);
							}
							$this->globalmodel->insertBatch($data,'modules');
						}
						$id = $this->input->post("update");
						$form_error = array(
							'error' => FALSE,
							'url' => base_url('project/view/'.$id.'')
						);
						echo json_encode($form_error);
					} else {
						$form_error = array(
							'name_error' => form_error('name'),
							'description_error' => form_error('description'),
							'client_error' => form_error('client'),
							'p_manager_error' => form_error('p_manager'),
							'status_error' => form_error('status'),
							'deadline_error' => form_error('deadline'),
							'member_error' => form_error('member'),
							'error' => true
						);
						echo json_encode($form_error);
					}
				}
			
		} else {
			echo "No direct script access allowed";
		}
	}

	function get_all_project(){ //list of employees
		$table = "project";
		if($this->session->userdata('role_id')==1){
			$where = array("project.is_active" => 1,"project.project_status_id" => 2,"tasks.user_id"=>$this->session->userdata('id'));
		}else{
			$where = array("project.is_active" => 1);
		}
		$select ="*,project.id as pID";
		$join[0]['table'] = 'project_status';
		$join[0]['join_table_id'] = 'project.project_status_id';
		$join[0]['from_table_id'] = 'project_status.id';
		$join[0]['join_type'] = 'left';
		$join[1]['table'] = 'tasks';
		$join[1]['join_table_id'] = 'project.id';
		$join[1]['from_table_id'] = 'tasks.project_id';
		$join[1]['join_type'] = 'left';

		$column_order = array('project.id');
		$column_search = array('project.sid');
		$ordering = array('project.id' => 'desc');

		$data = array();
		$no = $_POST['start'];
		$list = $this->datatablesmodel->get_datatables($table,$where,$select,$join,$column_order,$column_search,$ordering);
		foreach($list as $record) {
			$row = array();
			$button = '<a class="btn btn-sm btn-info" href="'.base_url().'project/view/'.$record->pID.'">View</a>';
			$row[] = $record->project_name; 

			$task_count = $this->globalmodel->countrows('*','tasks',"",array("project_id" => $record->pID));
			$task_completed_count = $this->globalmodel->countrows('*','tasks',"",array("project_id" => $record->pID,"task_status_id"=>7));
			if($task_count >0){
				$progress_percent = round(($task_completed_count / $task_count) * 100);
			}else{
				$progress_percent = "0";
			}
			$row[] = '<div class="progress progress-xs mt-2">
			<div class="progress-bar bg-lightblue progress-bar-striped" style="width: '.$progress_percent.'%">
			</div>
			</div><span class="badge bg-lightblue">'.$progress_percent.'%</span>';

			if($record->project_status_id == 1){
				$style = 'background-color:#6c757d;color:white;';
			}else if($record->project_status_id == 2){
				$style = 'background-color:#ffc107;color:black;';
			}else if($record->project_status_id == 3){
				$style = 'background-color:#28a745;color:white;';
			}else if($record->project_status_id == 4){
				$style = 'background-color:#dc3545;color:white;';
			}
			$row[] = '<label class="btn btn-xs p-1 m-0" style="font-size:x-small;'.$style.'width:50%">'.$record->status.'</label>';
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

	function view(){
		if($this->session->userdata('user_logged_in')==TRUE){
			$project_id = $this->uri->segment(3);
			$userid = $this->session->userdata('id');
			$join = "
			LEFT JOIN users u ON project.project_manager_id = u.id 
			LEFT JOIN project_status ps ON project.project_status_id = ps.id 
			";
			$data['project'] = $this->globalmodel->sqlSelectRow("project.*,project.id as pID,u.*,ps.*", "project", $join, "project.id = '$project_id' AND project.is_active = '1'");
			$data['p_status'] = $this->globalmodel->sqlSelectResultArray("*", "project_status", "", "id != '0'");
			$data['status'] = $this->globalmodel->sqlSelectResultArray("*", "task_status", "", "id != '0'");
			$data['priority'] = $this->globalmodel->sqlSelectResultArray("*", "priority_level", "", "id != '0'");
			$data['links'] = $this->globalmodel->sqlSelectResultArray("*", "project_links", "", "project_id = '$project_id'");
			$data['creds'] = $this->globalmodel->sqlSelectResultArray("*", "project_credentials", "", "project_id = '$project_id'");
			$data['modules'] = $this->globalmodel->sqlSelectResultArray("*", "modules", "", "project_id = '$project_id'");

			$join = "LEFT JOIN users u ON pm.user_id = u.id";
			$data['p_members'] = $this->globalmodel->sqlSelectResultArray("*", "project_members pm", "$join", "project_id = '$project_id'");
			
			if($this->session->userdata('role_id')==1){
				$data['task_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id' AND user_id = '$userid'");
				$data['task_completed_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id' AND user_id = '$userid' AND task_status_id = '7'");
				$data['errors_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id' AND user_id = '$userid' AND task_status_id = '4'");
				$data['qa_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id' AND user_id = '$userid' AND task_status_id = '5'");
			}else{
				$data['task_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id'");
				$data['task_completed_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id' AND task_status_id = '7'");
				$data['errors_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id' AND task_status_id = '4'");
				$data['qa_count'] = $this->globalmodel->checkrow("*","tasks","project_id = '$project_id' AND task_status_id = '5'");
			}
			$task_count_total = $this->globalmodel->countrows('*','tasks',"",array("project_id" => $project_id));
			$task_completed_count_total = $this->globalmodel->countrows('*','tasks',"",array("project_id" => $project_id,"task_status_id"=>7));
			if($task_count_total >0){
				$data['progress_percent'] = round(($task_completed_count_total / $task_count_total) * 100);
			}else{
				$data['progress_percent'] = "0";
			}

			$this->load->view('project_view.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	function get_all_task(){ //list of employees
		$table = "tasks";
		$project_id = $this->uri->segment(3);
		if($this->session->userdata('role_id')==1){
			$where = array("tasks.project_id" => $project_id,"user_id"=>$this->session->userdata('id'));
		}else{
			$where = array("tasks.project_id" => $project_id);
		}
		$select ="*,tasks.id as tID";
		$join[0]['table'] = 'users';
		$join[0]['join_table_id'] = 'tasks.user_id';
		$join[0]['from_table_id'] = 'users.id';
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
			$button = '<button class="btn btn-xs btn-info" onclick="edit_task('.$record->tID.');" style="width:80%" >View/Edit</button>';
			$row[] = $record->task_name; 
			$row[] = $record->module_name; 
			$row[] = $record->first_name.' '.$record->last_name;
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

	function add_task(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('task[]', 'Task', 'required');
			$this->form_validation->set_rules('member[]', 'Developer', 'required');
			$this->form_validation->set_rules('priority[]', 'Priority Level', 'required');
			$this->form_validation->set_rules('status[]', 'Status', 'required');
			$this->form_validation->set_rules('deadline[]', 'Deadline date', 'required');
			$project_id = $this->input->post("insert");
			
				if ($this->input->post("insert") != '') {
					if($this->form_validation->run()){
						$task = $this->input->post("task");
						if(!empty($task)){
							$data2 = array();
							for ($i = 0; $i < count($task); $i++) {
								$data2[] = array(
									'project_id' => $project_id,
									'task_name' => $task[$i],
									'user_id' => $this->input->post("member")[$i],
									'priority_level_id' => $this->input->post("priority")[$i],
									'task_status_id' => $this->input->post("status")[$i],
									'date_created' => date("Y-m-d h:i:s"),
									'date_end' => date("Y-m-d",strtotime($this->input->post("deadline")[$i])),
								);
							}
							$this->globalmodel->insertBatch($data2,'tasks');
						}
						$form_error = array(
							'error' => FALSE
						);
						echo json_encode($form_error);
					} else {
						$form_error = array(
							'task_error' => form_error('task'),
							'member_error' => form_error('member'),
							'priority_error' => form_error('priority'),
							'status_error' => form_error('status'),
							'deadline_error' => form_error('deadline'),
							'error' => true
						);
						echo json_encode($form_error);
					}
				}
				elseif($this->input->post("update") != ''){
					// if($this->form_validation->run()){
						$data = array(
							"module_id" => $this->input->post("modules_edit"),
							"task_name" => $this->input->post("task_edit"),
							"user_id" => $this->input->post("member_edit"),
							"priority_level_id" => $this->input->post("priority_edit"),
							"task_status_id" => $this->input->post("status_edit"),
							"date_end" => date("Y-m-d",strtotime($this->input->post("deadline_edit"))),
						);
						$this->globalmodel->update_data($data,'tasks','id',$this->input->post("update"));
						$form_error = array(
							'error' => FALSE
						);
						echo json_encode($form_error);
					// } else {
					// 	$form_error = array(
					// 		'subject_error' => form_error('subject'),
					// 		'subj_code_error' => form_error('subj_code'),
					// 		'error' => true
					// 	);
					// 	echo json_encode($form_error);
					// }
				}
			
		} else {
			echo "No direct script access allowed";
		}
	}
	function view_task(){
		$join[0]['table'] = 'users';
		$join[0]['join_table_id'] = 'tasks.user_id';
		$join[0]['from_table_id'] = 'users.id';
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
		$join[4]['table'] = 'project';
		$join[4]['join_table_id'] = 'tasks.project_id';
		$join[4]['from_table_id'] = 'project.id';
		$join[4]['join_type'] = 'left';
		$data = $this->globalmodel->selectrow('*,tasks.id as tID,project.id as pID,modules.id as mID,users.id as uID,priority_level.id as plID,task_status.id as tsID','tasks',$join,array("tasks.id"=>$this->input->post('idd')));
		$data = array(
			'tID' => $data['tID'],
			'task_name' => $data['task_name'],
			'pID' => $data['pID'],
			'project_name' => $data['project_name'],
			'mID' => $data['mID'],
			'module_name' => $data['module_name'],
			'uID' => $data['uID'],
			'first_name' => $data['first_name'],
			'middle_name' => $data['middle_name'],
			'last_name' => $data['last_name'],
			'plID' => $data['plID'],
			'priority_name' => $data['priority_name'],
			'tsID' => $data['tsID'],
			'status' => $data['status'],
			'date_end' => $data['date_end'],
		);
		echo json_encode($data);
	}
	function edit_project(){
		if($this->session->userdata('user_logged_in')==TRUE){
			$project_id = $this->uri->segment(3);
			$join = array();
			$join[0]['table'] = 'users';
			$join[0]['join_table_id'] = 'project.project_manager_id';
			$join[0]['from_table_id'] = 'users.id';
			$join[0]['join_type'] = 'left';
			$join[1]['table'] = 'project_status';
			$join[1]['join_table_id'] = 'project.project_status_id';
			$join[1]['from_table_id'] = 'project_status.id';
			$join[1]['join_type'] = 'left';
			$data['project'] = $this->globalmodel->selectrow('*,project.id as pID','project',$join,array("project.id"=>$project_id, "project.is_active"=>1));
			$data['status'] = $this->globalmodel->selectresultarray('*','project_status',"",array());
			$data['priority'] = $this->globalmodel->selectresultarray('*','priority_level',"",array());
			$data['links'] = $this->globalmodel->selectresultarray('*','project_links',"",array("project_id"=>$project_id));
			$data['creds'] = $this->globalmodel->selectresultarray('*','project_credentials',"",array("project_id"=>$project_id));
			$data['p_manager'] = $this->globalmodel->selectresultarray('*','users',"",array("role_id !=" => 1));
			$data['members'] = $this->globalmodel->selectresultarray('*','users',"",array("role_id" => 1));
			$data['p_members'] = $this->globalmodel->selectresultarray('*','project_members',"",array("project_id" => $project_id));
			$data['modules'] = $this->globalmodel->selectresultarray('*','modules',"",array("project_id" => $project_id));

			$this->load->view('project_edit.php',$data);
		}else{
			$this->load->view('login');
		}
	}
}
