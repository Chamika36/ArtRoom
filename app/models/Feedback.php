<?php
    class Feedback{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function submitFeedback($data) {
            $this->db->query('INSERT INTO feedback (CustomerID , Feedback, Rating) VALUES (:user_id, :feedback, :rating)');
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
    }