<?php
    class Package {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPackages() {
            $this->db->query('SELECT * FROM Package');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getPackageById($id) {
            $this->db->query('SELECT * FROM Package WHERE PackageID = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function addPackage($data) {
            $this->db->query('INSERT INTO Package (Name, Price, Description, ServicesIncluded) VALUES(:name, :price, :description, :servicesIncluded)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':servicesIncluded', $data['servicesIncluded']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function editPackage($data) {
            $this->db->query('UPDATE Package SET Name = :name, Price = :price, Description = :description, ServicesIncluded = :servicesIncluded WHERE PackageID = :id');

            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':servicesIncluded', $data['servicesIncluded']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deletePackage($id){
            $this->db->query('DELETE FROM Package WHERE PackageID = :id');
            // Bind values
            $this->db->bind(':id', $id);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getPackageByEvent($id) {
            $this->db->query('SELECT * FROM event WHERE PackageID = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

    }

}