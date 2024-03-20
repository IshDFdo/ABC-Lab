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
    <div class="container">
        <h1>Doctor Appointments</h1>
        <div class="form-container">
         <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="docName">Enter your Name</label>
                <input type="text" id="name" name="name" required>
				 <button type="submit">View Appointments</button>
        </form>
  
    
   <?php
session_start(); // Start session to access logged-in user data

$servername = "localhost"; // Change this if your MySQL server is running on a different host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "abclab"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming your database connection is established here

if (isset($_POST['name'])) {
    // Retrieve doctor's name from form
    $name = $_POST['name'];

    // Perform SQL query to retrieve appointments for the specified doctor's name
    $query = "SELECT * FROM appointment WHERE Doctor='$name'";
    $result = mysqli_query($conn, $query);

    // Display appointment details
    echo "<br><br><h2>Appointments for Dr. $name</h2><br>";
    if (mysqli_num_rows($result) > 0) {
        echo "<center><table border='1' bgcolor='white'>";
        echo "<tr><th>Appointment ID</th><th>Patient Name</th><th>Date</th><th>Time</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
			echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
			echo "<td>" . $row['Time'] . "</td>";
           
           
            echo "</tr>";
        }
        echo "</table></center>";
    } else {
        echo "No appointments found for Dr. $name";
    }
}

// Close database connection
mysqli_close($conn);
?>
  </div>
    </div>
    
</body>
</html>
