<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{
    private $collection = 'users1'; // MongoDB collection name

    public function __construct()
    {
        parent::__construct();
    }

    // Insert a new user record
    public function insert_user($data)
    {
        // Load the MongoDB library here in the model
        $this->load->library('mongodb');

        // Insert the data into the specified collection
        $this->mongo_db->insert($this->collection, $data);

        // Check if the insert was successful (you may need to customize this logic)
        return $this->mongo_db->affected_rows() > 0;
    }


    // Get user by username
    public function get_user_by_username($username)
    {
        // Load the MongoDB library here in the model
        $this->load->library('mongodb');

        return $this->mongodb->where('username', $username)->get($this->collection)->row();
    }
}
