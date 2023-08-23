<?php
defined('BASEPATH') or exit('No direct script access allowed');

defined('BASEPATH') or exit('No direct script access allowed');



class User_model extends CI_model
{

    private $database = 'UserInfo';
    private $collection = 'user';
    private $conn;

    function __construct()
    {
        parent::__construct();
        $this->load->library('mongodb');
        $this->conn = $this->mongodb->getConn();
    }

    function get_user_list()
    {
        try {
            $projection = ['name', 'email', 'gender', 'mobile'];

            $filter = [];
            $query = new MongoDB\Driver\Query($filter, ['projection' => $projection]);

            $result = $this->conn->executeQuery($this->database . '.' . $this->collection, $query);

            return $result;
        } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while fetching users: ' . $ex->getMessage(), 500);
        }
    }

    function get_user($_id)
    {
        try {
            $filter = ['_id' => new MongoDB\BSON\ObjectId($_id)];
            $query = new MongoDB\Driver\Query($filter);

            $result = $this->conn->executeQuery($this->database . '.' . $this->collection, $query);

            foreach ($result as $user) {
                return $user;
            }

            return NULL;
        } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while fetching user: ' . $ex->getMessage(), 500);
        }
    }

    function create_user($name, $email, $gender, $mobile)
    {
        try {
            $user = array(
                'name' => $name,
                'email' => $email,
                'gender' => $gender, // Add 'gender'
                'mobile' => $mobile // Add 'mobile'
            );

            $query = new MongoDB\Driver\BulkWrite();
            $query->insert($user);

            $result = $this->conn->executeBulkWrite($this->database . '.' . $this->collection, $query);

            if ($result == 1) {
                return TRUE;
            }

            return FALSE;
        } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while saving users: ' . $ex->getMessage(), 500);
        }
    }

    function update_user($_id, $name, $email, $gender, $mobile)
    {
        try {
            $query = new MongoDB\Driver\BulkWrite();
            $query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => array('name' => $name, 'email' => $email, 'gender' => $gender, 'mobile' => $mobile)]);

            $result = $this->conn->executeBulkWrite($this->database . '.' . $this->collection, $query);

            if ($result == 1) {
                return TRUE;
            }

            return FALSE;
        } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while updating users: ' . $ex->getMessage(), 500);
        }
    }

    function delete_user($_id)
    {
        try {
            $query = new MongoDB\Driver\BulkWrite();
            $query->delete(['_id' => new MongoDB\BSON\ObjectId($_id)]);

            $result = $this->conn->executeBulkWrite($this->database . '.' . $this->collection, $query);

            if ($result == 1) {
                return TRUE;
            }

            return FALSE;
        } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while deleting users: ' . $ex->getMessage(), 500);
        }
    }
    public function get_user_by_username($username)
    {
        try {
            $filter = ['username' => $username];
            $query = new MongoDB\Driver\Query($filter);

            $result = $this->conn->executeQuery($this->database . '.' . $this->collection, $query);

            foreach ($result as $user) {
                return $user;
            }

            return null;
        } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while fetching user: ' . $ex->getMessage(), 500);
        }
    }

    function register_user($name, $email, $username, $password)
    {
        try {
            $user = array(
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'password' => $password  // You should properly hash and store the password securely
            );

            // Define the collection name for user registration
            $collectionName = 'user_registration';

            // Check if the collection exists, and if not, create it
            $this->createCollectionIfNotExists($collectionName);

            $query = new MongoDB\Driver\BulkWrite();
            $query->insert($user);

            $result = $this->conn->executeBulkWrite($this->database . '.' . $collectionName, $query);

            if ($result == 1) {
                return TRUE;
            }

            return FALSE;
        } catch (MongoDB\Driver\Exception\RuntimeException $ex) {
            show_error('Error while saving users: ' . $ex->getMessage(), 500);
        }
    }

    // Function to create a collection if it doesn't exist
    // Function to create a collection if it doesn't exist
    private function createCollectionIfNotExists($collectionName)
    {
        $command = new MongoDB\Driver\Command([
            'create' => $collectionName,
        ]);

        try {
            $this->conn->executeCommand($this->database, $command);
        } catch (MongoDB\Driver\Exception\CommandException $ex) {
            // The collection may already exist, so we can ignore this error
            if ($ex->getCode() !== 48) {
                show_error('Error creating collection: ' . $ex->getMessage(), 500);
            }
        }
    }
}
