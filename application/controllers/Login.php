<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index() {
        // Load your login form view here
        $this->load->view('login_form');
    }

    public function login_user() {
        // Form validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, reload the login form with errors
            $this->load->view('login_form');
        } else {
            // Validation successful, proceed with login
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->user_model->get_user_by_username($username);

            if ($user && password_verify($password, $user->password)) {
                // Login successful, set session or JWT token
                // Redirect to user dashboard or wherever you want
            } else {
                // Login failed, handle the error
            }
        }
    }
}
