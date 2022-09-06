<?php
$servernaam = "localhost";
$usernaam = "root";
$password = "";
$dbnaam = "php";
$conn = mysqli_connect($servernaam,$usernaam,$password,$dbnaam);

?>

<html lang="en" dir="ltr">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<head>
    <meta charset="utf-8">
    <title>PHP READ</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        img{
            width: 100px;
            height: 150px;
        }
    </style>
</head>
<body>
<nav>PHP READ FROM DATABASE</nav>
<div class="container">
<!--    <button type="submit" naam="submit" id="next1">Submit</button>-->
<!--        <a href="index.php" class="btn btn-dark">Add New</a>-->

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">naam</th>
            <th scope="col">E-mail</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">image</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "select * from info";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <?php $imgur =$row['image'];
//                    echo $imgur;
//                    die;
                ?>

                <td><?php echo $row['id'] ?> </td>
                <td><?php echo $row['naam'] ?> </td>
                <td><?php echo $row['email'] ?> </td>
                <td><?php echo $row['phone'] ?> </td>
                <td><?php echo $row['address']?> </td>
<!--                --><?php
//                $imgur = $_POST['image'];
//                ?>
                <td><?php echo "<img src='upload/$imgur'>"?> </td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']?>" class="link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></a>
                    <a href="delete.php?id=<?php echo $row['id']?>" onclick="return checkDelete()" class="conf_del_button btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg></a>

                </td>
                <td>
                </td>
            </tr>
        <?php
        }
        ?>
<!--        <tr>-->
<!--            <th scope="row">1</th>-->
<!--            <td>Yahya Ahmed Sharif</td>-->
<!--            <td>yahyaahmedsharif@gmail.com</td>-->
<!--            <td>01620463083</td>-->
<!--            <td>Azimpur,Dhaka</td>-->
<!--        </tr>-->
        </tbody>
    </table>
    <div class="btn-box">
        <a href="index.php" class="btn btn-box">Add New</a>
    </div>
    <script>
        $(document).ready(function(){
        $(.conf_del_button).click(function(e){
            e,preventDefault();
            var id =$(this).val();
            swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                      icon: "success",
                    });
                  } else {
                    swal("Your imaginary file is safe!");
                  }
                });
        });
    </script>
</div>
<script>
    function checkDelete()
    {
        return confirm("Are you sure you want to delete this record?");

    }
</script>
</body>
</html>