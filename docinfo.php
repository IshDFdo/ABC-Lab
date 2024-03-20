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
            // Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "abclab";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to retrieve doctor details
            $sql = "SELECT * FROM doctor";
            $result = $conn->query($sql);

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                   
                    echo "<td>".$row["Name"]."</td>";
                    echo "<td>".$row["Specialty"]."</td>";
                    echo "<td>".$row["DateTime"]."</td>";
                    echo "<td>".$row["Email"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No doctors found</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>



</body>
</html>