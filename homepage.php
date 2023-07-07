<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$db = "dlsud";

// Create connection
$con = mysqli_connect($servername, $username, $dbpassword, $db);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
session_start();

// Tiff fixed the undefined array error
$Time_out = isset($_POST['Time_out']) ? $_POST['Time_out'] : '';

// Check if the time in button is pressed
if (isset($_POST['ontime'])) {
  // Get the Intern_Id based on the user ID (assuming it's stored in the session)
  $user_id = $_SESSION['user_pass_log']; // Replace 'user_pass_log' with the actual session variable name

  // Insert date and time values into database
  // Tiff added the time in functionality
  $sql = "INSERT INTO fedcenter_intern_logs (Intern_Id, Date, Time_in) VALUES (?, CURDATE(), CURTIME())";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, 's', $user_id);

  if (mysqli_stmt_execute($stmt)) {
    echo '<script>alert("Time-in Successful!")</script>';
  } else {
    echo '<script>alert("Server Error!")</script>';
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);
} elseif (isset($_POST['Time_out'])) {
  // Get the Intern_Id based on the user ID (assuming it's stored in the session)
  $user_id = $_SESSION['user_pass_log']; // Replace 'user_pass_log' with the actual session variable name

  // Check if there is an active time-in for the Intern_Id
  $sqlcheck = "SELECT * FROM fedcenter_intern_logs WHERE Intern_Id = ? AND Time_out IS NULL";
  $stmtcheck = mysqli_prepare($con, $sqlcheck);
  mysqli_stmt_bind_param($stmtcheck, 's', $user_id);
  mysqli_stmt_execute($stmtcheck);
  $resultcheck = mysqli_stmt_get_result($stmtcheck);
  $row = mysqli_fetch_assoc($resultcheck);

  if ($row) {
    // Update date and time values into database
    $sqlto = "UPDATE fedcenter_intern_logs SET Time_out = CURTIME(), No_hours = TIMESTAMPDIFF(HOUR, Time_in, CURTIME()), No_minutes = TIMESTAMPDIFF(MINUTE, Time_in, CURTIME()) % 60, Time_spent = TIMEDIFF(Time_out, Time_in) WHERE Intern_Id = ? AND Time_out IS NULL";
    $stmtto = mysqli_prepare($con, $sqlto);
    mysqli_stmt_bind_param($stmtto, 's', $user_id);

    if (mysqli_stmt_execute($stmtto)) {
      echo '<script>alert("Time-out Successful!")</script>';
    } else {
      echo "Error: " . mysqli_error($con);
    }
  } else {
    echo '<script>alert("No active time-in found!")</script>';
  }

  mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<!--comment-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<title>FIS</title>
</head>

<body onload="initClock()">

  <!--DrowDown Menu Intern-->
  <nav>
    <?php

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $db = "dlsud";

    // Create connection
    $con = mysqli_connect($servername, $username, $dbpassword, $db);

    // Check connection
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Assuming you have a database connection established
    $user_pass_log = isset($_SESSION["user_pass_log"]) ? $_SESSION["user_pass_log"] : '';

    // Prepare and execute the query
    $query = "SELECT full_name, fin FROM interns WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 's', $user_pass_log);
    mysqli_stmt_execute($stmt);

    // Bind the result variables
    mysqli_stmt_bind_result($stmt, $name, $InternId);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Check if a row is found
    if ($name !== null) {
      // The row was found, do something with the values
    } else {
      $name = "Unknown"; // Default value if no result is found
      $InternId = "Unknown";
    }
    ?>
    <div class="toggle_btn">
      <i class="fa-solid fa-bars"></i>
    </div>
    <ul>
      <li>Hello, <b><?php echo $name; ?></b><br> <?php echo $InternId; ?></li>
    </ul>
    <img src="img/zoomDP.jpg" class="user_pic" onclick="toggleMenu()">
    <div class="sub-menu-wrap" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
          <img src="img/zoomDP.jpg">
          <h2><?php echo $name; ?></h2>
        </div>
        <hr>
        <a href="" class="sub-menu-link">
          <i class="fa fa-user"></i>
          <p>View Profile</p>
          <span>></span>
        </a>
        <a href="" class="sub-menu-link">
          <i class="fa fa-gear"></i>
          <p>Setting & Privacy</p>
          <span>></span>
        </a>
        <a href="" class="sub-menu-link">
          <i class="fa-solid fa-circle-question"></i>
          <p>Help & Support</p>
          <span>></span>
        </a>
        <a href="login_intern.php" class="sub-menu-link">
          <i class="fa-solid fa-right-from-bracket"></i>
          <p>Logout</p>
        </a>
      </div>
    </div>
    <div class="dropdown_menu">
      <li><a href="#">View Profile</a></li>
      <li><a href="#">Setting & Privacy</a></li>
      <li><a href="#">Help & Support</a></li>
      <li><a href="login_intern.php">Logout</a></li>
    </div>
  </nav>
  <center>
    <img src="img/FC Management Consulting.png" class="logo">
  </center>
  <!-- Digital Clock Start -->

  <div class="datetime">
    <div class="date">
      <span id="dayname"> Day </span>
      <span id="month"> Month </span>
      <span id="daynum"> 00 </span>,
      <span id="year"> Year </span>
    </div>
    <div class="time">
      <span id="hour"> 00 </span>:
      <span id="minutes"> 00</span>:
      <span id="seconds"> 00 </span>
      <span id="period">
      </span>
    </div>
  </div>
  <button type="submit" id="open" class="timein" name="time_in">Time in</button>
  <div class="modal-container" id="modal_container">
    <div class="modal">
      <h1>Confirm Time in</i></h1>
      <form id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="Event">
        </div>
        <button type="submit" id="close" name="close">&times;</button>
        <button type="submit" id="ontime" name="ontime">Time in</button>
      </form>
    </div>
  </div>
  <form id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <!-- Other input fields -->
    <input type="hidden" name="Time_out" value="1">
    <button type="submit" class="timeout" name="Time_out">Time Out</button>
  </form>

  </div> <!-- Remove this extra closing div tag -->

  </main> <!-- Adjust the closing tag for main -->

  <!--Table For Intern-->
  <main>
    <table class="mytable" id="mytable">
      <?php ///php inside html
      $servername = "localhost";
      $username = "root";
      $dbpassword = "";
      $db = "dlsud";

      // Create connection
      $con = mysqli_connect($servername, $username, $dbpassword, $db);

      // Check connection
      if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }
      // Getting Total List

      $user_pass_log = isset($_SESSION["user_pass_log"]) ? $_SESSION["user_pass_log"] : '';
      $sql = "SELECT * FROM fedcenter_intern_logs WHERE Intern_Id = '$user_pass_log'";

      $result = mysqli_query($con, $sql);

      if ($result === false) {
        die("Query failed: " . mysqli_error($con));
      }

      ?>

      <table class="mytable" id="mytable">
        <tr>
          <th>DATE</th>
          <th>TIME IN</th>
          <th>TIME OUT</th>
          <th> TIME SPENT</th>
          <th>NO OF HOURS</th>
          <th>NO MINUTES</th>
        </tr>';
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $fieldname3 = date('d-M-Y', strtotime($row['Date']));
          $fieldname4 = date('h:i A', strtotime($row['Time_in']));
          $fieldname5 = date('h:i A', strtotime($row['Time_out']));
          $fieldname6 = $row['Time_spent'];
          $fieldname7 = $row['No_hours'];
          $fieldname8 = $row['No_minutes'];
          echo "<tr>";
          echo "<td>" . $fieldname3 . "</td>";
          echo "<td>" . $fieldname4 . "</td>";
          echo "<td>" . $fieldname5 . "</td>";
          echo "<td>" . $fieldname6 . "</td>";
          echo "<td>" . $fieldname7 . "</td>";
          echo "<td>" . $fieldname8 . "</td>";
          echo "</tr>";
        }
        ?>

      </table>
      <?php
      mysqli_close($con);
      ?>
    </table>
  </main>
  <script src="js/script.js"></script>
  <!-- Digital Clock End -->

</body>

</html>

<script>
  // pop-up messages

  const open = document.getElementById('open');
  const modal_container = document.getElementById('modal_container');
  const close = document.getElementById('close')

  open.addEventListener('click', () => {
    modal_container.classList.add('show');
  });

  close.addEventListener('click', () => {
    modal_container.classList.remove('show');
  });
</script>

<!--Profile Intern-->
<script>
  let subMenu = document.getElementById("subMenu");
  let userPic = document.querySelector(".user_pic");

  function toggleMenu() {
    subMenu.classList.toggle("open-menu");
  }
  //click outside and close
  window.addEventListener('click', function(e) {
    if (!subMenu.contains(e.target) && !userPic.contains(e.target)) {
      subMenu.classList.remove("open-menu");
    }
  });
</script>
<!--For the hamburger menu-->
<script>
  const toggleBtn = document.querySelector('.toggle_btn')
  const toggleBtnIcon = document.querySelector('.toggle_btn i')
  const dropDownMenu = document.querySelector('.dropdown_menu')

  toggleBtn.onclick = function() {
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen ?
      'fa-solid fa-xmark' :
      'fa-solid fa-bars'
  }
</script>



<!--Intern CLock-->
<script type="text/javascript">
  function updateClock() {
    var now = new Date();
    var dname = now.getDay(),
      mo = now.getMonth(),
      dnum = now.getDate(),
      yr = now.getFullYear();
    var hou = now.getHours(),
      min = now.getMinutes(),
      sec = now.getSeconds();
    var pe = "AM";
    if (hou == 0) {
      hou = 12;
    } else if (hou == 12) {
      pe = "PM";
    } else if (hou > 12) {
      hou = hou - 12;
      pe = "PM";
    }
    Number.prototype.pad = function(digits) {
      for (var n = this.toString(); n.length < digits; n = 0 + n);
    }
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
    var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"]
    var values = [week[dname], months[mo], dnum, yr, hou, min, sec, pe];
    for (var i = 0; i < ids.length; i++)
      document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    // Send date and time values to PHP script
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "homepage.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText); // You can handle the response from PHP here
      }
    }
    var data = "dayname=" + week[dname] + "&month=" + months[mo] + "&daynum=" + dnum + "&year=" + yr + "&hour=" +
      hou + "&minutes=" + min + "&seconds=" + sec + "&period=" + pe;
    xmlhttp.send(data);
  }

  function initClock() {
    updateClock();
    window.setInterval(updateClock, 1000); // Update every second
  }

  initClock(); // Initialize the clock
</script>

<!-- CAMERA VISION -->


</body>

</html>