<?php

include 'db_connect.php';

if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `customers` WHERE `customers`.`c_no` = '$id'";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    header('location:updel.php');
    }
    else {
        echo "deletion is not successfull";
    }
}
 ?>