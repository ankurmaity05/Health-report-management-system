<?php
    $login = false;
    $showErr = false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'C:/xampp/htdocs/UserRegistration/db.php';
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    
    $sql = "Select * from user where email='$email' AND pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['email']=$email;
        
        header("location: content.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User signin</title>
</head>
<body>
<?php
    if($login){
        echo '
        <div class="alert alert-success" role="alert">
             Logged in successfully
        </div>
        ';
        }
        if($showErr){
            echo '
            <div class="alert alert-danger" role="alert">
                 Invalid Login Credentials
            </div>
            ';
            }
    ?>
    <form action="/UserRegistration/signin.php" method="post">
    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100" >

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex width-100% justify-content-center align-items-center flex-column left-box" style="background: #fff;">
           <div class="featured-image mb-3">
            <img src="images/main.jpg" class="img-fluid" style="width: 100%; border-radius: 5%;">
           </div>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Health Report</h2>
                     <p>Always there to help you</p>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                </div>
                <div class="input-group mb-1">
                    <input type="password" name="pass" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                </div>
                <div class="input-group mb-3">
                <a href='signup.php'>
                    <button class="btn btn-lg btn-light w-100 fs-6" name="signup" onclick ="window.location.href='signup.php';" style="border: 1px solid black;"><img src="images/signup.jpg" style="width:20px" class="me-2"><small><a href='signup.php'>Sign Up</small></button></a>
                </div>
          </div>
       </div> 
      </div>
    </div>
    </form>
</body>
</html>