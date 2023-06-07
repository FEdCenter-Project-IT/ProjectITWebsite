<?php
include "header.php"
?>

   <!----------------------------- END OF ASIDE --------------------------->
        <main>
            <h1>Overtime Requests</h1>

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
    
               
            </div>

            <!--Table--> 
            <div class="intern-list">
                <h2>Overtime Requests List</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>FIN</th>
                            <th>Action Item</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           
                            <td>ARNOLD ESTEBAN</td>
                            <td>ARE (2023-33)</td>
                            <td>Coding</td>
                            <td><button class="Overtimebtn">Accept</button></td>
                           
                            
                            
                        </tr>
                        <tr>
                           
                            <td>HAZEL TIFFANY TAYLO</td>
                            <td>HAT (2023-42)</td>
                            <td>Coding</td>
                            <td><button class="Overtimebtn">Accept</button></td>
                           
                            
                        </tr>
                        <tr>
                            
                            <td>ZAIDEE MENDOZA</td>
                            <td>ZAM (2023-19)</td>
                            <td>Drafting MOM</td>
                            <td><button class="Overtimebtn">Accept</button></td>
                            
                        </tr>
                        <tr>
                            
                            <td>ALEXANDRA DE GUZMAN</td>
                            <td>ALD (2023-40)</td>
                            <td>Drafting MOM</td>
                            <td><button class="Overtimebtn">Accept</button></td>
                           
                        </tr>
                        <tr>
                           
                            <td>SAMUEL PASTOLERO</td>
                            <td>SAP (2023-41)</td>
                            <td>Coding</td>
                            <td><button class="Overtimebtn">Accept</button></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
           
           
               
            </div>

        </main>
        <!----------------------------- END OF MAIN --------------------------->
        <div class="right">
            <div class="top">
                
            </div>
        </div>


        <script src="./listOfInterns.js"></script>
        <script src="./index.js"></script>