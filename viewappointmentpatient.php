<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment System</title>
    <link rel="stylesheet" href="patientHome.css">
    <style>
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
    background-color: #555;
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
         <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <center><label for="appointmentId">Enter your E-mail</label>
                <input type="text" id="email" name="email" required>
				 <button type="submit">Submit</button></center>
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

    // Method to retrieve appointments by email
    public function getAppointmentsByEmail($email) {
        $email = $this->conn->real_escape_string($email);
        $sql = "SELECT * FROM appointment WHERE Email='$email'";
        $result = $this->conn->query($sql);
        return $result;
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Check if email is submitted
if(isset($_POST['email'])) {
    // Create database object
    $db = new Database();

    // Retrieve and sanitize email input
    $email = $_POST['email'];

    // Retrieve appointments for the entered email
    $result = $db->getAppointmentsByEmail($email);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output table header
        echo "<table border='1'>";
        echo "<tr><th>Appointment ID</th><th>Patient Email</th><th>Date</th><th>Time</th></tr>";
        
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["ID"]."</td>";
            echo "<td>".$row["Email"]."</td>";
            echo "<td>".$row["Date"]."</td>";
            echo "<td>".$row["Time"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No appointments found for this email.";
    }

    // Close database connection
    $db->closeConnection();
}
?>



</body>
</html>