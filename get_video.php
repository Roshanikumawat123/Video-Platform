<?php

$videoId = isset($_GET['id']) ? $_GET['id'] : 0;


$conn = new mysqli("localhost", "root", "", "login_register");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT filename FROM videos WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $videoId);
$stmt->execute();
$stmt->bind_result($filename);
$stmt->fetch();
$stmt->close();
$conn->close();

// Serve the video file
$filePath = "uploads/" . $filename;

if (file_exists($filePath)) {
    header("Content-Type: video/mp4"); 
    header("Content-Length: " . filesize($filePath));
    readfile($filePath);
} else {
    echo "Video file not found.";
}
?>
