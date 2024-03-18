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
// Database connection parameters
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

// Retrieve data from the form only if they are set
if(isset($_POST['doctor_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['speciality']) && isset($_POST['available_time'])) {
    $doctorName = $_POST['doctor_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $speciality = $_POST['speciality'];
    $availableTime = $_POST['available_time'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO doctor (Name, Email, Specialty, Password, DateTime) VALUES ('$doctorName', '$email', '$speciality', '$password', '$availableTime')";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Please fill all the required fields.";
}

// Close the connection
$conn->close();
?>



</body>
</html>
