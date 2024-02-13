<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
   
</head>
<body>
    <div class="player-container">
      
        <video id="videoPlayer" controls>
            
            <source src="video.mp4" type="video/mp4">
            <source src="video.mkv" type="video/mkv">
           
        </video>
        <div class="controls">
            <button id="backwardButton" onclick="skip(-10)">-10s</button>
            <button id="forwardButton" onclick="skip(10)">+10s</button>
            <button id="deleteButton" onclick="deleteVideo()">Delete</button>
        </div>
    </div>
    <script>
        function skip(seconds) {
            var videoPlayer = document.getElementById("videoPlayer");
            videoPlayer.currentTime += seconds;
        }

        function deleteVideo() {
            var videoId = <?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>;
            
            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_video.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("Video deleted successfully");
                        
                        window.location.href = 'get_video.php';
                    } else {
                        alert("Failed to delete video");
                       
                    }
                }
            };
            xhr.send("id=" + videoId);
        }
    </script>
</body>
</html>
