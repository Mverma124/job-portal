<?php
// Start the session to access session variables
session_start();

// Include the connection file
include_once('connection.php');

// Retrieve the email from the session if it exists, otherwise set it to an empty string
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>

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
    <title>Job Posting Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e3e3e3;
            color: #333;
            margin: 0
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form {
            display: flex;
            flex-direction: row;
            width: 80%;
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
    </style>
</head>
<body>
<?php
$title = "Post Jobs"; // Set the title for this specific page
include 'navbar.php';
?>
<div class="container">
    <h2>Job Posting Form</h2>
</div>
<div class="container">
    <!-- Start of the form -->
    <form action="process_job_post.php" method="post" class="form">
        
        <!-- Other sections of the form -->
        <div class="form-section">
            <!-- Other input fields -->
            <label for="date_posted">Date Posted:</label>
            <input type="date" name="date_posted" required>
            <div class="form-section">
            <!-- Email input field -->
            <label for="email">Email:</label>
            <!-- Set the value of the email input to the session email and make it readonly -->
            <input type="email" name="email" value="<?php echo $email; ?>" readonly>
        </div>
            <label for="company">Company:</label>
            <input type="text" name="company" required>

            <label for="posted_by">Posted By:</label>
            <input type="text" name="posted_by" required>

            <label for="company_website">Company Website:</label>
            <input type="url" name="company_website" required>

            <label for="contact_number">Contact Number:</label>
            <input type="tel" name="contact_number" required>

            <label for="location">Location:</label>
            <input type="text" name="location" required>
        </div>
        <div class="form-section">
            <!-- Additional input fields -->
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

            <label for="google_link">Form Link:</label>
            <input type="url" name="google_link" required>
            <div class="container">
                <!-- Submit button -->
                <input type="submit" class="reset-button" value="Submit">
            </div>
        </div>
    </form>
    <!-- End of the form -->
</div>
<?php include 'footer.php'; ?>
</body>
</html>
