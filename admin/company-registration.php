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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datePosted = $_POST['date_posted'];
    $company = $_POST['company'];
    $postedBy = $_POST['posted_by'];
    $companyWebsite = $_POST['company_website'];
    $contactNumber = $_POST['contact_number'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $jobDescription = $_POST['job_description'];
    $applyBy = $_POST['apply_by'];
    $skillsRequired = $_POST['skills_required'];
    $trainingPeriod = $_POST['training_period'];
    $googleLink = $_POST['google_link'];

    $sql = "INSERT INTO job_postings (date_posted, company, posted_by, company_website, contact_number, email, location, salary, job_description, apply_by, skills_required, training_period, google_link) 
            VALUES ('$datePosted', '$company', '$postedBy', '$companyWebsite', '$contactNumber', '$email', '$location', '$salary', '$jobDescription', '$applyBy', '$skillsRequired', '$trainingPeriod', '$googleLink')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_jobs.php");
        exit(); // Ensure that no more code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Job Posting Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e3e3e3;
            color: #333;
            padding-bottom: 20px;
            margin: 0;
        }

        .container {
            /* display: flex;
    justify-content: center; */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* This centers items horizontally */
            justify-content: center;
            /* This centers items vertically */
        }

        .form {
            display: flex;
            flex-direction: row;
            width: 80%;
            /* Adjust as needed */
        }

        .form-section {
            flex: 1;
            padding: 0 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="url"],
        input[type="tel"],
        input[type="email"],
        textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        .reset-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;

        }

        input[type="submit"]:hover,
        .reset-button:hover {
            background-color: #2980b9;
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
        <h2>Company Registration Form</h2>
    </div>
    <div class="container">
        <form action="process_job_post.php" method="post" class="form">

            <div class="form-section">
                <label for="date_posted">Date Posted:</label>
                <input type="date" name="date_posted" required>

                <label for="company">Company:</label>
                <input type="text" name="company" required>

                <label for="posted_by">Posted By:</label>
                <input type="text" name="posted_by" required>

                <label for="company_website">Company Website:</label>
                <input type="url" name="company_website" required>

                <label for="contact_number">Contact Number:</label>
                <input type="tel" name="contact_number" required>

                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="location">Location:</label>
                <input type="text" name="location" required>

            </div>
            <div class="form-section">


                <label for="salary">Salary:</label>
                <input type="text" name="salary" required>

                <label for="job_description">Job Description:</label>
                <textarea name="job_description" rows="4" required></textarea>

                <label for="apply_by">Apply By (Last Date):</label>
                <input type="date" name="apply_by" required>

                <label for="skills_required">Skills Required:</label>
                <input type="text" name="skills_required" required>

                <label for="training_period">Training Period (time):</label>
                <input type="text" name="training_period" required>

                <label for="google_link">Google Link:</label>
                <input type="url" name="google_link" required>
                <div class="container">
                    <button type="submit" class="reset-button">Submit</button>
                </div>
            </div>


        </form>

    </div>
</body>

</html>