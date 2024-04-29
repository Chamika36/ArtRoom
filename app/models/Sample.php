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

        public function getTopsamples(){
            $this->db->query('SELECT * FROM Sample WHERE Visibility = 1 ORDER BY SampleID ASC LIMIT 3'); 
            $results = $this->db->resultSet();
            return $results;
        }

        public function getVisibleSamples(){
            $this->db->query('SELECT * FROM Sample WHERE Visibility = 1');
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
            $this->db->query('INSERT INTO Sample (SampleName, ImagePath, CoverImagePath, Description, CustomerID, PhotographerID, Date) VALUES (:name, :imagePath, :coverImagePath, :description, :customer, :photographer, :date)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':imagePath', $data['imagePath']); // Assuming this is the path of the uploaded image file
            $this->db->bind(':coverImagePath', $data['coverImagePath']); // Assuming this is the path of the cover image file
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':customer', $data['customer']);
            $this->db->bind(':photographer', $data['photographer']);
            $this->db->bind(':date', $data['date']);
            
            // Execute the query
            if($this->db->execute()) {
                return $this->db->lastInsertId();
            } else {
                return false;
            }
        }

        // view Sample
        public function viewSample($id) {
            $this->db->query('SELECT * FROM Sample WHERE SampleID = :id');
            // Bind values
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
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
            $this->db->query('UPDATE Sample SET SampleName = :name, ImagePath = :imagePath, CoverImagePath = :coverImagePath, Description = :description, CustomerID = :customer, PhotographerID = :photographer, Date = :date WHERE SampleID = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':imagePath', $data['imagePath']);
            $this->db->bind(':coverImagePath', $data['coverImagePath']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':customer', $data['customer']);
            $this->db->bind(':photographer', $data['photographer']);
            $this->db->bind(':date', $data['date']);

            // Execute the query
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        
        public function getSamplesByPhotographer($id) {
            $this->db->query('SELECT * FROM Sample WHERE PhotographerID = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getLastInsertedSample() {
            $this->db->query('SELECT * FROM Sample ORDER BY SampleID DESC LIMIT 1');
            $row = $this->db->single();
            return $row;
        }

        public function updateVisibility($id , $visibility) {
            $this->db->query('UPDATE Sample SET Visibility = :visibility WHERE SampleID = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':visibility', $visibility);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }