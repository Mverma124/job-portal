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
  <title>Admin Panel - Dashboard</title>
  <link rel="stylesheet" href="BOOTSTRAP FILES/css/bootstrap.min.css">
  <link rel="stylesheet" href="BOOTSTRAP FILES/css/all.min.css">

  <style>
    .nav-sidebar {
      height: 100%;
    }

    .nav-sidebar .nav-link {
      padding: 20px 20px;
      /* Adjust the padding to create gaps between items */
    }

    .sidebar {
      position: relative;
      top: 0;
      left: 0;
      bottom: 0;
      z-index: 100;
      padding-top: 15px;
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
      font-size: 20px;
      /* Adjust the font size */
    }

    .signout button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      font-size: 20px;
      /* Adjust the font size */
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
  <div class="navbar">
    <div class="logo">
      <h3>Job portal</h3>
      <h5> Admin Panel</h5>
    </div>

    

    <div class="signout">
      <form action="" method="post">
        <button type="submit" name="logout">Log Out</button>
      </form>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky pt-5">
          <ul class="nav flex-column nav-sidebar">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashbord.php">
                <i class="fa-solid fa-house fa-xl"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="company.php">
                <i class="fa-solid fa-building fa-xl"></i>
                Company
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users.php">
                <i class="fa-solid fa-users fa-xl"></i>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="company-registration.php">
                <i class="fa-regular fa-id-card fa-xl"></i>
                Company Registration
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa-solid fa-message fa-xl"></i>
                Feedback
              </a>
            </li>
            

          </ul>
        </div>
      </nav>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand">
          <div class=""></div>
        </div>
        <div class="chartjs-size-monitor-shrink">
          <div class=""></div>
        </div>
      </div>
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4 px-4 py-4">
        <div class="card text-white text-center bg-danger mb-4" style="max-width: 18rem; padding: 20px; margin: 20px;">
          <div class="card-header">Jobs</div>
          <div class="card-body">
            <h5 class="card-title">-</h5>
            <p class="card-text">View</p>
          </div>
        </div>
        <div class="card text-dark text-center bg-warning mb-4" style="max-width: 18rem; padding: 20px; margin: 20px;">
          <div class="card-header">Company</div>
          <div class="card-body">
            <h5 class="card-title">-</h5>
            <p class="card-text">View</p>
          </div>
        </div>
        <div class="card text-dark text-center bg-info mb-4" style="max-width: 18rem; padding: 20px; margin: 20px;">
          <div class="card-header">Users</div>
          <div class="card-body">
            <h5 class="card-title">-</h5>
            <p class="card-text">View</p>
          </div>
        </div>
        <div class="card text-white text-center bg-success mb-4" style="max-width: 18rem; padding: 20px; margin: 20px;">
          <div class="card-header">Registrations</div>
          <div class="card-body">
            <h5 class="card-title">-</h5>
            <p class="card-text">View</p>
          </div>
        </div>
      </div>
      </div>
  </div>

  <script src="BOOTSTRAP FILES/js/bootstrap.min.js"></script>
  <script src="BOOTSTRAP FILES/js/jquery-3.6.3.js"></script>
  <script src="BOOTSTRAP FILES/js/all.min.js"></script>
</body>

</html>