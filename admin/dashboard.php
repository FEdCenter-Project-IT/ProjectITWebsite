<?php
include "header.php";
?>
<!----------------------------- END OF ASIDE <ARNOLD>--------------------------->
<main>
    <h1>Dashboard</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "dlsud";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Variable for total number of interns
    $sql2 = "SELECT COUNT(NO) as totalcount FROM fedcenter_intern_data";
    $result2 = mysqli_query($conn, $sql2);

    // Getting the total number of interns
    $totalcount = mysqli_fetch_assoc($result2)['totalcount'];

    // Close connection
    mysqli_close($conn);
    ?>


    <div class="date">
        <input type="date">
    </div>

    <div class="insights">
        <div class="total-intern">
            <span class="material-icons-sharp">groups</span>
            <div class="middle">
                <div class="left">
                    <h3>Total Interns</h3>
                    <?php if ($totalcount > 0) { ?>
                        <h1><?php echo $totalcount; ?></h1>
                    <?php } else { ?>
                        <h1>No Interns</h1>
                    <?php } ?>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx='38' cy='38' r='36'></circle>
                    </svg>
                    <div class="number">
                        <p>75</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last update</small>
        </div>


    <!----------------------------- END OF TOTAL INTERNS <ARNOLD>--------------------------->
    <div class="active">
        <span class="material-icons-sharp">settings_accessibility</span>
        <div class="middle">
            <div class="left">
                <h3>Active</h3>
                <h1>65</h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx='38' cy='38' r='36'></circle>
                </svg>
                <div class="number">
                    <p>65</p>
                </div>
            </div>
        </div>
        <small class="text-muted">Last update</small>
    </div>
    <!----------------------------- END OF TOTAL ACTIVE <ARNOLD>--------------------------->
    <div class="inactive">
        <span class="material-icons-sharp">account_circle</span>
        <div class="middle">
            <div class="left">
                <h3>Inactive</h3>
                <h1>10</h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx='38' cy='38' r='36'></circle>
                </svg>
                <div class="number">
                    <p>10</p>
                </div>
            </div>
        </div>
        <small class="text-muted">Last update</small>
    </div>
    <!----------------------------- END OF TOTAL INACTIVE <ARNOLD>--------------------------->
    </div>
    <!----------------------------- END OF INSIGHTS <ARNOLD>--------------------------->

    <div class="intern-list">
        <h2>List of Interns</h2>
        <table class="intern-table">
            <thead>
                <tr>
                    <th>Intern No.</th>
                    <th>Name</th>
                    <th>Project</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $db = "dlsud";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $db);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Getting Total List
                $total = "SELECT * FROM fedcenter_intern_data";
                $result = mysqli_query($conn, $total);

                if ($result === false) {
                    die("Error: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_array($result)) {
                        $fieldname1 = $rows['Intern_ID'];
                        $fieldname2 = $rows['Name'];
                        $fieldname3 = $rows['Project'];

                        echo '<tr>
                            <td>' . $fieldname1 . '</td>
                            <td>' . $fieldname2 . '</td>
                            <td>' . $fieldname3 . '</td>
                          </tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">No rows found in the result set.</td></tr>';
                }

                // Close connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <!-- <tbody> -->

    <!-- <tr>
                            <td>ARE (2023-33)</td>
                            <td>ARNOLD ESTEBAN</td>
                            <td>Project IT</td>
                            <td><b class="danger">Inactive</b></td>
                            <td class="primary">View</td>
                        </tr>
                        <tr>
                            <td>HAT (2023-42)</td>
                            <td>HAZEL TIFFANY TAYLO</td>
                            <td>Project IT</td>
                            <td><b class="warning">Active</b></td>
                            <td class="primary">View</td>
                        </tr>
                        <tr>
                            <td>ZAM (2023-19)</td>
                            <td>ZAIDEE MENDOZA</td>
                            <td>Project IT</td>
                            <td><b class="warning">Active</b></td>
                            <td class="primary">View</td>
                        </tr>
                        <tr>
                            <td>SAP (2023-41)</td>
                            <td>SAMUEL PASTOLERO</td>
                            <td>Project IT</td>
                            <td><b class="warning">Active</b></td>
                            <td class="primary">View</td>
                        </tr>
                      
                    </tbody>
                </table>
                <a href="Interns.html">Show All</a>
            </div>
        </main>
        <----------------------------- END OF MAIN <ARNOLD>--------------------------->
    <!-- <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hello, <b>Arnold</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="images/zoomDP2x2.jpg" alt="profile">
                        </div>
                    </div>
                </div> -->
    <!----------------------------- END OF TOP <ARNOLD> --------------------------->
    </div>
    </div>

    <script src="./listOfInterns.js"></script>
    <script src="./index.js"></script>

    </body>

    </html>