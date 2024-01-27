<?php
    class Payment{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function paymentSuccess($data){
            $this->db->query('INSERT INTO payment (EventID, CustomerID, Amount, Status) VALUES (:EventID, :CustomerID, :Amount, :Status)');
            $this->db->bind(':EventID', $data['EventID']);
            $this->db->bind(':Amount', $data['Amount']);
            $this->db->bind(':CustomerID', $data['CustomerID']);
            $this->db->bind(':Status', $data['Status']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }