<?php
        $showAlert = false;
        $showErr = false;
      if(isset($_POST['btn_img']))
      {
        $conn = mysqli_connect("localhost","root","","user1855");
        $name = $_POST["name"];
        $age = $_POST["age"];
        $weight = $_POST["weight"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
        $filename = $_FILES["choosefile"]["name"];
        $tempfile = $_FILES["choosefile"]["tmp_name"];
        $folder = "pdf/".$filename;
        $exists = false;
        if($exists==false && $pass==$cpass){
        $sql = "INSERT INTO `user`(`name`, `age`, `weight`, `email`, `pass`,`pdf`,`date`)VALUES('$name', '$age', '$weight', '$email', '$pass','$filename',current_timestamp())";
        if($filename == "")
        {
            echo 
            "
            <div class='alert alert-danger' role='alert'>
                <h4 class='text-center'>Blank not Allowed</h4>
            </div>
            ";
        }else{
            $result = mysqli_query($conn, $sql);
            move_uploaded_file($tempfile, $folder);
        }
        if($result){
            $showAlert= true;
        }
    }
    else{
        $showErr = true;
    }
      } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {background: url("images/up.jpg");}
</style>

</head>
<body>
    <?php
    if($showAlert){
    echo '
    <div class="alert alert-success" role="alert">
         You have registered sucessfully
    </div>
    ';
    }
    if($showErr){
        echo '
        <div class="alert alert-danger" role="alert">
             Password Not Matched
        </div>
        ';
        }
    ?>
    <div class="container my-4">
        <h1 class="text-center my-4">Fill the details</h1>
        <div class="d-flex justify-content-center">
    <form action="/UserRegistration/signup.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="text" name="age" class="form-control" id="age">
  </div>
  <div class="mb-3">
    <label for="weight" class="form-label">Weight</label>
    <input type="text" name="weight" class="form-control" id="weight">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email-id</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="pass">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Confirm Password</label>
    <input type="password" name="cpass" class="form-control" id="cpass">
  </div>
  <div class="mb-3">
    <label for="pdf" class="form-label">Health Report</label>
    <input type="file" name="choosefile" class="form-control" id="pdf">
  </div >
  <button type="submit" class="btn btn-primary" name="btn_img">Submit</button>
  <div class="mb-3">
    <label for="pdf" class="form-label"><br>Already have an account? <a href="signin.php">Sign In</a></label>
  </div>
</form>
</div>
    </div>
</body>
</html>
