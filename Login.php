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
    <input type="text" id="email" name="email" required />

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required />

    <!-- Add UserType field with options for Customer, Staff, and Admin -->
    <label for="user_type">User Type:</label>
    <select name="user_type" required>
      <option value="">Select User Type</option>
      <option value="Patient">Patient</option>
      <option value="Doctor">Doctor</option>
      <option value="Admin">Admin</option>
    </select>

    <input type="submit" name="submit" value="Login" />
  </form>
  <p>Don't have an account? <a href="Register.php">Create an account</a>.</p>
</div>

<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "abclab";
    private $conn;

    // Constructor to establish database connection
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to authenticate user based on email, password, and user type
    public function authenticateUser($email, $password, $userType) {
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        $query = "";
        
        if ($userType == 'Patient') {
            $query = "SELECT * FROM register WHERE email='$email' AND password='$password'";
        } elseif ($userType == 'Doctor') {
            $query = "SELECT * FROM doctor WHERE email='$email' AND password='$password'";
        } elseif ($userType == 'Admin') {
            $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        }

        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            // User authenticated successfully
            return true;
        } else {
            // User authentication failed
            return false;
        }
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    // Create database object
    $db = new Database();

    // Authenticate user
    if ($db->authenticateUser($email, $password, $userType)) {
        // User authenticated successfully
        echo "Login successful!";
        // Redirect user based on user type
        if ($userType == 'Patient') {
            header("Location: patientHome.html");
        } elseif ($userType == 'Doctor') {
            header("Location: doctorhome.php");
        } elseif ($userType == 'Admin') {
            header("Location: adminhome.php");
        }
        exit(); // Stop further execution
    } else {
        // User authentication failed
        echo "Login failed. Please check your credentials.";
    }

    // Close database connection
    $db->closeConnection();
}
?>





</body>
</html>
