<?php

    class Notifications extends Controller {
        public function __construct() {
            $this->notificationModel = $this->model('Notification');
        }

        public function index() {
            $user_id = $_SESSION['user_id']; 
            $notifications = $this->notificationModel->getNotificationsByUser($user_id);
    
            $data = [
                'notifications' => $notifications
            ];
            $this->view('notifications/index', $data);
        }

        // create a new notification
        public function create($notification) {
            $this->notificationModel->createNotification($notification);
        }

        public function markAsRead($notification_id) {
            // Mark the notification as read
            $this->notificationModel->markNotificationAsRead($notification_id);
    
            // Redirect back to the notifications page or to the relevant page
            redirect('notifications/index');
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