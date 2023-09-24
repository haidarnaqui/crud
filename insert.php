<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form action="" method="post">
        <div class="container mt-4 col-6">
            <div class="">
                <div class="mb-3 col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="off">
                </div>
                <div class="mb-3 col-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                </div>
                <div class="mb-3 col-6">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" cols="39" rows="2"placeholder="Address..."></textarea>
                </div>
                <div class="col-6 d-grid gap-2">
                    <button class="btn btn-primary" name="submit" id="submit">Add New Record</button>
                </div>
            </div>
        </div>
    </form>
</body>
<?php
 require "db.php";
 session_start();

 if(isset($_POST['submit'])){

    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if(empty($name) || empty($phone) || empty($address)){
        echo 'some input are missing';
        header('refresh:2;url=insert.php');
    }
    else
    {
        $sql = "insert into user (name,phone,address) values('$name','$phone','$address')";
        $conn->query($sql);
        echo 'New Record Inserted';
        header("refresh:4;url=view.php");
    }
 }
?>
</html>