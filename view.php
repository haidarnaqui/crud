<?php
 session_start();
 if(empty($_SESSION))
 {
   header("Location:index.php");
 }
 else
 {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <form action="" method="post">
        <div class="container text-end">
            <button class="btn btn-danger my-3">
                <a class="text-light" href="logout.php">Logout</a>
            </button>
            <button class="btn btn-primary my-3">
                <a class="text-light" href="insert.php">Add New Record</a>
            </button>
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "db.php";
                    
                    $sql = "select *from user";
                    $res = $conn->query($sql);
                    while ($r = $res->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['name']; ?></td>
                            <td><?php echo $r['phone']; ?></td>
                            <td><?php echo $r['address']; ?></td>
                            <td>
                                <button class="btn btn-primary"><a href="update.php?id=<?php echo $r['id']; ?>" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="delete.php?id=<?php echo $r['id']; ?>" class="text-light">Delete</a></button>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </form>
</body>

</html>
<?php } ?>