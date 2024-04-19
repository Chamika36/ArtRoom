<?php
    class Sample{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getSamples() {
            $this->db->query('SELECT * FROM Sample');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getSampleById($id) {
            $this->db->query('SELECT * FROM Sample WHERE SampleID = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function addSample($data) {
            $this->db->query('INSERT INTO Sample (SampleName, ImagePath, CoverImagePath, Description, CustomerID, Date) VALUES (:name, :imagePath, :coverImagePath, :description, :customer, :date)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':imagePath', $data['imagePath']); // Assuming this is the path of the uploaded image file
            $this->db->bind(':coverImagePath', $data['coverImagePath']); // Assuming this is the path of the cover image file
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':customer', $data['customer']);
            $this->db->bind(':date', $data['date']);
            
            // Execute the query
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        

        // Delete Sample
        public function deleteSample($id){
            $this->db->query('DELETE FROM Sample WHERE SampleID = :id');
            // Bind values
            $this->db->bind(':id', $id);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Update Sample
        public function updateSample($data) {
            $this->db->query('UPDATE Sample SET SampleName = :name, ImagePath = :imagePath, CoverImagePath = :coverImagePath, Description = :description, Date = :date WHERE SampleID = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':imagePath', $data['imagePath']);
            $this->db->bind(':coverImagePath', $data['coverImagePath']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':date', $data['date']);
        
            // Execute the query
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        

    }