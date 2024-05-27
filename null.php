
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #1d1160;
      color: white;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-form {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      text-align: center;
    }

    .login-form h2 {
      margin-bottom: 20px;
      color: #1d1160;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #1d1160;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .login-form input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: none;
      border-radius: 5px;
      background-color: #1d1160;
      color: white;
      cursor: pointer;
    }

    .login-form input[type="submit"]:hover {
      background-color: #000;
    }

    .login-form .login-type-buttons {
      margin-bottom: 20px;
    }

    .login-form .login-type-buttons button {
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #1d1160;
      color: white;
      cursor: pointer;
      margin-right: 10px; /* Adjust the margin between buttons */
    }

    .login-form .login-type-buttons button:last-child {
      margin-right: 0; /* Remove margin from the last button */
    }

    .login-form .login-type-buttons button:hover {
      background-color: #000;
    }

    .login-form .admin-login,
    .login-form .company-login {
      display: none;
    }
  </style>
</head>
<body>
  <div class="login-form">
    <!-- <h2>Login</h2> -->
    <div class="login-type-buttons">
      <button onclick="showUserLoginForm()">User Login</button>
     
      <!-- <button onclick="showCompanyLoginForm()">Company Login</button> -->
    </div>
    <div class="user-login">
      <h2>User Login</h2>
      <form action="login.php" method="post">
        <input type="text" name="email" autocomplete="off" placeholder="Enter your e-mail">
        <input type="password" name="password" autocomplete="off" placeholder="Enter your password">
        <input type="submit" value="Login" name="login">
      </form><br>
      <p align="center">Don't have an Account Yet?<a href="register.php" class="text-warning" style="font-weight:200;text-decoration:none;text-align:center">Register Here!</a></p>
      <p align="center">Don't have an Account Yet?<a href="admin.php" class="text-warning" style="font-weight:200;text-decoration:none;text-align:center">Admin!</a></p>
        
    </div>

    <div class="admin-login">
      <h2>Admin Login</h2>
      <form action="#">
        <input type="text" placeholder="Admin Username">
        <input type="password" placeholder="Admin Password">
        <input type="submit" value="Login" name="login">
      </form><br>
      <p align="center">Don't have an Account Yet?<a href="register.php" class="text-warning" style="font-weight:200;text-decoration:none;text-align:center">Register Here!</a></p>
        
    </div>
    <!-- <div class="company-login">
      <h2>Company Login</h2>
      <form action="#">
        <input type="text" placeholder="Company Username">
        <input type="password" placeholder="Company Password">
        <input type="submit" value="Login">
      </form>
    </div> -->
  </div>

  <script>
    function showUserLoginForm() {
      document.querySelector('.user-login').style.display = 'block';
      document.querySelector('.admin-login').style.display = 'none';
    //   document.querySelector('.company-login').style.display = 'none';
    }

    function showAdminLoginForm() {
      document.querySelector('.user-login').style.display = 'none';
      document.querySelector('.admin-login').style.display = 'block';
    //   document.querySelector('.company-login').style.display = 'none';
    }

    // function showCompanyLoginForm() {
    //   document.querySelector('.user-login').style.display = 'none';
    //   document.querySelector('.admin-login').style.display = 'none';
    //   document.querySelector('.company-login').style.display = 'block';
    // }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>
