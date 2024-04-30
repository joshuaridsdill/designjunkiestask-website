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

// Get form data
$name = $_POST['name'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$message = $_POST['message'];
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$current_time = date("H:i");
$recaptcha = $_POST['g-recaptcha-response']; 

$secret_key = '6LcsHMApAAAAAIpSlilh5N3PJ6KsCdveL4alyycH'; 
  
// Hitting request to the URL, Google will 
// respond with success or error scenario 
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
        . $secret_key . '&response=' . $recaptcha; 
  
// Making request to verify captcha 
$response = file_get_contents($url); 
  
// Response return by google is in 
// JSON format, so we have to parse 
// that json 
$response = json_decode($response); 
  
// Checking, if response is true or not 
if ($response->success == true) { 
    echo '<script>alert("Google reCAPTACHA verified")</script>'; 
} else { 
    echo '<script>alert("Error in Google reCAPTACHA")</script>'; 
} 

// Determine priority status
if ($current_time >= '09:00' && $current_time <= '16:30') {
    $priority_status = "SAME_DAY";
} elseif ($current_time > '16:30' && $current_time < '17:30') {
    $priority_status = "MORNING_REPLY";
} else {
    $priority_status = "DEFAULT";
}

// Determine submission status
if (strpos($message, 'http') !== false && str_word_count($message) < 20) {
    $submission_status = "POSSIBLE_SPAM";
} elseif (strpos($message, 'http') !== false && str_word_count($message) >= 20) {
    $submission_status = "SPAM";
} elseif (str_word_count($message) < 50) {
    $submission_status = "DEFAULT";
} else {
    $submission_status = "POSSIBLE_TEXT_SPAM";
}

// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO form_submissions (name, telephone, email, message, ip, browser, priority_status, submission_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $telephone, $email, $message, $ip, $browser, $priority_status, $submission_status);

// Execute statement
if ($stmt->execute()) {
    echo "Form submitted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
