<?php

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


//Variable to hold the values
$projectname = $_POST['First_Name'];
$actionitem =  $_POST['First_Name'];
$specialevents = $_POST['First_Name'];

//Check if the time in button is pressed
if(isset($_POST['ontime'])){

  // Insert date and time values into database
  $sql = "INSERT INTO FEDCENTER_INTERN_LOGS (DATES, TIME_IN) VALUES (GETDATE(), (SELECT CONVERT(VARCHAR(8), GETDATE(), 108)))";
  $stmt = sqlsrv_query($conn, $sql);
  if ($stmt) {
    echo "Data stored successfully.";
  }
  else {
    echo "Error: " . $sql . "<br>" . sqlsrv_errors();
  }
  sqlsrv_close($conn);
}
elseif(isset($_POST['time_out'])){
  if(empty($_POST['time_in'])){
    // Insert date and time values into database
    $sqlto = "UPDATE FEDCENTER_INTERN_LOGS 
    SET TIME_OUT = (SELECT CONVERT(VARCHAR(8), GETDATE(), 108))
    WHERE LOGS = (
      SELECT TOP 1 LOGS
      FROM FEDCENTER_INTERN_LOGS
      ORDER BY LOGS DESC
    )";
    $stmtto = sqlsrv_query($conn, $sqlto);
    if ($stmtto) {
      echo "Data stored successfully.";
    }
    else {
      echo "Error: " . $sqlto . "<br>" . sqlsrv_errors();
    }
    sqlsrv_close($conn);
  }
}
else{
  echo "Error: Time-in First!";
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
  <form id="registration" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <button type="submit" id="open" class="timein" name="time_in">Time in</button>
  <div class="modal-container" id="modal_container">
<div class="modal">
    <h1>Action Item</i></h1>

<div class="select-box">
    <div class="select-option">
        <input type="text" placeholder="Projects" id="soValue" readonly name="">
    </div>
    <div class="content">
        <div class="search">
        <input type="text" id="optionSearch" name="Search" placeholder="Search">
        
        </div>
    <select name="projects" id="projects" class="options">
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
    
    </div>
</div>
    <div class="Event">
    <div class="inputBox">
        <input type="text" id = "actionitem" required="required">
        <span>Action Item/Task</span>
    </div>
    <div class="input-Box">
        <input type="text"  id = "specialevent">
        <span>Special Event</span>
    </div>
    
    </div>
    

          <button id="close"> Cancel</button>
          <button type="submit" id="ontime">timein</button>

</div>

</div>

  <button type="submit" id="time_out" class="timeout" name="time_out" >Time out</button>
</form>



<!--Table For Intern-->
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

<script>// pop-up messages

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


<script> // for dropdown menu in modal box
    const selectBox = document.querySelector('.select-box');
    const selectOption = document.querySelector('.select-option');
    const soValue = document.querySelector('#soValue');
    const optionSearch = document.querySelector('#optionSearch');
    const options = document.querySelector('.options');
    const optionsList = document.querySelectorAll('.options li');

    // Open/close dropdown menu when user clicks on selectOption
    selectOption.addEventListener('click', function(){
        selectBox.classList.toggle('active');
    });
         // Set the value of the input field to the selected option
    optionsList.forEach(function(optionsListSingle){
        optionsListSingle.addEventListener('click',function(){
            text = this.textContent;
            soValue.value = text;
            selectBox.classList.remove('active')
        })
    });
    // Search Bar
    optionSearch.addEventListener('keyup', function(){
    var filter, li, i, textValue;
    filter = optionSearch.value.toUpperCase();
    li = options.getElementsByTagName('li');
    var found = false;
    for (i = 0; i < li.length; i++) {
        liCount = li[i];
        textValue = liCount,textContent || liCount.innerText;
        if(textValue.toUpperCase().indexOf(filter) > -1){
            li[i].style.display = '';
            found = true;
        }else {
            li[i].style.display = 'none';
        }
    }

});
    // Close dropdown menu when user clicks outside of it
    window.addEventListener('click', function(event) {
        if (!selectBox.contains(event.target)) {
            selectBox.classList.remove('active');
        }
    });

</script>

<script>// all in the modal box kapag nag cancel button automatic restart lahat ng value
 const cancelButton = document.getElementById("close");
const dropdown = document.querySelector(".select-option input");
const inputBox = document.querySelectorAll(".Event input")[0];
const specialEventBox = document.querySelectorAll(".Event input")[1];
const checkbox = document.querySelector(".checkbox-container input[type='checkbox']");

// Function to reset the input field, dropdown menu, and checkbox
function resetForm() {
  dropdown.value = "";
  inputBox.value = "";
  specialEventBox.value = "";
  checkbox.checked = false; // uncheck the checkbox
}

// Add event listener to the Cancel button
cancelButton.addEventListener("click", resetForm);

// Add event listener to the dropdown menu
dropdown.addEventListener("change", function() {
  if (dropdown.value !== "Projects") {
    inputBox.value = inputBox.value.trim() !== "" ? inputBox.value : dropdown.value;
    dropdown.value = "Projects";
  }
});

</script>


<!-- PAGINATION -->
<script>
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
      }
      else {
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
                //click outside and close

let subMenu = document.getElementById("subMenu");
  let userPic = document.querySelector(".user_pic");

  function toggleMenu() {
    subMenu.classList.toggle("open-menu");
  }

  window.addEventListener('click', function(e) {
    if (!subMenu.contains(e.target) && !userPic.contains(e.target)) {
      subMenu.classList.remove("open-menu");
    }
  });


 </script>

<!--Intern CLock-->
<script type="text/javascript">
  function updateClock() {
    var now = new Date();
    var dname = now.getDay(), mo = now.getMonth(), dnum = now.getDate(), yr = now.getFullYear();
    var hou = now.getHours(), min = now.getMinutes(), sec = now.getSeconds();
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
  const optionMenu = document.querySelector(".select-menu"), selectBtn = optionMenu.querySelector(".select-btn"), options = optionMenu.querySelectorAll(".option"), sBtn_text = optionMenu.querySelector(".sBtn-text");
  selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));
  options.forEach(option =>{
    option.addEventListener("click", ()=>{
      let selectedOption = option.querySelector(".option-text").innerText;
      sBtn_text.innerText = selectedOption;
      optionMenu.classList.remove("active");
    });
  });
</script>

<!-- CAMERA VISION -->

</body>
</html>



