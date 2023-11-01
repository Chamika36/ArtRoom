<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register user
        public function register($data) {
            $this->db->query('INSERT INTO user (FirstName, LastName, ContactNumber, Email, Password, UserTypeID, Specialization) VALUES(:firstName, :lastName, :contactNumber, :email, :password, :userType, :specialization)');
            // Bind values
            $this->db->bind(':firstName', $data['firstName']);
            $this->db->bind(':lastName', $data['lastName']);
            $this->db->bind(':contactNumber', $data['contactNumber']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':userType', $data['userType']);
            $this->db->bind(':specialization', $data['specialization']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM user WHERE email = :email');
            // Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function findUserByContactNumber($contactNumber) {
            $this->db->query('SELECT * FROM user WHERE ContactNumber = :contactNumber');
            // Bind value
            $this->db->bind(':contactNumber', $contactNumber);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // Login User
        public function login($email, $password) {
            $this->db->query('SELECT * FROM user WHERE Email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();
            $hashed_password = $row->Password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        // Edit user
        public function editUser($data) {
            $this->db->query('UPDATE user SET FirstName = :firstName, LastName = :lastName, ContactNumber = :contactNumber, Email = :email, UserTypeID = :userType, Specialization = :specialization WHERE UserID = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':firstName', $data['firstName']);
            $this->db->bind(':lastName', $data['lastName']);
            $this->db->bind(':contactNumber', $data['contactNumber']);
            $this->db->bind(':email', $data['email']);
            // $this->db->bind(':password', $data['password']);
            $this->db->bind(':userType', $data['userType']);
            $this->db->bind(':specialization', $data['specialization']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Delete user
        public function deleteUser($id) {
            $this->db->query('DELETE FROM user WHERE UserID = :id');
            // Bind values
            $this->db->bind(':id', $id);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Get all users
        public function getUsers() {
            $this->db->query('SELECT * FROM user');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get user by id
        public function getUserById($id) {
            $this->db->query('SELECT * FROM user WHERE UserID = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        // Get only customers
        public function getCustomers() {
            $this->db->query('SELECT * FROM user WHERE UserTypeID = 1');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get only photographers
        public function getPhotographers() {
            $this->db->query('SELECT * FROM user WHERE UserTypeID = 3');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get only printing firms
        public function getPrintingFirms() {
            $this->db->query('SELECT * FROM user WHERE UserTypeID = 5');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get only editors
        public function getEditors() {
            $this->db->query('SELECT * FROM user WHERE UserTypeID = 4');
            $results = $this->db->resultSet();
            return $results;
        }

    }