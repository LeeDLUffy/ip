<?php
// Database connection and query to fetch campuses
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telephony";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch campuses from the database
$sqlCampuses = "SELECT cname FROM campuses";
$resultCampuses = $conn->query($sqlCampuses);

// Generate the dropdown menu options
if ($resultCampuses->num_rows > 0) {
    echo '<option value="">Select Campus</option>'; // Add a default option
    while ($rowCampus = $resultCampuses->fetch_assoc()) {
        $campusName = $rowCampus['cname'];
        echo '<option value="' . $campusName . '">' . $campusName . '</option>';
    }
} else {
    echo '<option value="">No campuses found</option>';
}

$conn->close();
?>
