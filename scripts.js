function uploadVideos() {
    var files = document.getElementById("fileInput").files;
    if (files.length === 0) {
        alert("Please select at least one file to upload.");
        return;
    }

    var formData = new FormData();
    for (var i = 0; i < files.length; i++) {
        formData.append("videos[]", files[i]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
            // Redirect to player.php upon successful upload
            window.location.href = 'player.php';
        } else {
            alert("Error uploading videos. Please try again later.");
        }
    };
    xhr.send(formData);
}
