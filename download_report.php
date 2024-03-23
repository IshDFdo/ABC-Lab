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

    // Method to retrieve report file path from the database by report ID
    public function getReportFilePath($report_id) {
        $report_id = $this->conn->real_escape_string($report_id);
        $sql = "SELECT Report FROM report WHERE RepID='$report_id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Report'];
        } else {
            return false;
        }
    }

    // Method to close database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Check if the report ID is provided in the URL
if(isset($_GET['id'])) {
    // Get the report ID from the URL
    $report_id = $_GET['id'];

    // Create database object
    $db = new Database();

    // Retrieve the report file path from the database
    $report_file = $db->getReportFilePath($report_id);

    // Close database connection
    $db->closeConnection();

    if ($report_file !== false) {
        // Set headers to force download
        header("Content-Type: application/pdf"); // Change the content type if your report is not PDF
        header("Content-Disposition: attachment; filename=\"" . basename($report_file) . "\"");
        readfile($report_file); // Output the file
    } else {
        // Report not found
        echo "Report not found.";
    }
} else {
    // Report ID not provided
    echo "Report ID not provided.";
}
?>
