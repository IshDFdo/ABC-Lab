<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="styles.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointment Form</title>

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

  #appointment-form {
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
  input[type="email"],
  input[type="date"],
  input[type="time"],
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

<div id="appointment-form">
  <h1>Appointment Form</h1>
  <form action="Appointment.php"  method="post" name="Appointment" >
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required />
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required />

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required />

    <label for="time">Time:</label>
    <input type="time" id="time" name="time" required />

    <label for="doctor">Doctor:</label>
    <select name="doctor" id="doctor"required>
      <option value="">Select Doctor</option>
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

    // Method to fetch categories from the database
    public function fetchCategories() {
        $categories = array();
        $sql = "SELECT id, name FROM doctor";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row['name'];
            }
        }
        return $categories;
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Create database object
$db = new Database();

// Fetch categories
$categories = $db->fetchCategories();

// Output categories as dropdown options
if (!empty($categories)) {
    foreach ($categories as $category) {
        echo "<option value='" . $category . "'>" . $category . "</option>";
    }
} else {
    echo "<option value=''>No categories found</option>";
}

// Close database connection
$db->closeConnection();
?>

    </select>
  
    <input type="submit" name="submit" value="Make Appointment & Pay" />
  </form>
</div>


<?php
class Database1 {
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

    // Method to insert appointment data into the database
    public function insertAppointment($name, $email, $date, $time, $doctor) {
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $date = $this->conn->real_escape_string($date);
        $time = $this->conn->real_escape_string($time);
        $doctor = $this->conn->real_escape_string($doctor);

        $sql = "INSERT INTO appointment (Name, Email, Date, Time, Doctor) VALUES ('$name', '$email', '$date', '$time', '$doctor')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['doctor'])) {
    // Fetch form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor = $_POST['doctor'];

    // Create database object
    $db = new Database1();

    // Insert appointment data into the database
    if ($db->insertAppointment($name, $email, $date, $time, $doctor)) {
        echo "New record created successfully";
        header("Location: payment.html");
        exit; // Stop further execution after redirection
    } else {
        echo "Error: Unable to create appointment";
    }

    // Close database connection
    $db->closeConnection();
}
?>

</body>
</html>
