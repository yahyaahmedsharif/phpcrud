
<?php

$servernaam = "localhost";
$usernaam = "root";
$password = "";
$dbnaam = "php";
$conn = mysqli_connect($servernaam,$usernaam,$password,$dbnaam);
//$status = $statusMsg = '';
if(isset($_POST['submit']))
{
//    $status = 'error';
//    if(!empty($_FILES["image"]["naam"])) {
//        // Get file info
//        $filenaam = basenaam($_FILES["image"]["naam"]);
//        $fileType = pathinfo($filenaam, PATHINFO_EXTENSION);
//
//        // Allow certain file formats
//        $allowTypes = array('jpg','png','jpeg','gif');
//        if(in_array($fileType, $allowTypes)){
//            $image = $_FILES['image']['tmp_naam'];
//            $imgContent = addslashes(file_get_contents($image));
//
//            // Insert image content into database
//            $insert = $conn->query("INSERT into images (image) VALUES ('$imgContent'");
//
//            if($insert){
//                $status = 'success';
//                $statusMsg = "File uploaded successfully.";
//            }else{
//                $statusMsg = "File upload failed, please try again.";
//            }
//        }else{
//            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
//        }
//    }else{
//        $statusMsg = 'Please select an image file to upload.';
//    }
//
//
//// Display status message
//echo $statusMsg;
    $image=$_POST['image'];
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $filenaam = $_FILES['image']['name'];
    $tempnaam = $_FILES['image']['tmp_name'];

//    echo $image."  ".$naam."  ".$email."  ".$phone."  ".$address."    ".$filenaam."  ";
//    die;

    $sql="INSERT INTO info (naam,email,phone,address,image) VALUES ('$naam','$email', '$phone','$address','$filenaam')";
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
        <form id="Form1"class="" action="" method="post" enctype="multipart/form-data" >
          <h1>Infinity Technologies</h1>
          <input type="text" name="naam" placeholder="Name" required>
          <input type="email" name="email" placeholder = "Email" required>
          <input type="tel" name="phone" placeholder="Phone" required>
          <input type="text" name="address" placeholder="Address" required>
          <input type="file" name="image"required>
          <div class="btn-box">
          <button type="submit" name="submit" id="next1">Submit</button>
<!--              <a href="index2.php" ></a>-->
              <a href="index.php" class="btn btn-danger">Cancel</a>
<!--          <button type="button" id="cancel">Cancel</button>-->
          </div>
<!--            <div class="container-fluid">-->
<!--            --><?php
//            if(isset($_SESSION['success'])&& $_SESSION['success']!='')
//            {
//            echo '<h2 class="bg-primary text-white"> '.$_SESSION[" success"].' </h2>';
//            unset($_SESSION['success']);
//            }
//            if(isset($_SESSION['status'])&& $_SESSION['status']!='')
//             {
//            echo '<h2 class="bg-primary text-white"> '.$_SESSION[" success"].' </h2>';
//            unset($_SESSION['success']);
//            }
//            ?>

        </form>

    </div>

  </body>
</html>
