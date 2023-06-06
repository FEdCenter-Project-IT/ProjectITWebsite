<?php
include "header.php";
?>

<main>
    <h1>List of Accounts</h1>

    <div class="date">
        <input type="date">
    </div>

    <div class="subheader">
        <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()"> All Projects
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="myDropdown">
                <a href="#"> Project Accounting</a>
                <a href="#">Project Alterna</a>
                <a href="#">Project Astra</a>
                <a href="#">Project Business Dev</a>
                <a href="#">Project CEO</a>
                <a href="#">Project Fin Ed</a>
                <a href="#">Project GSG</a>
                <a href="#">Project HR</a>
                <a href="#">Project IMG</a>
                <a href="#">Project IT</a>
                <a href="#">Project IUS</a>
                <a href="#">Project JCFAP</a>
                <a href="#">Project Marketing</a>
                <a href="#">Project Sales</a>
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

        <div class="Add">
            <div class="Add Intern">
                <a href="Add_account_form.php">
                    <button class="addbtn"> + Add Intern Account</button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="intern-list">
            <h2>List of Accounts</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>FIN</th>
                        <th>Email</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    // Fetch the list of accounts from the "interns" table
                    $sql = "SELECT Full_Name, FIN, Email, date_created FROM interns";
                    $result = mysqli_query($conn, $sql);

                    // Loop through the query results and display the accounts in the table
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['Full_Name'] . "</td>";
                            echo "<td>" . $row['FIN'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['date_created'] . "</td>"; // Display the created time column
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No accounts found.</td></tr>";
                    }


                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
</main>
<script src="./listOfInterns.js"></script>
<script src="./index.js"></script>