<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIS Admin</title>

    <!-- MATERIAL CDN <ARNOLD>-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <!-- STYLESHEET <ARNOLD>-->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/logo1.jpg">
                    <h2>Admin <span  class="primary">Panel</span> </h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="interns.php">
                    <span class="material-icons-sharp">groups</span>
                    <h3>Interns</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">description</span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>List of Accounts</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">assignment_ind</span>
                    <h3>OT Request</h3>
                    <span class="message-count">32</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!----------------------------- END OF ASIDE <ARNOLD>--------------------------->
        <main>
            <h1>Dashboard</h1>

            <?php
             $serverName="LAPTOP-GBO9I3B3\SQL";
             $connectionOptions=[
             "Database"=>"DLSUD",
             "Uid"=>"",
             "PWD"=>""
             ];
             $conn=sqlsrv_connect($serverName, $connectionOptions);
             if($conn==false){
             die(print_r(sqlsrv_errors(),true));
             }
             //Variable for total number of interns
            $sql2 = "SELECT COUNT(NO) as totalcount FROM FEDCENTER_INTERN_DATA";
            $result2 = sqlsrv_query($conn,$sql2);
            //Getting the total number of interns
            $totalcount=sqlsrv_fetch_array($result2);
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
                            <h1><?php echo $totalcount['totalcount'];?></h1>
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
                    <?php ///php inside html
                    $serverName="LAPTOP-GBO9I3B3\SQL";
                    $connectionOptions=[
                    "Database"=>"DLSUD",
                    "Uid"=>"",
                    "PWD"=>""
                    ];
                    $conn=sqlsrv_connect($serverName, $connectionOptions);
                    if($conn==false){
                    die(print_r(sqlsrv_errors(),true));
                    }
                            // Getting Total List
                    $total = "SELECT * FROM FEDCENTER_INTERN_DATA";
                    $result = sqlsrv_query($conn,$total);

                            if( $result === false ) {
                                die( print_r( sqlsrv_errors(), true));
                            }
                            
                            if (sqlsrv_has_rows($result)) {
                                while($rows = sqlsrv_fetch_array($result)) {
                                    
                                    $fieldname1 = $rows['INTERN_ID'];
                                    $fieldname2 = $rows['NAME'];
                                    $fieldname3 = $rows['PROJECT'];
                                 
                            
                                    echo '<tr>
                                        
                                        <td>'.$fieldname1.'</td>
                                        <td>'.$fieldname2.'</td>
                                        <td>'.$fieldname3.'</td>
                                        
                                    </tr>';
                                }
                            } else {
                                echo 'No rows found in the result set.';
                            }
                            

      ?>
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
        <div class="right">
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
            </div>
            <!----------------------------- END OF TOP <ARNOLD> --------------------------->
        </div>
    </div>
    
    <script src="./listOfInterns.js"></script>
    <script src="./index.js"></script>

</body>
</html>