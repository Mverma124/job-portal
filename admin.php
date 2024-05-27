<?php
// Database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "jobs"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate user credentials
function validate_user($conn, $email, $password) {
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM admin_users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        return true;
    } else {
        return false;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user credentials
    if (validate_user($conn, $email, $password)) {
        // Redirect to admin dashboard
        header("Location: admin/dashbord.php");
        exit;
    } else {
        // Display error message
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
    
/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #1d1160;
}

/* Container styles */
.login-container {
    max-width: 500px;
    margin: 200px auto;
    padding: 50px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Heading styles */
h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

/* Form styles */
.input-group {
    margin-bottom: 15px;
}

.label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Button styles */
button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Error message styles */
.error-message {
    color: red;
    margin-bottom: 15px;
    text-align: center;
}
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
