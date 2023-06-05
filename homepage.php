<?php
session_start();
include "db.php";

// Tiff fixed the undefined array error
$intern_id = isset($_POST['Intern_id']) ? $_POST['Intern_id'] : '';
$projects = isset($_POST['projects']) ? $_POST['projects'] : '';
$actionitem = isset($_POST['actionitem']) ? $_POST['actionitem'] : '';
$specialevents = isset($_POST['specialevent']) ? $_POST['specialevent'] : '';
$timeout_InternId = isset($_POST['timeout_InternId']) ? $_POST['timeout_InternId'] : '';

//Check if the time in button is pressed
if (isset($_POST['ontime'])) {
  // Insert date and time values into database
  // Tiff added the time in functionality
  $sql = "INSERT INTO fedcenter_intern_logs (Intern_Id, Date, Time_in, Project, Action_item, Special_events) VALUES ('$InternId', GETDATE(), (SELECT CONVERT(VARCHAR(8), GETDATE(), 108)), '$projects','$actionitem', '$specialevents' )";
  $stmt = mysqli_query($conn, $sql);

  if ($stmt) {
    echo '<script>alert("Time-in Successful!")</script>';
  } else {
    echo '<script>alert("Server Error!")</script>';
  }
  mysqli_close($conn);
} elseif (isset($_POST['time_out'])) {
  //Check if time-in has been done before storing time-out
  $sqlcheck = "SELECT TOP 1 * FROM fedcenter_intern_logs WHERE TIME_OUT IS NULL ";
  $stmtcheck = mysqli_query($conn, $sqlcheck);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($row) {
    // Update date and time values into database
    $sqlto = "UPDATE fedcenter_intern_logs SET TIME_OUT = (SELECT CONVERT(VARCHAR(8), GETDATE(), 108)) WHERE INTERN_ID = ?";
    $stmtto = mysqli_prepare($conn, $sqlto);
    mysqli_stmt_bind_param($stmtto, 's', $row['INTERN_ID']);

    if ($stmtto) {
      if (mysqli_stmt_execute($stmtto)) {
        // Calculate the number of hours and minutes
        $sqlcalculate = "UPDATE fedcenter_intern_logs SET NO_HOURS = TIMESTAMPDIFF(HOUR, TIME_IN, TIME_OUT), NO_MINUTES = TIMESTAMPDIFF(MINUTE, TIME_IN, TIME_OUT) % 60 WHERE INTERN_ID = ?";
        $stmtcalculate = mysqli_prepare($conn, $sqlcalculate);
        mysqli_stmt_bind_param($stmtcalculate, 's', $row['INTERN_ID']);
        if (mysqli_stmt_execute($stmtcalculate)) {
          echo '<script>alert("Time-out Successful!")</script>';
        } else {
          echo "Error: ";
        }
      }
    }
  }

  mysqli_close($conn);
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
    $serverName = "";
    $connectionOptions = array(
      "Database" => "dlsud",
      "UID" => "",
      "PWD" => ""
    );
    $conn = mysqli_connect($serverName, $username, $password, $db);

    // Check the connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Assuming you have a database connection established
    $user_pass_log = isset($_SESSION["user_pass_log"]) ? $_SESSION["user_pass_log"] : '';

    // Prepare and execute the query
    $query = "SELECT NAME, INTERN_ID FROM fedcenter_intern_data WHERE INTERN_ID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $user_pass_log);
    mysqli_stmt_execute($stmt);

    // Fetch the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a row is found
    if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $InternId = $row['INTERN_ID'];
      $name = $row['NAME'];
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
      <h1>Action Item</i></h1>
      <form id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="Event">
          <select name="projects" id="projects" class="projects">
            <option value="None">Select your Projects</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Accounting">Accounting</option>
            <option value="IT">IT</option>
            <option value="Marketing">Marketing</option>
            <option value="FIN ED/ CFAP">FIN ED/ CFAP</option>
            <option value="JJCFAP/JAA">JJCFAP/JAA</option>
            <option value="Training">Training</option>
            <option value="Business Development">Business Development</option>
            <option value="Alterna">Alterna</option>
            <option value="Organization">Organization</option>
            <option value="ADM/NDC">ADM/NDC</option>
            <option value="IMG/ASTRA">IMG/ASTRA</option>
          </select>
          <br><br><br>
          <div class="intern-id">
            <input type="text" id="InternId" name="InternId" class="form__input" autocomplete="off" placeholder=" ">
            <label for="InternId" class="form__label">Intern ID </label>
          </div>
          <br><br><br>
          <div class="action-item">
            <input type="text" id="actionitem" name="actionitem" class="form-action" autocomplete="off" placeholder=" ">
            <label for="actionitem" class="form--action">Action Item </label>
          </div>
          <br><br><br>
          <div class="special-event">
            <input type="text" id="specialevent" name="specialevent" class="form-special" autocomplete="off" placeholder=" ">
            <label for="specialevent" class="form--special">Special Event </label>
          </div>
          <br><br><br>
        </div>
        <button type="submit" id="close" name="close">&times;</button>

        <button type="submit" id="ontime" name="ontime">Time in</button>

      </form>

    </div>
  </div>
  <form id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">


    <button type="submit" class="timeout" name="time_out">Time out</button>

  </form>

  </div>
  </div>

  <!--Table For Intern-->
  <main>
    <table class="mytable" id="mytable">

      <thead>
        <tr>

          <th>INTERN ID</th>
          <th>DATE</th>
          <th>IN</th>
          <th>OUT</th>
          <th>HOURS</th>
          <th>MINUTES</th>
          <th>PROJECT</th>
          <th>ACTION ITEM</th>
          <th>SPECIAL EVENTS</th>
        </tr>
      </thead>

      <?php ///php inside html

      $serverName = "";
      $connectionOptions = [
        "Database" => "dlsud",
        "Uid" => "",
        "PWD" => ""
      ];

      $conn = mysqli_connect($serverName, $username, $password, $db);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }


      // Getting Total List

      $user_pass_log = isset($_SESSION["user_pass_log"]) ? $_SESSION["user_pass_log"] : '';
      $sql = "SELECT * FROM fedcenter_intern_logs WHERE INTERN_ID = '$user_pass_log'";

      $result = mysqli_query($conn, $sql);

      if ($result === false) {
        die("Query failed: " . mysqli_error($conn));
      }

      ?>

      <table>
        <tr>
          <th>INTERN ID</th>
          <th>DATE</th>
          <th>TIME IN</th>
          <th>TIME OUT</th>
          <th>NO OF HOURS</th>
          <th>NO MINUTES</th>
          <th>PROJECT</th>
          <th>ACTION ITEM</th>
          <th>SPECIAL EVENTS</th>
        </tr>';
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $fieldname2 = $row['INTERN_ID'];
          $fieldname3 = date('d/m/Y', strtotime($row['DATE']));
          $fieldname4 = $row['TIME_IN'];
          $fieldname5 = $row['TIME_OUT'];
          $fieldname6 = $row['NO_HOURS'];
          $fieldname7 = $row['NO_MINUTES'];
          $fieldname8 = $row['PROJECT'];
          $fieldname9 = $row['ACTION_ITEM'];
          $fieldname10 = $row['SPECIAL_EVENTS'];

          echo '<tr>
                <td>' . $fieldname2 . '</td>
                <td>' . $fieldname3 . '</td>
                <td>' . $fieldname4 . '</td>
                <td>' . $fieldname5 . '</td>
                <td>' . $fieldname6 . '</td>
                <td>' . $fieldname7 . '</td>
                <td>' . $fieldname8 . '</td>
                <td>' . $fieldname9 . '</td>
                <td>' . $fieldname10 . '</td>
            </tr>';
        }




        ?>





      </table>

  </main>

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
    window.addEventListener('click', function (e) {
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

    toggleBtn.onclick = function () {
      dropDownMenu.classList.toggle('open')
      const isOpen = dropDownMenu.classList.contains('open')

      toggleBtnIcon.classList = isOpen
      ? 'fa-solid fa-xmark'
      : 'fa-solid fa-bars'
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
    Number.prototype.pad = function (digits) {
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
    xmlhttp.onreadystatechange = function () {
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