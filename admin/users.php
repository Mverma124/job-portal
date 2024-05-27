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
    <title>User Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-bottom: 20px;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
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

        .user-card {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);
            background-color: #fafafa;
        }

        .user-info {
            margin-bottom: 10px;
        }

        .user-info p {
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
        <h2>User Details</h2>
        <!-- Form for filtering user details (if needed) -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="name">User Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Filter">
                <!-- Button to remove all filters -->
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="reset-button">Reset Filters</a>
            </div>
        </form>
    </div>

    <div class="container">
        <!-- PHP code to fetch and display user details -->
        <?php
        // Include database connection file
        include_once ('connection.php');

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Initialize variables
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $location = isset($_POST['location']) ? $_POST['location'] : '';
            $age = isset($_POST['age']) ? $_POST['age'] : '';

            // Construct SQL query based on filter criteria
            $sql = "SELECT * FROM tbl_user WHERE 1=1";
            if (!empty($name)) {
                $sql .= " AND name LIKE '%$name%'";
            }
            if (!empty($location)) {
                $sql .= " AND city = '$location'";
            }
            if (!empty($age)) {
                $sql .= " AND age = '$age'";
            }

            // Execute SQL query
            $result = mysqli_query($conn, $sql);

            // Display user details
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='user-card'>";
                    echo "<div class='user-info'>";
                    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
                    echo "<p><strong>Number:</strong> " . $row['number'] . "</p>";
                    echo "<p><strong>City:</strong> " . $row['city'] . "</p>";
                    echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";
                    echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No users found.</p>";
            }
        } 
        else {
            // If form is not submitted, fetch all users
            $sql = "SELECT * FROM tbl_user";
            $result = mysqli_query($conn, $sql);

            // Display user details
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='user-card'>";
                    echo "<div class='user-info'>";
                    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
                    echo "<p><strong>Number:</strong> " . $row['number'] . "</p>";
                    echo "<p><strong>City:</strong> " . $row['city'] . "</p>";
                    echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";
                    echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No users found.</p>";
            }
        }
        ?>
    </div>
    
</body>

</html>