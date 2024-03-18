<?php

class Registration
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "abclab";
    private $conn;

    public function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function registerUser($UserName, $Email, $Password, $confirm_password)
    {
        // Validate password matching
        if ($password !== $confirm_password) {
            return "Error: Passwords do not match.";
        }

        // Prepare and bind SQL statement
        $stmt = $this->conn->prepare("INSERT INTO `register` (`UserName`, `Email`, `Password`) VALUES (?, ?, ?)");
        $stmt->bind_param("ssss", $UserName, $Email, $Password);

        // Execute SQL statement
        if ($stmt->execute()) {
            $stmt->close();
            return "Registration successful!";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function __destruct()
    {
        // Close connection
        $this->conn->close();
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    // Create Registration object
    $registration = new Registration();
    
    // Register user
    $message = $registration->registerUser($UserName, $Email, $Password);

    // Output message
    echo $message;

    if ($message === "Registration successful!") {
        echo "<script>window.location.href='login.php';</script>";
    }
}
?>
