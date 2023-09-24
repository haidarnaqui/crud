<?php
require "db.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "delete from user where id='$id'";
    $res = $conn->query($sql);
    if ($res) {
        echo "Record Deleted";
        header("refresh:5;url=view.php");
    } else {
        die(mysqli_error($conn));
    }
}
