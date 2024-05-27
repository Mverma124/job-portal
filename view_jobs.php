<?php
// Start the session
session_start();

// Include the database connection
include_once('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    $filter_sql = "SELECT * FROM job_postings WHERE 1=1";

    // Add conditions for each filter
    if (!empty($name)) {
        $filter_sql .= " AND company LIKE '%$name%'";
    }

    if (!empty($location)) {
        $filter_sql .= " AND location = '$location'";
    }

    if (!empty($date)) {
        $filter_sql .= " AND date_posted = '$date'";
    }

    $result = $conn->query($filter_sql);
} else {
    // If the form is not submitted, fetch all job postings
    $sql = "SELECT * FROM job_postings";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jobs</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }
    h2 {
        text-align: center;
        color: #1d1160;
    }
    .form-container {
        text-align: center;
        margin-bottom: 2px;
    }
    .form-container form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #1d1160;
    }
    input[type="text"],
    input[type="date"],
    input[type="submit"] {
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 10px;
    }
    input[type="submit"],
    .reset-button {
        padding: 10px 20px;
        background-color: #1d1160;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 12px;
        transition: background-color 0.3s;
        text-decoration: none; /* Remove underline */
    }
    input[type="submit"]:hover,
    .reset-button:hover {
        background-color: #140c41;
    }
    .job-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: calc(33.33% - 20px);
        transition: box-shadow 0.3s ease;
        margin-bottom: 20px;
    }
    .job-card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .job-card h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #1d1160;
    }
    .job-card p {
        margin-bottom: 5px;
    }
    button {
        padding: 10px 20px;
        background-color: #1d1160;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        margin: 20px auto;
        transition: background-color 0.3s;
        text-decoration:none;
    }
    button:hover {
        background-color: #140c41;
    }
    </style>
</head>
<body>
<?php
$title = "View Jobs"; // Set the title for this specific page
include 'navbar.php';
?>
    <div class="container">
        <h2>Job Postings</h2>

        <!-- Filter Form -->
        <div class="form-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-end;">
            <div style="flex: 1; margin-right: 10px;">
                <label for="name">Company Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div style="flex: 1; margin-right: 10px;">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location">
            </div>
            <div style="flex: 1;">
                <label for="date">Date Posted:</label>
                <input type="date" name="date" id="date">
            </div>
        </div>

        <div style="text-align: right; margin-top: 10px;">
            <input type="submit" value="Filter">
            <!-- Button to remove all filters -->
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="reset-button">Reset Filters</a>
        </div>
    </form>
</div>

    </div>
    <div class="container">
        <!-- Job Postings -->
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='job-card'>";
                echo "<h3>" . $row['company'] . "</h3>";
                echo "<p>Date Posted: " . $row['date_posted'] . "</p>";
                echo "<p>Posted By: " . $row['posted_by'] . "</p>";
                echo "<p>Location: " . $row['location'] . "</p>";
                echo "<a href='job_details.php?id=" . $row['id'] . "'>Details</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No job postings available</p>";
        }
        ?>
    </div>
    <button onclick="location.href='dashboard.php'">Dashboard</button>

    <?php include 'footer.php'; ?>
</body>
</html>

<?php
$conn->close();
?>
