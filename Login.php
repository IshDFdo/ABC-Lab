<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="styles.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Login Form</title>

<style type="text/css">
  body {
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url("ll.gif") no-repeat center center fixed; /* Set background image */
    background-size: cover; /* Adjust background image size */
    font-family: Arial, sans-serif;
    color: white;
    margin: 0;
  }

  h1 {
    text-align: center;
  }

  #login-form {
    width: 400px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: 10px;

    /* Center the form horizontally and vertically */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .error {
    color: red;
    font-family: Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
    font-size: 16px;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="password"],
  select {
    width: 100%; /* Make the width 100% */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #45a049; /* Background color of navigation bar */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #555; /* Darken background color on hover */
  }
</style>

<script type="text/javascript">
  
</script>

</head>

<body>

<nav class="navbar">
  <div class="logo">Alpha BioMed Clinic</div>
  <ul class="nav-links">
    <div class="menu">
       <li><a href="home.html">Home</a></li>
        <li><a href="Register.php">Register</a></li>
        <li><a href=" Login.php ">Login</a></li>
        <li><a href="services.html">Services </a></li>
        <li><a href="AboutUs.html">About Us</a></li>
    </div>
  </ul>
</nav>

<div id="login-form">
  <h1>User Login Form</h1>
  <form name="login" method="post" action="login.php" >
    
    
    <label for="email">Email:</label>
    <input type="text" name="email" required />

    <label for="password">Password:</label>
    <input type="password" name="password" required />

    <!-- Add UserType field with options for Customer, Staff, and Admin -->
    <label for="user_type">User Type:</label>
    <select name="user_type" required>
      <option value="">Select User Type</option>
      <option value="Customer">Patient</option>
      <option value="Staff">Doctor</option>
      <option value="Admin">Admin</option>
    </select>

    <input type="submit" name="submit" value="Login" />
  </form>
  <p>Don't have an account? <a href="Register.php">Create an account</a>.</p>
</div>

</body>
</html>
