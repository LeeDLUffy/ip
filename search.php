<?php
// Database connection and query to fetch contacts data
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

// Fetch search term and campus from the request
$searchTerm = $_GET['searchTerm'];
$selectedCampus = $_GET['selectedCampus'];

// Fetch contacts based on position, department name, and selected campus
$sql = "SELECT * FROM trialexcel 
        WHERE (position LIKE '%$searchTerm%' OR deptname LIKE '%$searchTerm%') 
        AND ccode IN (SELECT ccode FROM campuses WHERE cname = '$selectedCampus')";
$result = $conn->query($sql);

// Display contacts information
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="contact">';
        echo '<h3>Extension no: ' . $row['extension'] . '</h3>';
        echo '<p>Position: ' . $row['position'] . '</p>';
        echo '<p>Department Name: ' . $row['deptname'] . '</p>';

        $ccode = $row['ccode'];
        $sqlCampus = "SELECT cname FROM campuses WHERE ccode = '$ccode'";
        $resultCampus = $conn->query($sqlCampus);

        while ($rowCampus = $resultCampus->fetch_assoc()) {
            echo '<p>Campus Name: ' . $rowCampus['cname'] . '</p>';
        }

        echo '</div>';
    }
} else {
    echo '<p>No contacts found.</p>';
}

$conn->close();
?>
