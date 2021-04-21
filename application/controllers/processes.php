<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class processes extends CI_Controller {
	public function index()
	{
		$this->load->view('home');
	}
	public function signin(){
		$this->load->view('signin');
	}
	public function register(){
		$this->load->view('register');
	}

	public function edit_user($id){
		$this->load->model('process');
		$result = $this->process->get_user_data($id);

		$user_info = array(
				"id" => $result['id'],
				"email" => $result['email'],
				"fname" => $result['fname'],
				"lname" => $result['lname']
		);


		$this->load->view('edit_user', $user_info);
	}


	public function dashboard_admin(){
		$this->load->model('process');
		$result = $this->process->get_all_users();
		$this->session->set_userdata("users_list", $result);

		$this->load->view('admin_dashboard');
	}


	public function dashboard_user(){
		$this->load->model('process');
		$result = $this->process->get_all_users();
		$this->session->set_userdata("users_list", $result);

		$this->load->view('user_dashboard');
	}
	public function new_user(){
		$this->load->view('new_user');
	}
	public function create_user(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lastname', 'trim|required');
        $this->form_validation->set_rules('pword', 'Password', 'trim|required|matches[cpword]');
        $this->form_validation->set_rules('cpword', 'Confirm Password', 'trim|required');
		$this->session->set_userdata('errors', "");
		$errors = $this->session->userdata('errors');
		$this->load->model('process');

		$email = $this->input->post('email');
		$result = $this->process->check_email($email);
			if($result['email_count'] != 0){
				$this->session->set_userdata('errors', $errors."Email already used");
				redirect('/user-dashboard/register');
			}
			else{
				if(!$this->form_validation->run()){
					$this->session->set_userdata('errors', validation_errors());
		        	$errors .= validation_errors();
		        	redirect('/user-dashboard/register');
				}
				else{
					$result = $this->process->count_users();
					if($result['users_count'] == 0){
						$user_level = 9;
					}
					else{
						$user_level = 1;
					}
					$user_info = array(
						"email" => $this->input->post('email'),
						"fname" => $this->input->post('fname'),
						"lname" => $this->input->post('lname'),
						"pword" => $this->input->post('pword'),
						"user_level" => $user_level
					);
					$this->process->create_user($user_info);
					$this->session->set_userdata("success", "Successfully created an account");
					redirect("/user-dashboard/register");
				}

			}

	}

	public function sign_in_process(){
		$this->load->model('process');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pword', 'Password', 'trim|required');

        $this->session->set_userdata('errors', "");
		$errors = $this->session->userdata('errors');

        if(!$this->form_validation->run()){
			$this->session->set_userdata('errors', validation_errors());
        	$errors .= validation_errors();
        	redirect('/user-dashboard/signin');
		}
		else{
			$info = array(
				"email" => $this->input->post('email'),
				"pword" => $this->input->post('pword')
			);
			$check_signin = $this->process->check_account($info);
			if($check_signin == "success" ){
				$user_level = $this->session->userdata('user_info');
				if($user_level['user_level'] == 1){
					redirect('user-dashboard/dashboard');
				}
				else{
					redirect('user-dashboard/dashboard/admin');
				}
			}
			else{
				$this->session->set_userdata('errors', $check_signin);
				redirect('/user-dashboard/signin');
			}
		}
	}
	
	public function logoff(){
		$this->session->sess_destroy();
		redirect('/user-dashboard/signin');
	}

	public function admin_new_user(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lastname', 'trim|required');
        $this->form_validation->set_rules('pword', 'Password', 'trim|required|matches[cpword]');
        $this->form_validation->set_rules('cpword', 'Confirm Password', 'trim|required');
		$this->session->set_userdata('errors', "");
		$errors = $this->session->userdata('errors');
		$this->load->model('process');

		$email = $this->input->post('email');
		$result = $this->process->check_email($email);
			if($result['email_count'] != 0){
				$this->session->set_userdata('errors', $errors."Email already used");
				redirect('/user-dashboard/users/new');
			}
			else{
				if(!$this->form_validation->run()){
					$this->session->set_userdata('errors', validation_errors());
		        	$errors .= validation_errors();
		        	redirect('/user-dashboard/users/new');
				}
				else{
					$user_info = array(
						"email" => $this->input->post('email'),
						"fname" => $this->input->post('fname'),
						"lname" => $this->input->post('lname'),
						"pword" => $this->input->post('pword'),
						"user_level" => 1
					);
					$this->process->create_user($user_info);
					$this->session->set_userdata("success", "Successfully created an account");
					redirect("/user-dashboard/users/new");
				}

			}
	}

	public function remove_user($id){
		$this->load->model('process');
		$this->process->delete_user($id);
		redirect('/user-dashboard/dashboard/admin');
	}

	public function change_user_info($id){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lastname', 'trim|required');
		$this->session->set_userdata('errors', "");
		$errors = $this->session->userdata('errors');
		$this->load->model('process');

		$email = $this->input->post('email');
		$result = $this->process->check_email($email);
			if($result['email_count'] != 0){
				$this->session->set_userdata('errors', $errors."Email already used");
				redirect('/user-dashboard/edit_user/'.$id);
			}
			else{
				if(!$this->form_validation->run()){
					$this->session->set_userdata('errors', validation_errors());
		        	$errors .= validation_errors();
		        	redirect('/user-dashboard/edit_user/'.$id);
				}
				else{
					$user_info = array(
						"email" => $this->input->post('email'),
						"fname" => $this->input->post('fname'),
						"lname" => $this->input->post('lname'),
						"user_level" => $this->input->post('user_level')
					);
					$this->process->update_user($user_info,$id);
					$this->session->set_userdata("success", "Successfully updated an account!");
					redirect('/user-dashboard/edit_user/'.$id);
				}
			}
		
	}

	public function change_user_pword($id){
		$this->form_validation->set_rules('pword', 'Password', 'trim|required|matches[cpword]');
		$this->form_validation->set_rules('cpword', 'Confirm Password', 'trim|required');

		if(!$this->form_validation->run()){
			$this->session->set_userdata('errors', validation_errors());
        	redirect('/user-dashboard/edit_user/'.$id);
		}
		else{
			$this->load->model('process');
			$pword = $this->input->post('pword');
			$this->process->change_password($pword,$id);
			$this->session->set_userdata("success", "Successfully change password!");
			redirect('/user-dashboard/edit_user/'.$id);
		}		
	}

	public function user_profile(){
		$this->load->view('user_profile');
	}

	public function edit_info($id){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lastname', 'trim|required');
		$this->session->set_userdata('errors', "");
		$errors = $this->session->userdata('errors');
		$this->load->model('process');

		$email = $this->input->post('email');
		$result = $this->process->check_email($email);
			if($result['email_count'] != 0){
				$this->session->set_userdata('errors', $errors."Email already used");
				redirect('/user-dashboard/users/edit');
			}
			else{
				if(!$this->form_validation->run()){
					$this->session->set_userdata('errors', validation_errors());
		        	$errors .= validation_errors();
		        	redirect('/user-dashboard/users/edit');
				}
				else{
					$user_info = array(
						"email" => $this->input->post('email'),
						"fname" => $this->input->post('fname'),
						"lname" => $this->input->post('lname')
					);
					$this->process->update_user($user_info,$id);
					$result = $this->process->get_user_data($id);
					$this->session->set_userdata('user_info', $result);
					$this->session->set_userdata("success", "Successfully updated an account!");
					redirect('/user-dashboard/users/edit');
				}
			}
	}

	public function edit_pword($id){
		$this->form_validation->set_rules('pword', 'Password', 'trim|required|matches[cpword]');
		$this->form_validation->set_rules('cpword', 'Confirm Password', 'trim|required');

		if(!$this->form_validation->run()){
			$this->session->set_userdata('errors', validation_errors());
        	redirect('/user-dashboard/users/edit');
		}
		else{
			$this->load->model('process');
			$pword = $this->input->post('pword');
			$this->process->change_password($pword,$id);
			$this->session->set_userdata("success", "Successfully change password!");
			$result = $this->process->get_user_data($id);
			$this->session->set_userdata('user_info', $result);
			redirect('/user-dashboard/users/edit');
		}		
	}
	public function edit_desc($id){
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		if(!$this->form_validation->run()){
			$this->session->set_userdata('errors', validation_errors());
        	redirect('/user-dashboard/users/edit');
		}
		else{
			$this->load->model('process');
			$desc = $this->input->post('description');
			$this->process->update_desc($desc,$id);
			$this->session->set_userdata("success", "Successfully Updated the Description!");
			$result = $this->process->get_user_data($id);
			$this->session->set_userdata('user_info', $result);
			redirect('/user-dashboard/users/edit');
		}
	}

	public function user_information($id){
		$this->load->model('process');

		$result = $this->process->get_user_data($id);
		$message = $this->process->get_message($id);
		$comment = $this->process->get_comment($id);
		$this->session->set_userdata('acct_info', $result);
		$this->session->set_userdata('acct_message', $message);
		$this->session->set_userdata('acct_comment', $comment);
		$this->load->view('user_information');
	}

	public function send_message(){
		$message = array(
			"user_id" => $this->session->userdata('acct_info')['id'],
			"sender_id" => $this->session->userdata('user_info')['id'],
			"fname" => $this->session->userdata('user_info')['fname'],
			"lname" => $this->session->userdata('user_info')['lname'],
			"message" => $this->input->post('message')
		);

		$this->load->model('process');
		$result = $this->process->send_message($message);
		$acct_message = $this->process->get_message($message['user_id']);
		$this->session->set_userdata('acct_message', $acct_message);
		redirect('/user-dashboard/users/show/'.$message['user_id']);
	}

	public function send_comment(){
		$comment = array(
			"message_id" => $this->input->post('message_id'),
			"user_id" => $this->session->userdata('acct_info')['id'],
			"sender_id" => $this->session->userdata('user_info')['id'],
			"fname" => $this->session->userdata('user_info')['fname'],
			"lname" => $this->session->userdata('user_info')['lname'],
			"comment" => $this->input->post('comment')
		);

		$this->load->model('process');
		$result = $this->process->send_comment($comment);
		$acct_comment = $this->process->get_comment($comment['user_id']);
		$this->session->set_userdata('acct_comment', $acct_comment);
		redirect('/user-dashboard/users/show/'.$comment['user_id']);
	}
	    

}
