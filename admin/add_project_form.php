<?php
include "header.php";
?>
<main>
    <div class="Back to Intern">
        <a href="interns.php">
            <button class="backbtn">
                <h3>Back</h3>
            </button>
        </a>
    </div>

    <div class="Addpage">
        <h1>Adding Projects</h1>

        <form method="POST" action="add_project.php">
            <h3>Project Name: </h3>
            <input type="text" name="cat_name" placeholder="Project Name" id="project_name" required>
            <input type="submit" value="Add Project">
        </form>
    </div>
    <script src="./index.js"></script>
</main>
