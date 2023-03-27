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
        <div class="form">
            <img src="images/Fed Logo.png" alt="">
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
        </div>
      
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

