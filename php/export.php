<?php
// Connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "contactus_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select data from the table
$sql = "SELECT * FROM form_submissions";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="form_submissions.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Output CSV header
    fputcsv($output, array('ID', 'Name', 'Telephone', 'Email', 'Message', 'IP', 'Browser', 'Priority Status', 'Submission Status', 'Created At'));

    // Output each row of data
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    // Close output stream
    fclose($output);
} else {
    echo "No data found";
}

// Close connection
$conn->close();
?>
