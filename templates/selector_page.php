<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/selector.css">
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

    <title>Register | Ashesi•Unified</title>
</head>
<body>
<div class="container">
        <h1>ASHESI UNIFIED </h1>
        <h2>Choose your role</h2>
        </div>

    <div class="containerx">
        <input type="radio" name="radio" id="opt1"  onclick="redirectToStudent()">
        <label for="opt1" class="label1">
            <span>STUDENT</span>
        </label>
        <input type="radio" name="radio" id="opt2" onclick="redirectToStaff()">
        <label for="opt2" class="label2">
            <span>STAFF</span>
        </label>
    </div>
    <script>
    function redirectToStudent() {
        window.location.href = '../templates/Registerstudent.php';
    }

    function redirectToStaff() {
        window.location.href = '../templates/Registerstaff.php';
    }
</script>
</body>
</html>
