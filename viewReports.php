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
    <div class="container">
        <h1>View Reports</h1>
    </div>
    
    <div class="form-container">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <center><label for="appointmentId">Enter your Appointment ID</label>
                <input type="text" id="appID" name="appID" required>
                <button type="submit">View Report</button></center>
            </div>
        </form>
   

    <?php
// Define a class for handling database operations
class DatabaseHandler {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    // Constructor to initialize database connection
    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to retrieve reports for a given appointment ID
    public function getReports($appointment_id) {
        // Perform SQL query to retrieve reports for the specified appointment ID
        $query = "SELECT RepID, Report FROM report WHERE ID='$appointment_id'";
        $result = mysqli_query($this->conn, $query);

        // Display report details
        echo "<h2>Reports for Appointment ID: $appointment_id</h2><br>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $report_id = $row['RepID'];
                // Display report ID and link to download report
                echo "<p style='color: black'><strong>Report ID:</strong> $report_id</p>";
                // Link to download report using download_report.php
                echo "<p><a href='download_report.php?id=$report_id'>Download Report</a></p><br>";
            }
        } else {
            echo "No reports found for Appointment ID: $appointment_id";
        }
    }

    // Destructor to close database connection
    public function __destruct() {
        mysqli_close($this->conn);
    }
}

// Start session to persist logged-in user data
session_start();

// Assuming your database connection is established here
$servername = "localhost"; // Change this if your MySQL server is running on a different host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "abclab"; // Your database name

// Create an instance of the DatabaseHandler class
$dbHandler = new DatabaseHandler($servername, $username, $password, $dbname);

if (isset($_POST['appID'])) {
    // Retrieve appointment ID from form
    $appointment_id = $_POST['appID'];
    
    // Call the getReports method to retrieve and display reports
    $dbHandler->getReports($appointment_id);
}
?>

     </div>
</body>
</html>
