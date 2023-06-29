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

// Fetch search term from the request
$searchTerm = $_GET['searchTerm'];

// Fetch contacts based on position or department name
$sql = "SELECT * FROM trialexcel WHERE position LIKE '%$searchTerm%' OR deptname LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Display contacts information
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="contact">';
        echo '<h3>Extension no:' . $row['extension'] . '</h3>';
        echo '<p>Position: ' . $row['position'] . '</p>';
        echo '<p>Dept Name: ' . $row['deptname'] . '</p>';
        $ccode=$row['ccode'];


        $sqlCampus = "SELECT cname FROM campuses WHERE ccode='".$ccode."'";
        $resultCampus = $conn->query($sqlCampus);
        
    while ($rowCampus = $resultCampus->fetch_assoc()) {
            echo '<p>Campus name: ' . $rowCampus['cname'] . '</p>';
            
    }
    echo '</div>';

    }
} else {
    echo '<p>No contacts found.</p>';
}

$conn->close();
?>
