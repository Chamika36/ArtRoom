<?php
    class Event{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // request event
        public function requestEvent($data) {
            $this->db->query('INSERT INTO Event (EventDate, StartTime, EndTime, CustomerID, Location, RequestedPhotographer, PackageID, AdditionalRequests, FullAmount, Status) VALUES (:date, :startTime, :endTime, :customer, :location, :requestedPhotographer, :package, :additionalRequests, :budget, "Pencil")');
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':startTime', $data['startTime']);
            $this->db->bind(':endTime', $data['endTime']);
            $this->db->bind(':customer', $data['customer']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':requestedPhotographer', $data['requestedPhotographer']);
            $this->db->bind(':package', $data['package']);
            $this->db->bind(':additionalRequests', $data['additionalRequests']);
            $this->db->bind(':budget', $data['budget']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
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

        // Get all events of a customer
        public function getEventsByCustomer($id) {
            $this->db->query('SELECT * FROM Event WHERE CustomerID = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        // Get all requests of a customer
        public function getRequestsByCustomer($id) {
            $this->db->query('SELECT * FROM Event WHERE CustomerID = :id AND Status = "Pencil"');
            $this->db->bind(':id', $id);
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
            $this->db->bind(':photographer', $data['photographer']); 
            $this->db->bind(':editor', $data['editor']);
            $this->db->bind(':printingFirm', $data['printingFirm']);
            $this->db->bind(':eventID', $data['eventID']);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // delete request
        public function deleteRequest($id) {
            $this->db->query('DELETE FROM Event WHERE EventID = :id');
            $this->db->bind(':id', $id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
    }