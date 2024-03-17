<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Test</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCFn8DBw+c+1et9E3BayTZq7/9yg3Dh5X+q5mjD6W8T5fK/wLXG" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="notification-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
        <!-- Toast notifications will be inserted here -->
    </div>

    <!-- Add the provided JavaScript code -->
    <script src="../public/js/notification.js"></script>
</body>

</html>