<div class="container">
    <?php
    session_start();
    if (empty($_SESSION)) {
        header('location:index.php');
    } else {
        echo "<br>Welcome  : <b>" . strtoupper($_SESSION['username']) . "</b>";
    ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="text-align: right;">
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
    <div class="container" style="position: relative;top: -62px;left:34%;">
        <a class="btn btn-secondary" href="view.php">User Management System</a>
    </div>
</body>

</html>
<?php } ?>