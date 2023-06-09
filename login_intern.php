<?php
session_start(); // Call session_start() before any output is sent

// Connect to the database
$serverName = "localhost";
$username = "root";
$password = "";
$db = "dlsud";

$conn = mysqli_connect($serverName, $username, $password, $db);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$loginerr = ''; // Initialize login error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_id_log = isset($_POST["email"]) ? $_POST["email"] : '';
    $user_pass_log = isset($_POST["password"]) ? $_POST["password"] : '';
    
    // Select the User_Name and User_Password from the admin_login table, comparing case sensitively
    $sql = "SELECT email, password FROM interns WHERE BINARY email=? AND BINARY password=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $form_id_log, $user_pass_log);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the data from the database
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('WELCOME ADMIN!');</script>";
        header("Location: homepage.php");
        exit();
    } else {
        $loginerr = "Invalid Username/Password.";
    }
}
?>


<!-- Samboy -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>FIS</title>
</head>
<body>


<div class="login-wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="POST" class="form">
      <img src="img/FedCenter_Wolf-removebg-preview.png" alt="">
      <h2>Intern Login</h2>
      <div class="input-group">
        <input type="text" name="email" id="email" required>
        <label for="username">User email</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" id="password" required>
        <label for="userpassword">Password</label>
        <span class="eye" onclick="myFunction()">
        <i id="hide1" class="fa-solid fa-eye"></i>
        <i id="hide2" class="fa-solid fa-eye-slash"></i></span>
      </div>
      <input type="submit" value="Login" class="submit-btn">
      <a href="#forgot-pw" class="forgot-pw"><h4 class="primary-variant">Forgot Password?</h4></a>
    </form>
      <center>                              
    <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email"><h3 class="white">Email</h3></label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div>
  </div>
</center>
<!--Password Hide-->
<script>
    function myFunction(){
        var x = document.getElementById("userpassword");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if(x.type == 'password') {
            x.type = "text";
            y.style.display = "block"
            z.style.display = "none"
        }
        else {
            x.type = "password";
            y.style.display = "none"
            z.style.display = "block"
        }
    }
</script>

</body>
</html>

