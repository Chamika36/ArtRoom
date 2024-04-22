<?php

class Notification {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to create a new notification
    public function createNotification($notification) {
        $user = $this->getUserById($notification['user_id']);
        $to = $user->Email;
        $subject = "New Notification from ArtRoom";
        if($notification['type'] == 'file'){
            $message = $notification['content'] . " " . $notification['link'];
        }else{
            $message = $notification['content'] . " " . URLROOT ."/". $notification['link'];
        }
        $headers = "From: ArtRoom <noreply@yourdomain.com>\r\n";
        $headers .= "Reply-To: noreply@yourdomain.com\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
    
        if (mail($to, $subject, $message)) {
            echo "Email sent successfully";
        } else {
            echo "Email sending failed";
        }

        $this->db->query('INSERT INTO notification (UserID , Type, Content, Link , EventID) VALUES (:user_id, :type, :content, :link, :event_id)');
        $this->db->bind(':user_id', $notification['user_id']);
        $this->db->bind(':type', $notification['type']);
        $this->db->bind(':content', $notification['content']);
        $this->db->bind(':link', $notification['link']);
        $this->db->bind(':event_id', $notification['event_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // get user by id
    public function getUserById($user_id) {
        $this->db->query('SELECT * FROM user WHERE UserID = :user_id');
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->single();
        return $result;
    }

    // get notifications
    public function getNotifications(){
        $this->db->query('SELECT * from notification where Status = "unread" ORDER BY NotificationID DESC');
        $result = $this->db->resultSet();
        return $result;
    }

    public function getNotificationCount(){
        $this->db->query('SELECT COUNT(*) AS count from notification where Status = "unread"');
        $result = $this->db->single();
        return $result->count;
    }

    public function markNotificationAsRead($notification_id){
        $this->db->query('UPDATE notification SET Status = "read" WHERE NotificationID = :notification_id');
        $this->db->bind(':notification_id', $notification_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getNotificationByManager(){
        // $this->db->query('SELECT * from notification where Status = "unread" AND (Type = "action" OR Type = "request" OR Type = "payment" OR Type = "reschedule") ORDER BY NotificationID DESC');
        $this->db->query('SELECT * from notification where Status = "unread" AND UserID = 16 ORDER BY NotificationID DESC');
        $result = $this->db->resultSet();
        return $result;
    }

    //get notification count ny manager
    public function getNotificationCountByManager(){
        $this->db->query('SELECT COUNT(*) AS count from notification where Status = "unread" AND UserID = 16 ORDER BY NotificationID DESC');
        $result = $this->db->single();
        return $result->count;
    }

    public function getNotificationsByUserId($user_id){
        $this->db->query('SELECT * from notification where UserID = :user_id ORDER BY NotificationID DESC');
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getUnreadNotificationCountByUserId($user_id){
        $this->db->query('SELECT COUNT(*) AS count from notification where Status = "unread" AND UserID = :user_id ');
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->single();
        return $result->count;
    }

}
