document.addEventListener("DOMContentLoaded", function() {
    var notificationIcon = document.querySelector('.notification-icon');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    // Toggle dropdown menu when clicking on notification icon
    notificationIcon.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent the click event from bubbling up to the document
        console.log("clicked!");
        dropdownMenu.classList.toggle('show');
    });

    // Close dropdown menu when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!dropdownMenu.contains(event.target) && !notificationIcon.contains(event.target)) {
            console.log("clicked!");
            dropdownMenu.classList.remove('show');
        }
    });

    // Mark notification as read when clicked
    var notifications = document.querySelectorAll('.dropdown-menu a');
    notifications.forEach(function(notification) {
        notification.addEventListener('click', function(event) {
            console.log("clicked!");
            event.preventDefault(); // Prevent the default link behavior
            var notificationId = this.getAttribute('data-notification-id');
            console.log("Notification ID: " + notificationId + " clicked!");
            markNotificationAsRead(notificationId);
            window.location.href = this.href; // Redirect to the notification link
        });
    });

    function markNotificationAsRead(notificationId) {
        fetch(URLRoot + '/notifications/markAsRead/' + notificationId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => {
            if (response.ok) {
                console.log("Notification marked as read successfully");
            } else {
                console.error("Failed to mark notification as read");
            }
        })
        .catch(error => {
            console.error("Failed to make request: ", error);
        });
    }    
});
