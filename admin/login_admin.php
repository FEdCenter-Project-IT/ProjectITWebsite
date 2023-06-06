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
    $form_id_log = isset($_POST["userEmail"]) ? $_POST["userEmail"] : '';
    $user_pass_log = isset($_POST["userPass"]) ? $_POST["userPass"] : '';
    
    // Select the User_Name and User_Password from the admin_login table, comparing case sensitively
    $sql = "SELECT User_Name, User_Password FROM admin_login WHERE BINARY User_Name=? AND BINARY User_Password=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $form_id_log, $user_pass_log);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the data from the database
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('WELCOME ADMIN!');</script>";
        header("Location: dashboard.php");
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
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Admin</title>

</head>
<body>

    <div class="loginbox">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">

            <img src="images/FC Management Consulting.png" alt="">
            <h2>Admin Login</h2>
            <div class="userInput">
                <input type="text" name="userEmail" id="userEmail" required>
                <label for="userEmail"> User Email</label>
                <i></i>
            </div>
            <div class="userInput">
                <input type="password" name="userPass" id="userPass" required>
                <label for="userPass">Password</label> 
                <i></i>
            </div>
            <br>
            <div class="checkbox">
                <input type="checkbox" onclick="myFunction()"> Show Password
            </div>

            <input type="submit" value="Login" class="loginButton"> 
      
        </form>

    </div>
   
    <script>
        function myFunction() {
  var x = document.getElementById("userPass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
    

</body>
</html>


