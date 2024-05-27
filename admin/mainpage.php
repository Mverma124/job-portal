<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Providing Website</title>
<style>
/* CSS styles */
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f8f8f8;
}
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}
.header {
  background: linear-gradient(135deg, #1d1160, #2d2d2d);
  color: white;
  padding: 30px 0;
  text-align: center;
  border-bottom-left-radius: 50% 20%;
  border-bottom-right-radius: 50% 20%;
  position: relative;
}
.header::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #1d1160, #2d2d2d);
  border-bottom-left-radius: 50% 20%;
  border-bottom-right-radius: 50% 20%;
  z-index: -1;
}
.header h1 {
  font-size: 36px;
  margin-bottom: 10px;
}
.header p {
  font-size: 18px;
  margin-bottom: 20px;
}
.logo {
  max-width: 100px; /* Adjust the logo size as needed */
  margin-bottom: 20px; /* Add margin below the logo */
}
.search-form {
  text-align: center;
  margin-top: 20px;
}
.search-form input[type="text"] {
  padding: 10px;
  width: 60%;
  border: 2px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  margin-right: 10px;
}
.search-form button {
  padding: 10px 20px;
  background-color: #1d1160;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}
.search-form button:hover {
  background-color: #140c41;
}
.login-signup button {
  padding: 10px 20px;
  background-color: #1d1160;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}
.login-signup button:hover {
  background-color: #140c41;
}
.search-results {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
  margin-top: 40px;
}
.card {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: calc(33.33% - 20px);
  transition: box-shadow 0.3s ease;
}
.card:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.card h3 {
  font-size: 18px;
  margin-bottom: 10px;
  color: #1d1160;
}
.card p {
  margin-bottom: 5px;
}
.footer {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: #272727;
  color: #fff;
  padding: 20px 0;
  text-align: center;
}
.footer p {
  margin: 0;
}
.footer a {
  color: #fff;
  text-decoration: none;
}
</style>
</head>
<body>

<div class="header">
  <div class="container">
    <img src="Sign.jpg" alt="Logo" class="logo"> <!-- Added the logo class -->
    <div class="login-signup"> <!-- Moved the login-signup div below the logo -->
      <button onclick="window.location.href='null.php'">Login</button>
      <button onclick="window.location.href='register.php'">Sign Up</button>
    </div>
    <h1>Welcome to our Job Providing Website</h1>
    <p>Find your dream job here!</p>
    <form class="search-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="text" name="search" placeholder="Enter search keyword">
      <button type="submit">Search</button>
      <button type="button" onclick="resetPage()">Reset</button> <!-- Reset button -->
    </form>
  </div>
</div>

<div class="container">
  <div class="search-results">
    <?php
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jobs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];

        // Prepare SQL query to search for the keyword in multiple columns
        $sql = "SELECT * FROM job_postings WHERE 
                company LIKE '%$search%' OR 
                posted_by LIKE '%$search%' OR 
                location LIKE '%$search%' OR 
                job_description LIKE '%$search%' OR 
                skills_required LIKE '%$search%'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
              // Display search results in cards
              echo "<div class='card'>";
              echo "<h3>Company: " . $row["company"] . "</h3>";
              echo "<p>Posted by: " . $row["posted_by"] . "</p>";
              
              // Add login and signup buttons inside the card container
              ?>
              <div class="login-signup">
                  <button onclick="window.location.href='null.php'">Login</button>
                  <button onclick="window.location.href='register.php'">Sign Up</button>
              </div>
              <?php
              
              echo "</div>"; // Close card container
          }
      } else {
          echo "<p>No results found.</p>";
      }
      
      
    } else {
        echo "<p>Enter a search keyword above.</p>";
    }

    // Close database connection
    $conn->close();
    ?>
  </div>
</div>

<div class="footer">
  <p>&copy; 2024 Job Providing Website. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
</div>

<script>
// JavaScript function to reset the page
function resetPage() {
    window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
}
</script>

</body>
</html>
