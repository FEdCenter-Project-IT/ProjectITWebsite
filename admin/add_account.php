<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $fullName = $_POST['Full_Name'];
    $fin = $_POST['FIN'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $project = $_POST['Project'];
    $school = $_POST['School'];
    $requiredHours = $_POST['Required_hrs'];
    $startDate = $_POST['Start'];
    $completionDate = $_POST['Completion'];

    // Validate and sanitize the form inputs
    // ...

    // Connect to your MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "dlsud";

    $conn = new mysqli($servername, $username, $password, $db);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO interns (full_name, fin, email, password, project, school, required_hours, start_date, completion_date)
            VALUES ('$fullName', '$fin', '$email', '$password', '$project', '$school', '$requiredHours', '$startDate', '$completionDate')";

if ($conn->query($sql) === TRUE) {
    echo '<script>';
    echo 'alert("Intern account added successfully");';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


    // Close the database connection
    $conn->close();
}
