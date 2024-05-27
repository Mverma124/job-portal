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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
        }

        footer p {
            margin: 10px;
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
        <ul class="nav-list">
            <li><a href="./dashboard.php">Home</a></li>
            <li><a href="./job.htm">Contact</a></li>
            <li><a href="./about.php">About</a></li>
            <li><a href="./view_jobs.php">View Jobs</a></li>
        </ul>
        
        <div class="signout">
            <form action="" method="post">
                <button type="submit" name="logout">Log Out</button>
            </form>
        </div>
    </div>
</body>
</html>