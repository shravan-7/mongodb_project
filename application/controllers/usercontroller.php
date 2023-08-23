<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('usermodel');
		$this->load->library('form_validation'); // Load the form_validation library
	}

	function index()
	{
		$data['users'] = $this->usermodel->get_user_list();

		$this->load->view('templates/header');
		$this->load->view('users', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{

		if ($this->input->post('submit')) {
			// Set form validation rules
			$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|valid_email|required');
			$this->form_validation->set_rules('gender', 'Gender', 'required'); // Add validation rule for gender
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric'); // Add validation rule for mobile number

			if ($this->form_validation->run() !== FALSE) {
				$result = $this->usermodel->create_user(
					$this->input->post('name'),
					$this->input->post('email'),
					$this->input->post('gender'),
					$this->input->post('mobile')
				);
				if ($result === TRUE) {
					redirect('/');
				} else {
					$data['error'] = 'Error occurred during saving data';
					$this->load->view('user_create', $data);
				}
			} else {
				$data['error'] = 'Error occurred during saving data: all fields are required';
				$this->load->view('user_create', $data);
			}
		} else {
			$this->load->view('user_create');
		}
	}

	public function update($_id)
	{

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|valid_email|required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric');

			if ($this->form_validation->run() !== FALSE) {
				$result = $this->usermodel->update_user(
					$_id,
					$this->input->post('name'),
					$this->input->post('email'),
					$this->input->post('gender'), // Add gender
					$this->input->post('mobile') // Add mobile
				);

				if ($result === TRUE) {
					redirect('/');
				} else {
					$data['error'] = 'Error occurred during updating data';
					$this->load->view('user_update', $data);
				}
			} else {
				$data['error'] = 'Error occurred during saving data: all fields are mandatory';
				$this->load->view('user_update', $data);
			}
		} else {
			$data['user'] = $this->usermodel->get_user($_id);
			$this->load->view('user_update', $data);
		}
	}

	function delete($_id)
	{
		if ($_id) {
			$this->usermodel->delete_user($_id);
		}
		redirect('/');
	}
}
