<?php
    class Event{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // request event
        public function requestEvent($data) {
            $this->db->query('INSERT INTO Event (EventDate, StartTime, EndTime, CustomerID, Location, RequestedPhotographer, PackageID, SelectedExtras, TotalBudget, AdditionalRequests, Status) VALUES (:date, :startTime, :endTime, :customer, :location, :requestedPhotographer, :package, :selectedExtras, :totalBudget, :additionalRequests, "Pencil")');
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':startTime', $data['startTime']);
            $this->db->bind(':endTime', $data['endTime']);
            $this->db->bind(':customer', $data['customer']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':requestedPhotographer', $data['requestedPhotographer']);
            $this->db->bind(':package', $data['package']);
            $this->db->bind(':selectedExtras', $data['selectedExtras']); // Convert to JSON string
            $this->db->bind(':totalBudget', $data['totalBudget']);
            $this->db->bind(':additionalRequests', $data['additionalRequests']);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        

        // reschedule event
        public function rescheduleEvent($data) {
            $this->db->query('UPDATE Event SET EventDate = :date, StartTime = :startTime, EndTime = :endTime, Location = :location, Status = "Pencil" WHERE EventID = :eventID');
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':startTime', $data['startTime']);
            $this->db->bind(':endTime', $data['endTime']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':eventID', $data['id']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // get all events
        public function getAllEvents() {
            $this->db->query('SELECT * FROM Event');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getLastFiveEvents() {
            $this->db->query('SELECT * FROM Event ORDER BY EventDate DESC LIMIT 5');
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

        //Get events by partner
        public function getEventsByPartner($id) {
            $this->db->query('SELECT * FROM Event WHERE PhotographerID = :id OR EditorID = :id OR PrintingFirmID = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        // Get event count
        public function getEventCount() {
            $this->db->query('SELECT COUNT(*) AS count FROM Event WHERE Status <> "Pencil"');
            $result = $this->db->single();
            
            // Access the count value using the alias "count"
            return $result->count;
        }

        // Get request count
        public function getRequestCount() {
            $this->db->query('SELECT COUNT(*) AS count FROM Event WHERE Status = "Pencil"');
            $result = $this->db->single();
            
            // Access the count value using the alias "count"
            return $result->count;
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

        // Event Actions
        public function photographerAction($data){
            $this->db->query('INSERT INTO photographeraction (PhotographerID, EventID) VALUES (:photographer, :eventID)');
            $this->db->bind(':photographer', $data['photographer']);
            $this->db->bind(':eventID', $data['eventID']);
            
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function editorAction($data){
            $this->db->query('INSERT INTO editoraction (EditorID, EventID) VALUES (:editor, :eventID)');
            $this->db->bind(':editor', $data['editor']);
            $this->db->bind(':eventID', $data['eventID']);
            
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function printingFirmAction($data){
            $this->db->query('INSERT INTO printingfirmaction (PrintingFirmID, EventID) VALUES (:printingFirm, :eventID)');
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

        // update event status as accepted
        public function acceptEvent($id) {
            $this->db->query('UPDATE Event SET Status = "Accepted" WHERE EventID = :id');
            $this->db->bind(':id', $id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // update event status as canceled
        public function declineEvent($id) {
            $this->db->query('UPDATE Event SET Status = "Canceled" WHERE EventID = :id');
            $this->db->bind(':id', $id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }