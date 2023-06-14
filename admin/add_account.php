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

    // Connect to your MySQL database
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $db = "dlsud";

    $conn = new mysqli($servername, $username, $dbPassword, $db);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the fin or email already exist in the database
    $checkQuery = "SELECT id FROM interns WHERE fin = ? OR email = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ss", $fin, $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Either fin or email already exists
        echo '<script>';
        echo 'alert("An intern with the same FIN or email already exists.");';
        echo '</script>';
    } else {
        // Prepare and execute the SQL query
        $insertQuery = "INSERT INTO interns (full_name, fin, email, password, project, school, required_hours, start_date, completion_date, date_created)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("sssssssss", $fullName, $fin, $email, $password, $project, $school, $requiredHours, $startDate, $completionDate);

        // Check if the query executed successfully
        if ($insertStmt->execute()) {
            echo '<script>';
            echo 'alert("Intern account added successfully");';
            echo '</script>';
        } else {
            echo "Error: " . $insertStmt->error;
        }

        // Close the prepared statement
        $insertStmt->close();
    }

    // Close the database connection
    $conn->close();
}

?>

