<?php
include "header.php";
?>
<!----------------------------- END OF ASIDE --------------------------->
<main>
    <h1>Interns</h1>

    <div class="subheader">
        <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()"> All Projects
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="myDropdown">
            <div class="Add">
            <div class="Add Intern">
                <a href="Add_project_form.php">
                    <button class="addbtn">Add Project</button>
                </a>
            </div>
        </div>
                <!-- <a>Project Accounting</a>
                <a>Project Alterna</a>
                <a>Project Astra</a>
                <a>Project Business Dev</a>
                <a>Project CEO</a>
                <a>Project Fin Ed</a>
                <a>Project GSG</a>
                <a>Project HR</a>
                <a>Project IMG</a>
                <a>Project IT</a>
                <a>Project IUS</a>
                <a>Project JCFAP</a>
                <a>Project Marketing</a>
                <a>Project Sales</a> -->

                
            </div>
        </div>

        

    </div>



    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <!--Table-->
    <div class="intern-list">
        <h2>List of Interns</h2>
        <table>
            <thead>
                <tr>
                    <th>Intern No.</th>
                    <th>Name</th>
                    <th>Project</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "dlsud";

                // Create connection
                $con = mysqli_connect($servername, $username, $password, $db);

                // Check connection
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch data from the 'interns' table
                $sql = "SELECT fin, full_name, project FROM interns";
                $result = mysqli_query($con, $sql);

                // Display the fetched data in the table
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['fin']}</td>";
                        echo "<td>{$row['full_name']}</td>";
                        echo "<td>{$row['project']}</td>";
                        echo "<td>Status</td>";
                        echo "<td><button onclick=\"togglePopup()\">Click Here</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No interns found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</main>
<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn" onclick="togglePopup()">&times;</div>
        
        <h1>LogSheet</h1> 

<table class="table101">
<thead>
  <tr>
    <th>NO</th>
    <th>DATE</th>
    <th>IN</th>
    <th>OUT</th>
    <th>HOURS</th>
    <th>MINS</th>
  </tr>
</thead>

 <tbody>
  <tr>
    <td>01</td>
    <td>January 1, 2023</td>
    <td>8:00AM</td>
    <td>5:00PM</td>
    <td>8</td>
    <td>0</td>
  </tr>  
 </tbody>
</table>     

<h1 class="item">Action Item</h1>

  <table class="table102">
    <thead>
      <tr>
        <th>ACTION ITEM</th>
        <th>DATE</th>
        <th>TIMEFRAME</th>
        <th>STATUS</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td class="special-events-cell" onmouseover="showTooltip(this)">Creating Background of the sunshine and earth and</td>
        <td>june 15, 2023</td>
        <td>8:00am - 12:00pm</td>
        <td>Pending</td>
      </tr>  
    </tbody>
  </table>
  <div class="tooltip"></div>
   




    </div>
</div>

<!----------------------------- END OF MAIN --------------------------->
<div class="right">
    <div class="top">

    </div>
</div>
</div>

<script src="./listOfInterns.js"></script>
<script src="./index.js"></script>

</body>

</html>