<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="styles.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add Doctor Form</title>

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

        #add-doctor-form {
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
        input[type="datetime-local"] {
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
            <li><a href="menu.html">Home</a></li>
            <li><a href="gallery.html">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="aboutus.html">About Us</a></li>
        </div>
    </ul>
</nav>

<div id="add-doctor-form">
    <h1>Add Doctor</h1>
    <form name="add_doctor" method="post" action="doctordetails.php" >
        <label for="doctor_name">Doctor Name:</label>
        <input type="text" id="doctor_name" name="doctor_name" required />

        <label for="speciality">Speciality:</label>
        <input type="text" id="speciality" name="speciality" required />

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <label for="available_time">Available Time:</label>
        <input type="datetime-local" id="available_time" name="available_time" required />

        <input type="submit" name="submit" value="Add Doctor" />
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

    // Method to insert doctor data into the database
    public function insertDoctor($doctorName, $email, $password, $speciality, $availableTime) {
        $doctorName = $this->conn->real_escape_string($doctorName);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        $speciality = $this->conn->real_escape_string($speciality);
        $availableTime = $this->conn->real_escape_string($availableTime);

        $sql = "INSERT INTO doctor (Name, Email, Specialty, Password, DateTime) VALUES ('$doctorName', '$email', '$speciality', '$password', '$availableTime')";
        
        if ($this->conn->query($sql) === TRUE) {
            echo "Doctor added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Create database object
$db = new Database();

// Retrieve data from the form only if they are set
if(isset($_POST['doctor_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['speciality']) && isset($_POST['available_time'])) {
    $doctorName = $_POST['doctor_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $speciality = $_POST['speciality'];
    $availableTime = $_POST['available_time'];

    // Insert doctor data into the database
    $db->insertDoctor($doctorName, $email, $password, $speciality, $availableTime);
} else {
    echo "Please fill all the required fields.";
}

// Close database connection
$db->closeConnection();
?>




</body>
</html>
