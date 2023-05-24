<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIS Admin</title>

    <!-- MATERIAL CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLESHEET -->
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
                <a href="Dashboard.php" >
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="" class="active">
                    <span class="material-icons-sharp">groups</span>
                    <h3>Interns</h3>
                </a>
                <a href="Reports.html">
                    <span class="material-icons-sharp">description</span>
                    <h3>Reports</h3>
                </a>
                <a href="Accounts.html">
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
        <!----------------------------- END OF ASIDE --------------------------->
        <main>
            <h1>Interns</h1>

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

                <div class="Add">
                    <div class="Add Intern">
                        <a href="Add Intern.html">
                           <button class="addbtn"> + Add Intern</button>
                        </a>
                    </div>
                </div>
               
            </div>

            

            <script>
                function myFunction() 
                 {
                    document.getElementById("myDropdown").classList.toggle("show");
                 }
                window.onclick = function(event)
                 {
                    if (!event.target.matches('.dropbtn')) 
                  {
                     var dropdowns = document.getElementsByClassName("dropdown-content");
                     var i;
                     for (i = 0; i < dropdowns.length; i++) {
                     var openDropdown = dropdowns[i];
                     if (openDropdown.classList.contains('show')) 
                      {
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
                        <tr>
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
                        <tr>
                            <td>ALD (2023-40)</td>
                            <td>ALEXANDRA JULIAN DE GUZMAN</td>
                            <td>Project IT</td>
                            <td><b class="warning">Active</b></td>
                            <td class="primary">View</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <!----------------------------- END OF MAIN --------------------------->
        <div class="right">
            <div class="top">
                
            </div>
        </div>
    </div>
</body>
</html>