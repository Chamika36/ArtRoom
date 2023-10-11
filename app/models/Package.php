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

    }