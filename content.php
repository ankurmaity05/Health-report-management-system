<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: signin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Health Report</title>
    <style media="screen">
        body{
            display:flex;
            align-items:center;
            padding-top:2%;
        }
        embed{
            border:2px solid black;
        }
        .div1{
            margin-left: 300px;
        }

</style>
</head>
<body>
    <div class="div1">
        <?php
            include 'C:/xampp/htdocs/UserRegistration/db.php';
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM user WHERE email='$email'";
            $query = mysqli_query($conn,$sql);
            while ($info=mysqli_fetch_array($query)){
             ?>
            <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ?>" width="900" height="650">
            <?php
            }
       
        ?>
         <div>
        <p style="font-size:30px">Logout using this <a href="logout.php">link</a></p>
        </div>
    </div>    
</body>
</html>