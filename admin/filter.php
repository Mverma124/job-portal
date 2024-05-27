<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location = $_POST['location'];

    // Replace 'your_database_credentials' with your actual database credentials
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM job_postings WHERE location = '$location'";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        echo "<div class='job-posting'>";
        echo "<h2>" . $row['company'] . "</h2>";
        // Add more fields as needed
        echo "<p>" . $row['job_description'] . "</p>";
        echo "</div>";
    }

    $conn->close();
}
?>