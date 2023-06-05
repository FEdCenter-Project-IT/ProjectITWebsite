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

    </div>
    <!--Table-->
    <div class="intern-list">
        <h2>List of Accounts</h2>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>FIN</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <!-- <td>ARNOLD ESTEBAN</td>
                    <td>ARE (2023-33)</td>
                    <td>arnold.esteban2333@gmail.com</td>


                </tr>
                <tr>

                    <td>HAZEL TIFFANY TAYLO</td>
                    <td>HAT (2023-42)</td>
                    <td>hazeltiffany.taylo2342@gmail.com</td>


                </tr>
                <tr>

                    <td>ZAIDEE MENDOZA</td>
                    <td>ZAM (2023-19)</td>
                    <td>zaidee.mendoza2319@gmail.com</td>


                </tr>
                <tr>

                    <td>ZAIDEE MENDOZA</td>
                    <td>ZAM (2023-19)</td>
                    <td>zaidee.mendoza2319@gmail.com</td>


                </tr>
                <tr>

                    <td>SAMUEL PASTOLERO</td>
                    <td>SAP (2023-41)</td>
                    <td>samuel.pastolero2341@gmail.com</td> -->


                </tr>
            </tbody>
        </table>
    </div>



    </div>

</main>
<script src="./listOfInterns.js"></script>
    <script src="./index.js"></script>