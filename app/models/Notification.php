<?php

class Notification {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to create a new notification
    public function createNotification($notification) {
        $this->db->query('INSERT INTO notification (UserID , Type, Content, Link) VALUES (:user_id, :type, :content, :link)');
        $this->db->bind(':user_id', $notification['user_id']);
        $this->db->bind(':type', $notification['type']);
        $this->db->bind(':content', $notification['content']);
        $this->db->bind(':link', $notification['link']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get notifications
    public function getNotifications(){
        $this->db->query('SELECT * from notification where Status = "unread"');
        $result = $this->db->resultSet();
        return $result;
    }

    public function getNotificationCount(){
        $this->db->query('SELECT COUNT(*) AS count from notification where Status = "unread"');
        $result = $this->db->single();
        return $result->count;
    }
}

?>
