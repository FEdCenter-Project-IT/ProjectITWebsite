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
  
<!-- COMMENT NI TIFF -->
<!-- COMMENT IN TIFF 2 -->
<!-- COMMENT NI TIFF 3 -->

<div class="login-wrapper">
    <form action="" class="form">
      <img src="img/FedCenter_Wolf-removebg-preview.png" alt="">
      <h2>Admin Login</h2>
      <div class="input-group">
        <input type="text" name="loginUser" id="loginUser" required>
        <label for="loginUser">User email</label>
      </div>
      <div class="input-group">
        <input type="password" name="loginPassword" id="MyInput" required>
        <label for="loginPassword">Password</label>
        <span class="eye" onclick="myFunction()">
        <i id="hide1" class="fa-solid fa-eye"></i>
        <i id="hide2" class="fa-solid fa-eye-slash"></i></span>
      </div>
      <input type="submit" value="Login" class="submit-btn">
      <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>
    </form>

    <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div>
  </div>
  


<!--Password Hide-->
<script>
    function myFunction(){
        var x = document.getElementById("MyInput");
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