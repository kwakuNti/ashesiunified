$(document).ready(function() {
    // Function to fetch notifications from the server
    function fetchNotifications() {
        $.ajax({
            url: '../includes/getnotifications.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {
                    // Display each notification as a toast
                    response.forEach(function(notification) {
                        displayToast(notification);
                    });
                }
            }
        });
    }

    // Function to display toast notification
    function displayToast(notification) {
        var toast = $('<div class="toast">' + notification.message + '</div>');
        $('#notification-container').append(toast);

        // Remove the toast after a few seconds
        setTimeout(function() {
            toast.fadeOut(300, function() {
                $(this).remove();
            });
        }, 5000); // Adjust the duration as needed
    }

    // Periodically fetch new notifications every 5 seconds
    setInterval(fetchNotifications, 5000);
});