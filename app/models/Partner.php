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
    }