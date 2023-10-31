<?php
    class Event{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getEvents() {
            $this->db->query('SELECT * FROM Event where Status = "Approved"');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getRequests() {
            $this->db->query('SELECT * FROM Event where Status = "Pencil"');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getEventById($id) {
            $this->db->query('SELECT * FROM Event WHERE EventID = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }
    }