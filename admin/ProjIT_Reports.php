<?php
include "header.php";
?>
<!----------------------------- END OF ASIDE --------------------------->
<main>
    <h1>Reports/ Project IT</h1>

    <div class="date">
        <input type="date">
    </div>

    <div class="subheader">
        <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()"> Projects
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
            <div class="Add Action Items">
                <a href="Add Action Items.html">
                    <button class="addbtn"> + Add Action Items</button>
                </a>
            </div>
        </div>

        <div class="Back">
            <a href="Reports.html">
                <button class="backbtn"> Back </button>
            </a>
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
        <h2>List of Action Items/Tasks</h2>
        <table>
            <thead>
                <tr>
                    <th>Concern/Topic</th>
                    <th>Action Item/Task</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>Monday Morning Meeting</td>
                    <td>Present Progress</td>
                    <td><b class="warning">Pending</b></td>

                </tr>
                <tr>

                    <td>Internal Meeting</td>
                    <td>Internal Meeting with Ms. Kris</td>
                    <td><b class="danger">Open</b></td>

                </tr>
                <tr>

                    <td>Team Meeting</td>
                    <td>Coding Collaboration</td>
                    <td><b class="success">Closed</b></td>

                </tr>
                <tr>

                    <td>Internal Meeting</td>
                    <td>Internal Meeting with Sir Marc</td>
                    <td><b class="warning">Pending</b></td>

                </tr>
                <tr>

                    <td>Team Meeting</td>
                    <td>Coding Collaboration</td>
                    <td><b class="success">Closed</b></td>

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