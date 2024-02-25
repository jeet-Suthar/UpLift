<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facebook Stories</title>
<style>
    /* CSS for the Facebook Story profile picture */
    .story-container {
        position: relative;
        min-width: 160px; /* Minimum width to prevent shrinking */
        height: 200px; /* Adjust the size as needed */
        overflow: hidden;
        margin-right: 10px; /* Add some spacing between examples */
    }
    
    .profile-picture {
        position: absolute;
        top: 10px; /* Adjust the distance from the top */
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 40px;
        border: 2px solid #d3d3d3; /* Light purple color */
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow to profile picture */
    }
    
    .profile-picture img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    
    .username {
        position: absolute;
        bottom: 10px; /* Adjust the distance from the bottom */
        left: 0;
        width: 100%;
        text-align: center;
        font-size: 14px;
        color: #ffffff; /* White color for text */
        text-shadow: 0 0 5px #000000; /* Add a shadow effect */
    }
    
    .story-row {
        display: flex;
        overflow-x: auto;
        white-space: nowrap;
        padding: 10px;
    }
    
    /* CSS for the dialog box */
    #story-dialog {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
    }
    
    #story-dialog-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
    }
    
    #story-dialog-content img {
        width: 200px;
        height: auto;
        display: block;
        margin: 0 auto 20px;
    }
    
    #close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>
</head>
<body>

<!-- Story row -->
<div class="story-row">
    <!-- Example with a random image from the internet -->
    <div class="story-container" onclick="showStoryDialog('https://picsum.photos/400/600')">
        <div class="profile-picture">
            <img src="https://via.placeholder.com/40" alt="Profile Picture">
        </div>
        <img src="https://picsum.photos/200/300" alt="Random Image" style="width: 100%; height: auto; box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);"> <!-- Added box-shadow directly to the img -->
        <div class="username">RandomUsername123</div>
    </div>
    
    <!-- Add more story containers here as needed -->
    <!-- Example 2 -->
    <div class="story-container" onclick="showStoryDialog('https://picsum.photos/400/600')">
        <div class="profile-picture">
            <img src="https://via.placeholder.com/40" alt="Profile Picture">
        </div>
        <img src="https://picsum.photos/200/300" alt="Random Image" style="width: 100%; height: auto; box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);"> <!-- Added box-shadow directly to the img -->
        <div class="username">RandomUsername123</div>
    </div>
    
    <!-- Add more story containers here as needed -->
</div>

<!-- Story Dialog Box -->
<div id="story-dialog">
    <div id="story-dialog-content">
        <span id="close-button" onclick="hideStoryDialog()">Close</span>
        <img id="story-dialog-image" src="" alt="Story Image Placeholder">
    </div>
</div>

<script>
    function showStoryDialog(imageUrl) {
        var dialog = document.getElementById("story-dialog");
        var image = document.getElementById("story-dialog-image");
        image.src = imageUrl;
        dialog.style.display = "block";
    }
    
    function hideStoryDialog() {
        var dialog = document.getElementById("story-dialog");
        dialog.style.display = "none";
    }
</script>

</body>
</html>
