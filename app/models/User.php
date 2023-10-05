<?php
    class User {
        $private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register user
        public function register($data) {
            $this->db->query('INSERT INTO users (firstName, lastName, contactNumber, email, password, userType, specialization) VALUES(:firstName, :lastName, :contactNumber, :email, :password, :userType, :specialization)');
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
            $this->db->query('SELECT * FROM users WHERE email = :email');
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
    }