<?php
include "header.php";

?>
<main>
    <h1>Interns</h1>

    <div class="Back to Intern">
        <a href="listOfAccounts.php">
            <button class="backbtn">
                <h3>Back</h3>
            </button>
        </a>
    </div>

    <div class="Addpage">
        <h1>Input Intern Information</h1>

        <form method="POST" action="add_account.php">
            <h3>Full Name: </h3>
            <input type="text" name="Full_Name" placeholder="Full Name" id="Full_Name" required>

            <h3>FEd Center Intern Number: </h3>
            <input type="text" name="FIN" placeholder="Inter ID (ex. FED (2023 - 99)" id="FIN" required>

            <h3>Email: </h3>
            <input type="text" name="Email" placeholder="FEdCenter Email" id="Email" required>

            <h3>Password: </h3>
            <input type="text" name="Password" placeholder="Password" id="Password" required>

            <h3>Project/s: </h3>
            <input type="text" name="Project" placeholder="Project/s" id="Project" required>

            <h3>School: </h3>
            <input type="text" name="School" placeholder="Name of School" id="School" required>

            <h3>Required Hours: </h3>
            <input type="number" name="Required_hrs" placeholder="Required Hours" id="Required_hrs" required>

            <h3>Start Date: </h3>
            <input type="date" name="Start" id="Start" required>

            <h3>Estimated Date of Completion: </h3>
            <input type="date" name="Completion" id="Completion" required>
            <br>

            <input type="submit" value="Add Intern">
        </form>
    </div>
</main>