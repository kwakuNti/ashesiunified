<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/selector.css">
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
