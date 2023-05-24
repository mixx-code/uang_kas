<?php
if (isset($_POST)) {
    // echo "<meta http-equiv='refresh' content='0; url= ./Dashboard_admin/dashboard_admin.php?page=dashboard'>";
    echo "<script>window.location = './Dashboard_admin/dashboard_admin.php?page=dashboard'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Login</h1>
            <input type="text" placeholder="Username">
            <input type="text" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>