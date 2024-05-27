<?php

// Check if a session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('connection.php');

// Check if the logout button is clicked
if(isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect to mainpage.php
    header("Location: mainpage.php");
    exit(); // Exit the script
}

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "jobs";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete record if delete button is clicked
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM job_postings WHERE id = $delete_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: company.php"); // Redirect to same page after deletion
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Retrieve data from database
$sql = "SELECT * FROM job_postings";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Job Postings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-bottom: 20px;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: calc(50% - 5px);
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="date"] {
            width: calc(25% - 5px);
        }

        input[type="submit"],
        .reset-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        .reset-button:hover {
            background-color: #0056b3;
        }

        .reset-button {
            display: inline-block;
            margin-left: 10px;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border: 1px solid #007bff;
            border-radius: 3px;
        }

        .reset-button:hover {
            background-color: #0056b3;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            overflow-x: auto;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-link {
            color: red;
            text-decoration: none;
        }

        .delete-link:hover {
            color: darkred;
            text-decoration: underline;
        }

        .job-card {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);
            background-color: #fafafa;
        }

        .job-info {
            margin-bottom: 10px;
        }

        .job-info p {
            margin: 5px 0;
        }

        .delete-action {
            text-align: right;
        }

        .delete-link {
            color: red;
            text-decoration: none;
        }

        .delete-link:hover {
            color: darkred;
            text-decoration: underline;
        }

         /* navbar styles */
         .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background-color: #1d1160;
            color: #fff;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1.1);
        }

        .logo img {
            height: 50px;
            width: 70px;
            border-radius: 13px;
        }

        .nav-list {
            list-style-type: none;
            display: flex;
            margin-left: auto;
            /* Move the items to the right */
        }

        .nav-list li {
            margin-right: 20px;
        }

        .nav-list li a {
            color: #fff;
            text-decoration: none;
            font-size: 20px; /* Adjust the font size */
        }

        .signout button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 20px; /* Adjust the font size */
        }

        .signout button+button {
            margin-left: 10px;
        }

        .signout button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- navigation bar -->
    <div class="navbar">
        <div class="logo">
            <img src="Sign.jpg" alt="Company Logo" width="50">
        </div>
        <div style="width: 20px;"></div> <!-- Add space between logo and title -->
        <?php if (isset($title)) : ?>
        <h1><?php echo $title; ?></h1>
        <?php endif; ?>
        
        
        <div class="signout">
            <form action="" method="post">
                <button type="submit" name="logout">Log Out</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h1>Job Postings</h1>
        <!-- Filter Form -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="name">Company Name:</label>
            <input type="text" name="name" id="name">

            <label for="location">Location:</label>
            <input type="text" name="location" id="location">

            <label for="date">Date Posted:</label>
            <input type="date" name="date" id="date">

            <input type="submit" value="Filter">
            <!-- Button to remove all filters -->
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="reset-button">Reset Filters</a>
        </form>

        <div style="overflow-x: auto;">

            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='job-card'>";
                    echo "<div class='job-info'>";
                    echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
                    echo "<p><strong>Date Posted:</strong> " . $row['date_posted'] . "</p>";
                    echo "<p><strong>Company:</strong> " . $row['company'] . "</p>";
                    echo "<p><strong>Posted By:</strong> " . $row['posted_by'] . "</p>";
                    echo "<p><strong>Company Website:</strong> " . $row["company_website"] . "</p>";
                    echo "<p><strong>Contact Number:</strong> " . $row["contact_number"] . "</p>";
                    echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                    echo "<p><strong>Location:</strong> " . $row["location"] . "</p>";
                    echo "<p><strong>Salary:</strong> " . $row["salary"] . "</p>";
                    echo "<p><strong>Job Description:</strong> " . $row["job_description"] . "</p>";
                    echo "<p><strong>Apply By:</strong> " . $row["apply_by"] . "</p>";
                    echo "<p><strong>Skills Required:</strong> " . $row["skills_required"] . "</p>";
                    echo "<p><strong>Training Period:</strong> " . $row["training_period"] . "</p>";
                    echo "<p><strong>Link:</strong> " . $row["google_link"] . "</p>";
                    echo "</div>";
                    echo "<div class='delete-action'><a href='company.php?delete_id=" . $row['id'] . "' class='delete-link'>Delete</a></div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No job postings found</p>";
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
    
</body>

</html>