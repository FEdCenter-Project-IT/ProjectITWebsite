<?php

if(isset($_POST['submit'])){
// Connect to database
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

// Retrieve date and time values from AJAX request
$dayname = $_POST['dayname'] ?? '';
$month = $_POST['month'] ?? '';
$daynum = $_POST['daynum'] ?? '';
$year = $_POST['year'] ?? '';
$hour = $_POST['hour'] ?? '';
$minutes = $_POST['minutes'] ?? '';
$seconds = $_POST['seconds'] ?? '';
$period = $_POST['period'] ?? '';

// Construct datetime string
$datetime_str = $year . "-" . $month . "-" . $daynum;
$time_str =  $hour . ":" . $minutes . ":" . $seconds . " " . $period;

// Insert date and time values into database
$sql = "INSERT INTO FEDCENTER_INTERN_LOGS (DATES, TIME_IN) VALUES ('$datetime_str', '$time_str')";
$params = array($datetime_str, $time_str);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    echo "Data stored successfully.";
} else {
    echo "Error: " . $sql . "<br>" . sqlsrv_errors();
}

sqlsrv_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
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
  <ul>
   <li>Hello, <b>Raffy</b><br> RAV(2023-32)</li>
  </ul>
  <img src="img/zoomDP.jpg" class="user_pic" onclick="toggleMenu()">
  <div class="sub-menu-wrap" id="subMenu">
    <div class="sub-menu">
      <div class="user-info">
        <img src="img/zoomDP.jpg">
        <h2>Raffy L. Veloria</h2>
      </div>
      <hr>
      <a href="" class="sub-menu-link">
      <i class="fa fa-user"></i>
        <p>Edit Profile</p>
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
      <a href="" class="sub-menu-link">
      <i class="fa-solid fa-right-from-bracket"></i>
        <p>Logout</p>  
      </a>
    </div>
  </div>
</nav>
<img src="img/FC Management Consulting.png" class="logo" >
<div class="cam">
  <video src="" id="video" autoplay muted></video>
</div>

<!-- Digital Clock Start -->
<center>
<div class="datetime">
    <div class="date">
        <span id = "dayname"> Day </span>
        <span id = "month"> Month </span>
        <span id = "daynum"> 00 </span>,
        <span id = "year"> Year </span>
    </div>
    <div class="time">
        <span id = "hour"> 00 </span>:
        <span id = "minutes"> 00</span>:
        <span id = "seconds"> 00 </span>
        <span id = "period"><h4>AM</h4>  </span> 
    </div>
</div>
</center>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <button type="submit " id="submit" class="timein" name="time_in">Time in</button>
  <button type=" "class="timeout" >Time out</button>

</form>


<!--Table For Inter-->
<main>    
        <section class="field">
            <table class="Table_User" id="searchTable">
                <thead>
                     <tr class="Usern_inf">
                
                      <th class="Get_info">NO</th>
                      <th class="Get_info">DATE</th>
                      <th class="Get_info">IN</th>
                      <th class="Get_info">OUT</th>
                      <th class="Get_info">HOURS</th>
                      <th class="Get_info">MINUTES</th>
                      <th class="Get_info">SPECIAL EVENT</th>
                      
 
                    </tr>
                  </thead>
                  <!--Sample data-->
                  <tbody>
                     <tr class="Usern_inf">
                        <td> 01</td>
                        <td>March 28,2023</td>
                        <td>8:00AM</td>
                        <td>5:00PM</td>
                        <td>8</td>
                        <td>0</td>
                        <td>Typing Test</td>
                    </tr>                  
                
                  </tbody>
            </table>
        
      <!--Pagination-->
    <div class ="sub-page" id="pagination">
  <button class ="first-btn" id="first">First</button>
  <button class="previous-btn" id="previous">Prev</button>
  <span class ="page-btn" id="currentPage"></span>
  <button class="nxt-btn" id="next">Next</button>
  <button class="last-btn" id="last">Last</button>
</div>

        </section>
    </main>

    <script> // Pagination
var table = document.getElementById("searchTable").getElementsByTagName("tbody")[0];
var rowsPerPage = 5;
var currentPage = 1;
var totalPages = Math.ceil(table.rows.length / rowsPerPage);

document.getElementById("currentPage").innerHTML = "Page " + currentPage + " of " + totalPages;

function showRows() {
  var startIndex = (currentPage - 1) * rowsPerPage;
  var endIndex = startIndex + rowsPerPage;
  for (var i = 0; i < table.rows.length; i++) {
    if (i < startIndex || i >= endIndex) {
      table.rows[i].style.display = "none";
    } else {
      table.rows[i].style.display = "";
    }
  }
  document.getElementById("currentPage").innerHTML = "Page " + currentPage + " of " + totalPages;
}

showRows();

document.getElementById("first").addEventListener("click", function() {
  currentPage = 1;
  showRows();
});

document.getElementById("previous").addEventListener("click", function() {
  if (currentPage > 1) {
    currentPage--;
    showRows();
  }
});

document.getElementById("next").addEventListener("click", function() {
  if (currentPage < totalPages) {
    currentPage++;
    showRows();
  }
});

document.getElementById("last").addEventListener("click", function() {
  currentPage = totalPages;
  showRows();
});

    </script>

    <!--Profile Intern-->
    <script>
let subMenu = document.getElementById("subMenu");

function toggleMenu() {
  subMenu.classList.toggle("open-menu");
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
        }

        if (hou > 12) {
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


        var xmlhttp = new XMLHttpRequest();
xmlhttp.open("POST", "homepage.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText); // You can handle the response from PHP here
    }
}
var data = "dayname=" + week[dname] + "&month=" + months[mo] + "&daynum=" + dnum + "&year=" + yr + "&hour=" + hou + "&minutes=" + min + "&seconds=" + sec + "&period=" + pe;
xmlhttp.send(data);



    }

     function initClock() {
     updateClock();
     window.setInterval("updateClock()",1);

     }

     </script>

<script>
        const optionMenu = document.querySelector(".select-menu"),
       selectBtn = optionMenu.querySelector(".select-btn"),
       options = optionMenu.querySelectorAll(".option"),
       sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       

options.forEach(option =>{
    option.addEventListener("click", ()=>{
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;

        optionMenu.classList.remove("active");
    });
});
    </script>

<script> //camera vision

const video = document.getElementById('video');

function camera() {
  navigator.getUserMedia({ video: {} },
  stream => video.srcObject = stream,
  err => console.error(err)
  );
}
camera()

</script>


</body>
</html>



