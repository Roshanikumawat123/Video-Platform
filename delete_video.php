<?php
// Get video ID from request
$videoId = isset($_POST['id']) ? $_POST['id'] : 0;

// Delete video file from server (optional)
/$onn = new mysqli("localhost", "root", "", "login_register");
$sql = "SELECT filename FROM videos WHERE id = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("i", $videoId);
$stmt->execute();
 $stmt->bind_result($filename);
 $stmt->fetch();
 $stmt->close();
$conn->close();
unlink("uploads/" . $filename);

// Delete video record from database
$conn = new mysqli("localhost", "root", "", "login_register");
$sql = "DELETE FROM videos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $videoId);
$stmt->execute();
$stmt->close();
$conn->close();

// Return response
http_response_code(200); // Success response code
?>
