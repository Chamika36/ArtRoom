<?php
    class Event{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getEvents() {
            $this->db->query('SELECT * FROM Event where Status != "Pencil"');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getRequests() {
            $this->db->query('SELECT * FROM Event where Status = "Pencil"');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get event count
        public function getEventCount() {
            $this->db->query('SELECT COUNT(*) FROM Event where Status <> "Pencil"');
            $results = $this->db->resultSet();
            return $results;
        }

        // Get request count
        public function getRequestCount() {
            $this->db->query('SELECT COUNT(*) FROM Event where Status = "Pencil"');
            $results = $this->db->resultSet();
            return $results;
        }


        public function getEventById($id) {
            $this->db->query('SELECT * FROM Event WHERE EventID = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        // Allocate partners to an event
        public function allocatePartners($data) {
            $this->db->query('UPDATE Event SET PhotographerID = :photographer, EditorID = :editor, PrintingFirmID = :printingFirm WHERE EventID = :eventID');
            $this->db->bind(':photographer', $data['photographer']); // Corrected typo
            $this->db->bind(':editor', $data['editor']);
            $this->db->bind(':printingFirm', $data['printingFirm']);
            $this->db->bind(':eventID', $data['eventID']);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
    }