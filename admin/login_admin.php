<?php
session_start(); // Call session_start() before any output is sent

// Connect to the database
$serverName = "LAPTOP-GBO9I3B3\SQL";
$connectionOptions = [
    "Database" => "DLSUD",
    "Uid" => "",
    "PWD" => ""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
if (!$conn) {
    die("Connection failed: " . sqlsrv_errors());
}

$loginerr = ''; // Initialize login error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_id_log = isset($_POST["userEmail"]) ? $_POST["userEmail"] : '';
    $user_pass_log = isset($_POST["userPass"]) ? $_POST["userPass"] : '';
    // Select the FORM_ID and USER_PASSWORD from the users table
    $sql = "SELECT USER_NAME, USER_PASSWORD FROM ADMINLOGIN WHERE USER_NAME=? AND USER_PASSWORD=?";
    $params = array($form_id_log, $user_pass_log);
    $result = sqlsrv_query($conn, $sql, $params);
    // Fetch the data from the database
 
    if (sqlsrv_has_rows($result) ) {
        echo "<script>alert('WELCOME ADMIN!');</script>";
        header("Location: Interns.html");
        exit();
    } else {
        $loginerr ="Invalid Username/Password.";
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


