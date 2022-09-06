<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$id = $_GET['id'];
//echo $id;die;
$sql= "delete from info where id=$id";
$result = mysqli_query($conn,$sql);
//echo "<pre>";
//print_r($result);
//die;
if($result)
{
       header("location: index2.php?msg= record deleted successfullly");
    }
    else{
        echo"failed:".mysqli_error($conn);
    }
?>