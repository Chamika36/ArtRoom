<?php
    class Partner{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // photographer action
        public function updatePhotographerAction($event_id, $action , $comment) {
            $this->db->query('UPDATE photographeraction SET Action = :action, Comment = :comment WHERE EventID = :id');
            $this->db->bind(':id', $event_id);
            $this->db->bind(':action', $action);
            $this->db->bind(':comment', $comment);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // editor action
        public function updateEditorAction($event_id, $action , $comment) {
            $this->db->query('UPDATE editoraction SET Action = :action, Comment = :comment WHERE EventID = :id');
            $this->db->bind(':id', $event_id);
            $this->db->bind(':action', $action);
            $this->db->bind(':comment', $comment);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // printing firm action
        public function updatePrintingFirmAction($event_id, $action , $comment) {
            $this->db->query('UPDATE printingfirmaction SET Action = :action, Comment = :comment WHERE EventID = :id');
            $this->db->bind(':id', $event_id);
            $this->db->bind(':action', $action);
            $this->db->bind(':comment', $comment);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // get photographer action
        public function getPhotographerAction($event_id) {
            $this->db->query('SELECT * FROM photographeraction WHERE EventID = :id ORDER BY ActionDateTime DESC LIMIT 1');
            $this->db->bind(':id', $event_id);

            $row = $this->db->single();

            return $row;
        }

        // get editor action
        public function getEditorAction($event_id) {
            $this->db->query('SELECT * FROM editoraction WHERE EventID = :id ORDER BY ActionDateTime DESC LIMIT 1');
            $this->db->bind(':id', $event_id);

            $row = $this->db->single();

            return $row;
        }

        // get printing firm action
        public function getPrintingFirmAction($event_id) {
            $this->db->query('SELECT * FROM printingfirmaction WHERE EventID = :id ORDER BY ActionDateTime DESC LIMIT 1');
            $this->db->bind(':id', $event_id);

            $row = $this->db->single();

            return $row;
        }

        // get events for a selected date
        public function getEvents($date) {
            $this->db->query('SELECT PhotographerID FROM event WHERE EventDate = :date');
            $this->db->bind(':date', $date);

            $results = $this->db->resultSet();

            return $results;
        }

        // get all events
        public function getAllEvents() {
            $this->db->query("SELECT PhotographerID FROM event WHERE EventDate = '2024-01-31'");
        
            $results = $this->db->resultSet();
        
            return $results;
        }
        

        // get available photographers for a given date
        public function getAvailablePartners($user_type_id, $date) {
            switch ($user_type_id) {
                case 3:
                    $this->db->query('SELECT * FROM user WHERE UserTypeID = :user_type_id AND UserID NOT IN (SELECT PhotographerID FROM event WHERE EventDate = :date AND PhotographerID IS NOT NULL)');
                    break;
                case 4:
                    $this->db->query('SELECT * FROM user WHERE UserTypeID = :user_type_id AND UserID NOT IN (SELECT EditorID FROM event WHERE EventDate = :date AND EditorID IS NOT NULL)');
                    break;
                case 5:
                    $this->db->query('SELECT * FROM user WHERE UserTypeID = :user_type_id AND UserID NOT IN (SELECT PrintingFirmID FROM event WHERE EventDate = :date AND PrintingFirmID IS NOT NULL)');
                    break;
            }
    
            $this->db->bind(':date', $date);
            $this->db->bind(':user_type_id', $user_type_id);
            $results = $this->db->resultSet();

            return $results;
        }

        // edit bio
        public function editBio($id, $bio) {
            $this->db->query('UPDATE user SET Bio = :bio WHERE UserID = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':bio', $bio);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function editPartner($data) {
            $this->db->query('UPDATE user SET FirstName = :FirstName, LastName = :LastName, Bio = :Bio WHERE UserID = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':FirstName', $data['FirstName']);
            $this->db->bind(':LastName', $data['LastName']);
            $this->db->bind(':Bio', $data['Bio']);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // update profile picture
        public function updateProfilePicture($userId, $imageData) {
            $this->db->query('UPDATE user SET ProfilePicture = :imageData WHERE UserID = :userId');
            $this->db->bind(':userId', $userId);
            $this->db->bind(':imageData', $imageData);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        

    }