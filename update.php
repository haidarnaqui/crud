<?php
 require "db.php";
 session_start();
 $id = $_GET['id'];
 $sql ="select* from user where id=$id";
 $res = $conn->query($sql);

 $r=$res->fetch_assoc();

 if(isset($_POST['update'])){

    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if(empty($name) || empty($phone) || empty($address)){
        echo 'some input are missing';
        header('refresh:2;url=update.php');
    }
    else
    {
        $sql = "update user set id=$id,name='$name',phone='$phone',address='$address' where id='$id'";
        $conn->query($sql);
        echo 'Record Updated';
        header("refresh:4;url=view.php");
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form action="" method="post">
        <div class="container mt-4 col-6">
            <div class="">
                <div class="mb-3 col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $r['name']; ?>" placeholder="Name" autocomplete="off">
                </div>
                <div class="mb-3 col-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $r['phone']; ?>" placeholder="Phone" autocomplete="off">
                </div>
                <div class="mb-3 col-6">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" cols="39" rows="2"placeholder="Address..."><?php echo $r['address']; ?></textarea>
                </div>
                <div class="col-6 d-grid gap-2">
                    <button class="btn btn-primary" name="update" id="update">Update Record</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>