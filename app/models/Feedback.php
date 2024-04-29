<?php
    class Feedback{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function submitFeedback($data) {
            $this->db->query('INSERT INTO feedback (CustomerID , Comment , Rating) VALUES (:user_id, :feedback, :rating)');
            $this->db->bind(':feedback', $data['feedback']);
            $this->db->bind(':rating', $data['rating']);
            $this->db->bind(':user_id', $data['user_id']);

            if($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function getFeedbacks() {
            $this->db->query('SELECT * FROM feedback');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getTopFeedbacks() {
            $this->db->query('SELECT * FROM feedback ORDER BY Rating DESC LIMIT 3');
            $results = $this->db->resultSet();
            return $results;
        }
    }