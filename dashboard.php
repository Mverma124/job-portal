<?php
// Start session if not already started
session_start();

// Include the database connection
include_once('connection.php');

// Initialize session variables
$_SESSION['name'];
$_SESSION['email'];

// Database connection
$db_host = 'localhost';
$db_username = 'root'; // Change this to your database username
$db_password = ''; // Change this to your database password
$db_name = 'jobs';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user details based on session email
$email = $_SESSION['email'];
$sql = "SELECT * FROM tbl_user WHERE email='$email'";
$result = mysqli_query($conn, $sql);

// Fetch job postings associated with the user's email from job_postings
$sql_job_postings = "SELECT * FROM job_postings WHERE email='$email'";
$result_job_postings = mysqli_query($conn, $sql_job_postings);

// Update user details if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $id = key($_POST['update']);
        $name = $_POST['name'];
        $number = $_POST['number'];
        $city = $_POST['city'];
        $age = $_POST['age'];
        
        $update_sql = "UPDATE tbl_user SET name='$name', number='$number', city='$city', age='$age' WHERE ID='$id'";
        if (mysqli_query($conn, $update_sql)) {
            echo "Record updated successfully";
            // Set a session variable to indicate that the page should refresh
            $_SESSION['refresh_page'] = true;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}

// Check if the page should refresh
if (isset($_SESSION['refresh_page']) && $_SESSION['refresh_page']) {
    // Unset the session variable to avoid continuous refreshing
    unset($_SESSION['refresh_page']);
    // Refresh the page after 1 second
    echo '<meta http-equiv="refresh" content="1">';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 1px;
            font-size: 16px; /* Adjust the font size to your preference */
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-row {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: calc(100% - 22px); /* Adjusted width to accommodate padding and border */
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        .logout-button {
            padding: 10px 20px;
            background-color: #1d1160;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none; /* Remove underline */
        }

        input[type="submit"]:hover,
        .logout-button:hover {
            background-color: #483d8b;
        }

        input[type="text"][readonly] {
            background-color: #f2f2f2;
            cursor: not-allowed;
        }

        .job-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .form-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .form-row {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: calc(100% - 22px); /* Adjusted width to accommodate padding and border */
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .update-button {
            padding: 10px 20px;
            background-color: #1d1160;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #483d8b;
        }

    </style>
</head>

<body>
    <?php
    // Include navbar
    $title = "Dashboard"; // Set the title for this specific page
    include 'navbar.php';
    ?>
    <div class="container">
        <h2>Your Details</h2>
        <div class="form-row">
            <form method="post">
                <!-- Logout and navigation buttons -->
                <button type="submit" name="logout" class="logout-button">Logout</button>
                <a href="job_post_form.php" class="logout-button">Go to Job Post Form</a>
                <a href="view_jobs.php" class="logout-button">View Jobs</a>
            </form>
        </div>
        <!-- User details form -->
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="form-card">
                <form method="post">
                    <div class="form-row">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="number">Number</label>
                        <input type="text" name="number" value="<?php echo $row['number']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="city">City</label>
                        <input type="text" name="city" value="<?php echo $row['city']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="age">Age</label>
                        <input type="text" name="age" value="<?php echo $row['age']; ?>">
                    </div>
                    <div class="form-row">
                        <!-- Update button with ID as array key -->
                        <button class="update-button" type="submit" name="update[<?php echo $row['ID']; ?>]">Update</button>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
    <!-- Job Postings -->
    <div class="container">
    <h2>Jobs posted by you</h2>
    <!-- Display job postings -->
    <?php 
    if ($result_job_postings && mysqli_num_rows($result_job_postings) > 0) {
        while ($row_job_posting = mysqli_fetch_assoc($result_job_postings)) {
            ?>
            <div class="job-card">
                <h3><?php echo $row_job_posting['company']; ?></h3>
                <p>Date Posted: <?php echo $row_job_posting['date_posted']; ?></p>
                <p>Email: <?php echo $row_job_posting['email']; ?></p>
                <p>Posted By: <?php echo $row_job_posting['posted_by']; ?></p>
                <p>Company Website: <a href="<?php echo $row_job_posting['company_website']; ?>"><?php echo $row_job_posting['company_website']; ?></a></p>
                <p>Contact Number: <?php echo $row_job_posting['contact_number']; ?></p>
                <p>Location: <?php echo $row_job_posting['location']; ?></p>
                <p>Salary: <?php echo $row_job_posting['salary']; ?></p>
                <p>Job Description: <?php echo $row_job_posting['job_description']; ?></p>
                <p>Last date to apply: <?php echo $row_job_posting['apply_by']; ?></p>
                <p>Skills Required: <?php echo $row_job_posting['skills_required']; ?></p>
                <p>Training Period: <?php echo $row_job_posting['training_period']; ?></p>
                <p>Google Form Link: <a href="<?php echo $row_job_posting['google_link']; ?>"><?php echo $row_job_posting['google_link']; ?></a></p>
                
                <!-- Delete button -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="job_id" value="<?php echo $row_job_posting['id']; ?>">
                    <button type="submit" name="delete" class="delete-button">Delete</button>
                </form>
            </div>
            <?php 
        }
    } else {
        echo "<p>No job postings found.</p>";
    } 
    ?>
</div>

<?php
// Handle deletion when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Check if the job ID is provided
    if (isset($_POST['job_id'])) {
        // Sanitize the job ID to prevent SQL injection
        $job_id = mysqli_real_escape_string($conn, $_POST['job_id']);
        
        // SQL query to delete the job posting
        $delete_query = "DELETE FROM job_postings WHERE id = '$job_id'";
        
        // Execute the delete query
        if (mysqli_query($conn, $delete_query)) {
            // Refresh the page after deletion
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error deleting job posting: " . mysqli_error($conn);
        }
    } else {
        echo "Job ID is not provided.";
    }
}
?>




    <?php include 'footer.php'; ?>
</body>

</html>
