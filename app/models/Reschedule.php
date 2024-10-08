<?php
    class Reschedule {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function reschedule($data){
            $this->db->query('INSERT INTO reschedule (EventID, NewEventDate, NewStartTime, NewEndTime, NewLocation, Reason)   VALUES ( :id, :date, :startTime, :endTime, :location, :reason)');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':startTime', $data['startTime']);
            $this->db->bind(':endTime', $data['endTime']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':reason', $data['reason']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getReschedules(){
            $this->db->query('SELECT * FROM reschedule ORDER BY ID DESC');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getRescheduleCount(){
            $this->db->query('SELECT COUNT(*) AS Count FROM reschedule WHERE ApprovalStatus <> "Approved" AND ApprovalStatus <> "Rejected"');
            $result = $this->db->single();
            return $result->Count;
        }

        public function getRescheduleByID($id){
            $this->db->query('SELECT * FROM reschedule WHERE ID=:id');
            $this->db->bind(':id', $id);

            $result = $this->db->single();

            return $result;
        }

        public function getReschedulesForPartner($id){
            $this->db->query('SELECT * FROM reschedule R, event E WHERE R.EventID = E.EventID AND E.PhotographerID=:id');
            $this->db->bind(':id', $id);

            $result = $this->db->resultSet();

            return $result;
        }

        public function getRescheduleCountByPartner($id){
            $this->db->query('SELECT COUNT(*) AS Count FROM reschedule R, event E WHERE R.EventID = E.EventID AND E.PhotographerID=:id AND R.ApprovalStatus = "Pending"');
            $this->db->bind(':id', $id);

            $result = $this->db->single();

            return $result->Count;
        }


        public function updateStatus($id, $status){
            $this->db->query('UPDATE reschedule SET ApprovalStatus = :status WHERE ID = :id');
            $this->db->bind(':id' , $id);
            $this->db->bind(':status' , $status);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function confirmReschedule($eventID, $reschedule){
            $this->db->query('UPDATE event SET EventDate = :date, StartTime = :startTime, EndTime = :endTime, Location = :location WHERE EventID = :id');
            $this->db->bind(':id' , $eventID);
            $this->db->bind(':date' , $reschedule->NewEventDate);
            $this->db->bind(':startTime' , $reschedule->NewStartTime);
            $this->db->bind(':endTime' , $reschedule->NewEndTime);
            $this->db->bind(':location' , $reschedule->NewLocation);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getRescheduleByEventID($id){
            $this->db->query('SELECT * FROM reschedule WHERE EventID=:id');
            $this->db->bind(':id', $id);

            $result = $this->db->single();

            return $result;
        }

        // delete reschedule
        public function deleteReschedule($id){
            $this->db->query('DELETE FROM reschedule WHERE ID = :id');
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }