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

  label {
    display: block;
    margin-bottom: 5px;
  }
    .form-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: black;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            color: black;
        }

        button[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }


  input[type="text"],
  input[type="password"],
  select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: black;
  }

  input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #45a049; /* Background color of navigation bar */
    color: black;
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

 <div class="form-container">
        <h2>Appointment Form</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="appointmentId">Appointment ID:</label>
                <input type="text" id="appointmentId" name="appointmentId" required>
            </div>
            <div class="form-group">
                <label for="fileUpload">Upload File:</label>
                <input type="file" id="fileUpload" name="fileToUpload" required>
            </div>
            <button type="submit">Submit</button>
        </form>
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

    // Method to insert report into the database
    public function insertReport($appointmentId, $targetPath) {
        $sql = "INSERT INTO report (ID, Report) VALUES ('$appointmentId', '$targetPath')";
        if ($this->conn->query($sql) === TRUE) {
            echo "Appointment report uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch appointment ID and uploaded file
    $appointmentId = $_POST['appointmentId'];
    $fileName = $_FILES['fileToUpload']['name'];
    $tempName = $_FILES['fileToUpload']['tmp_name'];

    // Move uploaded file to desired location
    $uploadDirectory = "uploads/";

    // Create 'uploads' directory if it doesn't exist
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true); // Create directory recursively with full permissions
    }

    $targetPath = $uploadDirectory . $fileName;
    move_uploaded_file($tempName, $targetPath);

    // Create database object
    $db = new Database();

    // Insert data into database
    $db->insertReport($appointmentId, $targetPath);

    // Close database connection
    $db->closeConnection();
}
?>



</body>
</html>
