<?php
// database.php - Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "dlsud";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// action.php - Handle form submission and database insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve project name from the form
    $projectName = $_POST["cat_name"];

    // Insert project name into the database
    $sql = "INSERT INTO projects (cat_name) VALUES ('$projectName')";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        header("Location: /interns.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
