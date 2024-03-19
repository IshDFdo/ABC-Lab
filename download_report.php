<?php
// Check if the report ID is provided in the URL
if(isset($_GET['id'])) {
    // Get the report ID from the URL
    $report_id = $_GET['id'];

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

    // Query to retrieve the report file path from the database
    $sql = "SELECT Report FROM report WHERE RepID='$report_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the file path
        $row = $result->fetch_assoc();
        $report_file = $row['Report'];

        // Set headers to force download
        header("Content-Type: application/pdf"); // Change the content type if your report is not PDF
        header("Content-Disposition: attachment; filename=\"" . basename($report_file) . "\"");
        readfile($report_file); // Output the file
    } else {
        // Report not found
        echo "Report not found.";
    }

    // Close connection
    $conn->close();
} else {
    // Report ID not provided
    echo "Report ID not provided.";
}
?>
