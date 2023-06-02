<?php
include "header.php";
?>
<!----------------------------- END OF ASIDE --------------------------->
<main>
    <h1>Reports</h1>

    <div class="date">
        <input type="date">
    </div>

    <div class="Back">
        <a href="ProjIT_Reports.php">
            <button class="backbtn"> Back </button>
        </a>
    </div>


    <div class="Addpage">

        <h1>Input Action Item Information</h1>

        <form>
            <h3>Project Name:</h3>
            <input type="text" name="Proj Name" id="Proj Name" required>

            <h3>Action Items/Tasks: </h3>
            <input type="text" name="FIN" id="FIN" required>

            <input type="submit" value="Add Action Item/s">

        </form>

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