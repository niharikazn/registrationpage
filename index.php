<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['name'])){
$name=$_POST['name'];
$s="SELECT `name` from `reg` where `name`='$name'";
$res_u= mysqli_query($conn, $s);
if (mysqli_num_rows($res_u) > 0) {
echo '<script>alert("Username Already taken")</script>';	
  }
else{
$email=$_POST['email'];
$pass=md5($_POST['pass']);
$sql = "INSERT INTO `reg`( `name`, `email`, `pass`)
VALUES ('$name', '$email', '$pass')";
if ($conn->query($sql) === TRUE) {
     header("Location:login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registerationform</title>
</head>
<body>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">REGISTER</h2>
                        <form method="POST" class="register-form" id="register-form" action="">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter UserName" />
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" name="pass" id="pass" placeholder="Your Password"/>
                            </div>
                          <div class="form-group">
                              <label for="Rpass">Re-Password</label>
                              <input type="password" name="rpass" id="rpass" placeholder="Your Password" onchange='check_pass();'/>
                              <div id='error'></div>
                          </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                <a href="login.php">&nbsp; &nbsp;Already member?</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function check_pass() {
    if (document.getElementById('pass').value ==
            document.getElementById('rpass').value) {
        document.getElementById('signup').disabled = false;
    } else {
        alert("Password Does not match");
    }
}
        </script>
    </div>
    <footer>
        <div class="copy-right">
          <div class="container">
            <div class="copy-right-card">
             <p>2015 @ All Rights Reserved Designed and developed by<a
                 href="https://www.smarteyeapps.com">Niharika Jain</a></p>
            </div>
          </div>
        </div>
      </footer>
</body>
</html>