
<?php
session_start();
include 'db_conn.php';
if(isset($_POST['submit']))
{
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $id = $_POST['id'];
    $image= $_FILES['image']['naam'];
    $filenaam = $_FILES['image']['name'];
    $tempnaam = $_FILES['image']['tmp_name'];
    $sql="update info set naam='$naam',email='$email',phone='$phone',address='$address',image='$filenaam' where id='$id'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        $folder = "upload/".$filenaam;
        move_uploaded_file($tempnaam,$folder);
        header("location:index2.php?");
        echo "Image Uploaded successfully";
    }
    else
    {
        header("location:index.php?");
        echo "Image failed to upload";
    }
}
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form class="" action="" method="post" enctype="multipart/form-data">
        <h1>Edit Info</h1>
        <?php
        $id = $_GET['id'];
 //      echo $id;
//        die;
        $sql = "select * from info where id=$id";
        $result=mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($result);
        ?>
        <input type="text" name="naam" value="<?php echo $row['naam']?>">
        <input type="email" name="email" value="<?php echo $row['email']?>">
        <input type="tel" name="phone" value="<?php echo $row['phone']?>">
        <input type="text" name="address" value="<?php echo $row['address']?>">
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
        <input type="file" name="image" >

        <div class="btn-box">
            <button type="submit" name="submit" id="next1">Submit</button>
            <!--              <a href="index2.php" ></a>-->
            <a href="index2.php" class="btn-box">Cancel</a>
            <!--          <button type="button" id="cancel">Cancel</button>-->
        </div>
    </form>

</div>


</body>
</html>
