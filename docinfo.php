<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment System</title>
    <link rel="stylesheet" href="patientHome.css">

 <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
		 .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			color: black;
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
	<br>
    <center> <h1>Doctor Details</h1></center>
	<br>
    <table class="container">
        <thead>
            <tr>               
                <th>Name</th>
                <th>Specialization</th>
                 <th>Available Date & Time</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
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

    // Method to fetch doctor details from the database
    public function fetchDoctorDetails() {
        $doctorDetails = array();
        $sql = "SELECT * FROM doctor";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $doctorDetails[] = $row;
            }
        }
        return $doctorDetails;
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Create database object
$db = new Database();

// Fetch doctor details
$doctorDetails = $db->fetchDoctorDetails();

// Output doctor details
if (!empty($doctorDetails)) {
    foreach ($doctorDetails as $doctor) {
        echo "<tr>";
        echo "<td>".$doctor["Name"]."</td>";
        echo "<td>".$doctor["Specialty"]."</td>";
        echo "<td>".$doctor["DateTime"]."</td>";
        echo "<td>".$doctor["Email"]."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No doctors found</td></tr>";
}

// Close database connection
$db->closeConnection();
?>

        </tbody>
    </table>



</body>
</html>