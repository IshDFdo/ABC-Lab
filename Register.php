<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"> 

<head>
<link rel="stylesheet" href="styles.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration Form</title>

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

  #registration-form {
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

  .success {
    color: green;
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
    width: 100%;
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

<div id="registration-form">
<form action="Register.php" method="POST" class="registration-form">
  <h1>User Registration Form</h1>
    <label for="name">Username:</label>
    <input type="text" id="UserName" name="UserName" required />
    
    <label for="email">Email:</label>
    <input type="text" id= "Email" name="Email" required />

    <label for="Password">Password:</label>
    <input type="password" id= "Password" name="Password" required />

    <label for="Confirm Password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required />
    
    <div class="error" id="error_message"></div> <!-- Error message container -->
    <div class="success" id="success_message"></div> <!-- Success message container -->

    <!-- Add UserType field with options for Customer, Staff, and Admin -->
  
    <input type="submit" name="submit" value="Register" />
    <br>
    <p>Already have an account? <a href="Login.php">Login </a>.</p>
  </form>
</div>

<?php
class DatabaseConnection {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    // Constructor to initialize database connection parameters
    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    // Method to establish a database connection
    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to insert data into the database
    public function insertData($username, $email, $password) {
        $sql = "INSERT INTO register (UserName, Email, Password) VALUES ('$username', '$email', '$password')";
        if ($this->conn->query($sql) === TRUE) {
            echo "<script>document.getElementById('success_message').innerHTML = 'Registration successful';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    // Method to close the database connection
    public function close() {
        $this->conn->close();
    }
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abclab";

// Create a DatabaseConnection object
$databaseConnection = new DatabaseConnection($servername, $username, $password, $dbname);

// Connect to the database
$databaseConnection->connect();

// Retrieve data from the form only if they are set
if(isset($_POST['UserName']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['confirm_password'])) {
    $username = $_POST['UserName'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>document.getElementById('error_message').innerHTML = 'Password and confirm password do not match';</script>";
    } else {
        // Insert data into the database if passwords match
        $databaseConnection->insertData($username, $email, $password);
    }
} else {
    echo "";
}

// Close the database connection
$databaseConnection->close();
?>
</body>
</html>
