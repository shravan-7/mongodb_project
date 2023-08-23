<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        // Load your registration form view here
        $this->load->view('register_form');
    }

    public function register_user() {
        // Form validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
    
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, reload the registration form with errors
            $this->load->view('register_form');
        } else {
            // Validation successful, proceed with registration
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    
            if ($this->User_model->register_user($name, $email, $username, $password)) {
                // Registration successful, redirect to login page
                redirect('login');
            } else {
                // Registration failed, handle the error
                redirect('about');
            }
        }
    }
    
}
