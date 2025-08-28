<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "event_project";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$event_id = $_POST['event_id'];

$sql = "INSERT INTO registrations (name, email, phone, event_name) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $email, $phone, $event_id);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
