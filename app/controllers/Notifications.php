<?php

    class Notifications extends Controller {
        public function __construct() {
            $this->notificationModel = $this->model('Notification');
            $this->userModel = $this->model('User');
        }

        public function index() {
            $user_id = $_SESSION['user_id']; 
            $notifications = $this->notificationModel->getNotificationsByUserId($user_id);
    
            $data = [
                'notifications' => $notifications
            ];
            $this->view('notifications/index', $data);
        }

        // create a new notification
        public function create($notification) {
            $to = "chamikamadhushan36ugc@gmail.com";
            $subject = "New Notification";
            $message = $notification['content'] . " " . $notification['link'];
            $headers = "From: ArtRoom <noreply@yourdomain.com>\r\n";
            $headers .= "Reply-To: noreply@yourdomain.com\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
        
            if (mail($to, $subject, $message)) {
                echo "Email sent successfully";
            } else {
                echo "Email sending failed";
            }
            $this->notificationModel->createNotification($notification);
        }
        

        public function markAsRead($notification_id) {
            // Mark the notification as read
            if($this->notificationModel->markNotificationAsRead($notification_id)){
                return true;
            } else {
                return false;
            }

        }

        public function markAllAsRead() {
            // Mark all notifications as read
            $this->notificationModel->markAllNotificationsAsRead();
    
            // Redirect back to the notifications page or to the relevant page
            redirect('notifications/index');
        }

        public function delete($notification_id) {
            // Delete the notification
            $this->notificationModel->deleteNotification($notification_id);
    
            // Redirect back to the notifications page or to the relevant page
            redirect('notifications/index');
        }

        public function deleteAll() {
            // Delete all notifications
            $this->notificationModel->deleteAllNotifications();
    
            // Redirect back to the notifications page or to the relevant page
            redirect('notifications/index');
        }


    }