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
            $this->db->query('INSERT INTO Sample (SampleName, ImagePath, Description, CustomerID, Date) VALUES (:name, :imagePath, :description, :customer, :date)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':imagePath', $data['imagePath']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':customer', $data['customer']);
            $this->db->bind(':date', $data['date']);

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
        public function updateSample($data){
            $this->db->query('UPDATE Sample SET SampleName = :name, ImagePath = :imagePath, Description = :description, Date = :date WHERE SampleID = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':imagePath', $data['imagePath']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':date', $data['date']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }