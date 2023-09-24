<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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
                    <label for="emailid" class="form-label">Email ID</label>
                    <input type="text" class="form-control" id="emailid" name="email" placeholder="emailId" autocomplete="off">
                </div>
                <div class="mb-3 col-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="pwd" placeholder="password" autocomplete="off">
                </div>
                <div class="mb-3 col-6">
                    <label for="Confirmpassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Confirmpassword" name="cpwd" placeholder="password" autocomplete="off">
                </div>
                <div class="col-6 d-grid gap-2">
                    <button class="btn btn-primary" name="register" id="register">SignUp</button>
                </div>
                <p class="mt-2">Not a Member <a href="index.php">Login Now</a></p>
            </div>
        </div>
    </form>
</body>
 <?php 
   require "db.php";

   if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $cpassword = $_POST['cpwd'];

    $sql="select *from register where username = '$username' || password='$password'";
    $res = $conn->query($sql);
    
    if($res->fetch_assoc()){
        echo "$username or $password already exist";
        header( "refresh:3;url=register.php");
    }else if($password!=$cpassword){
        echo "Password and Confirm Password does not match";
        header( "refresh:3;url=register.php");
    }
    else{
        $sql = "insert into register (username,email,password) values('$username','$email','$cpassword')";
        $conn->query($sql);
        echo 'Record Insertd';
        header( "refresh:2;url=index.php");
    }

   }
 ?>
</html>