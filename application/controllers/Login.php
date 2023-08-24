<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Load your login form view here


        $this->load->view('templates/header');
        $this->load->view('login_form');
        $this->load->view('templates/footer');
    }

    public function login_user()
    {
        // Form validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, reload the login form with errors
            $this->load->view('templates/header');
            $this->load->view('login_form');
            $this->load->view('templates/footer');
        } else {
            // Validation successful, proceed with login
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Retrieve user from MongoDB
            $user = $this->user_model->get_user_by_username($username);


            if ($user && password_verify($password, $user->password)) {
                // Set user session and redirect to user controller
                $this->session->set_userdata('user_id', $user->_id);






                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect("/");
            } else {
                // Login failed, handle the error
                $this->session->set_flashdata('login_error', 'Wrong Username or Password. Please try again.');
                redirect("login");
            }
        }
    }
    public function logout()
    {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('login');
    }
}
