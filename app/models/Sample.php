<?php

require_once '../app/init.php';

class Sample {
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
        if ($row) {
            return $row;
        } else {
            return null; // Or any default value you prefer
        }
    }

    public function addSample($data) {
        $this->db->beginTransaction();
        try {
            $this->db->query('INSERT INTO Sample (SampleName, ImagePath, Description, CustomerID, Date) VALUES (:name, :imagePath, :description, :customer, :date)');
    
            // Check if $data['imagePath'] is an array
            if (is_array($data['imagePath'])) {
                // Loop through each uploaded file
                foreach ($data['imagePath'] as $image) {
                    // Generate unique filename
                    $fileName = uniqid() . '_' . $image['name'];
                    // Move uploaded file to desired folder
                    move_uploaded_file($image['tmp_name'], '../public/images/sample/' . $fileName);
                    // Bind values
                    $this->db->bind(':name', $data['name']);
                    $this->db->bind(':imagePath', $fileName);
                    $this->db->bind(':description', $data['description']);
                    $this->db->bind(':customer', $data['customer']);
                    $this->db->bind(':date', $data['date']);
                    // Execute query for each image
                    $this->db->execute();
                }
            } else {
                // Handle the case where only one file is uploaded
                $fileName = uniqid() . '_' . $data['imagePath']['name'];
                move_uploaded_file($data['imagePath']['tmp_name'], '../public/images/sample/' . $fileName);
                // Bind values
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':imagePath', $fileName);
                $this->db->bind(':description', $data['description']);
                $this->db->bind(':customer', $data['customer']);
                $this->db->bind(':date', $data['date']);
                // Execute query for single image
                $this->db->execute();
            }
    
            $this->db->commit();
            return true;
        } catch (\PDOException $e) { // Corrected to \PDOException
            // Rollback if any exception occurs
            $this->db->rollBack();
            return false;
        }
    }

    // Delete Sample
    public function deleteSample($id) {
        $this->db->query('DELETE FROM Sample WHERE SampleID = :id');
        // Bind values
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update Sample
    public function updateSample($data) {
        $this->db->query('UPDATE Sample SET SampleName = :name, ImagePath = :imagePath, Description = :description, Date = :date WHERE SampleID = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':imagePath', $data['imagePath']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':date', $data['date']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
