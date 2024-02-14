document.addEventListener("DOMContentLoaded", function() {
    var notificationIcon = document.querySelector('.notification-icon');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    // Toggle dropdown menu when clicking on notification icon
    notificationIcon.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent the click event from bubbling up to the document
        dropdownMenu.classList.toggle('show');
        
        // Update notification status when dropdown is shown
        if (dropdownMenu.classList.contains('show')) {
            markNotificationsAsRead();
        }
    });

    // Function to mark notifications as read
    function markNotificationsAsRead() {
        // Make an AJAX request to update notification status
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo URLROOT ?>/notifications/markAsRead', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Notification status updated successfully
                    // You can update the UI to reflect the change if needed
                } else {
                    // Error handling
                    console.error('Failed to update notification status');
                }
            }
        };
        xhr.send();
    }

    // Close dropdown menu when clicking outside of it
    document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && !notificationIcon.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });