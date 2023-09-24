<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <form action="" method="post">
        <div class="container mt-4 col-6">
            <div class="">
                <div class="mb-3 col-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="username" autocomplete="off">
                </div>
                <div class="mb-3 col-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" autocomplete="off">
                </div>
                <div class="col-6 d-grid gap-2">
                    <button class="btn btn-primary" name="login" id="login">Login</button>
                </div>
                <p class="mt-2">Not a Member <a href="register.php">SignUp Now</a></p>
            </div>
        </div>
    </form>
</body>
<?php
 require "db.php";
 session_start();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql= "select *from register where username='$username' && password='$password'";
    $res=$conn->query($sql);
    if($res->fetch_assoc()){
        $_SESSION['username'] = $username;
        header("location:dashboard.php");
    }else{
        echo "Username & Password Does  not match";
        header("refresh:5;index.php");
    }
}
?>
</html>