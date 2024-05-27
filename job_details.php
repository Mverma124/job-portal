<!DOCTYPE html>
<html lang="en">
<script language='javascript' type='text/javascript'>
function DisableBackButton() {
window.history.forward()
}
DisableBackButton();
window.onload = DisableBackButton;
window.onpageshow = function(evt) { if (evt.persisted) DisableBackButton() }
window.onunload = function() { void (0) }
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #e3e3e3;
        }

        header {
            background-color: #1d1160;
            color: white;
            padding: 15px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        nav {
            background-color: #f6f6f6;
            padding: 10px;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .job-details {
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 auto;
            max-width: 800px;
        }

        .job-details h2 {
            color: #343a40;
            margin-bottom: 10px;
        }

        .job-details p {
            margin-bottom: 5px;
        }

        .job-details a {
            color: #007bff;
            text-decoration: none;
        }

        .job-details a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
$title = "Job Details"; // Set the title for this specific page
include 'navbar.php';
?>




<br>

<section class="job-details">
    <?php
    include('db.php');

    // Check if the ID parameter is set in the URL
    if (isset($_GET['id'])) {
        $job_id = $_GET['id'];

        // Retrieve job details based on ID
        $details_sql = "SELECT * FROM job_postings WHERE id = $job_id";
        $details_result = $conn->query($details_sql);

        if ($details_result->num_rows > 0) {
            $details_row = $details_result->fetch_assoc();

            // Display job details
            echo "<h2>Company: " . $details_row['company'] . "</h2>";
            echo "<p><strong>Date posted:</strong> " . $details_row['date_posted'] . "</p>";
            echo "<p><strong>Posted by:</strong> " . $details_row['posted_by'] . "</p>";
            echo "<p><strong>Company Website:</strong> <a href='" . $details_row['company_website'] . "' target='_blank'>Link</a></p>";
            echo "<p><strong>Contact Number:</strong> " . $details_row['contact_number'] . "</p>";
            echo "<p><strong>Email:</strong> " . $details_row['email'] . "</p>";
            echo "<p><strong>Location:</strong> " . $details_row['location'] . "</p>";
            echo "<p><strong>Salary:</strong> " . $details_row['salary'] . "</p>";
            echo "<h2>Job Description</h2>";
            echo "<p>" . $details_row['job_description'] . "</p>";
            echo "<p>Apply By: " . $details_row['apply_by'] . "</p>";
            echo "<h2>Skills Required</h2>";
            echo "<p>" . $details_row['skills_required'] . "</p>";
            echo "<h2>Training Period</h2>";
            echo "<p>" . $details_row['training_period'] . "</p>";
            echo "<p><strong>Apply Now:</strong> <a href='" . $details_row['google_link'] . "' target='_blank'>Link</a></p>";

        } else {
            echo "Job details not found";
        }
    } else {
        echo "Invalid request";
    }

    $conn->close();
    ?>
</section>
<br>
<?php include 'footer.php'; ?>
</body>
</html>
