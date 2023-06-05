<?php
include "header.php"
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
                <a href="Add_account_form.php">
                    <button class="addbtn"> + Add Intern</button>
                </a>
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

<script src="./listOfInterns.js"></script>
    <script src="./index.js"></script>
</body>

</html>