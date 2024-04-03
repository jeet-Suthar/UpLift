<?php if (isset($latestStories)) :
    foreach ($latestStories as $LS) : ?>
        <div class="story-container" data-user-id="<?= $LS['user_id'] ?>">
            <div class="story-profile-picture">

                <img src="/uploads/assets/user/user_pfp/<?= $LS['profile_dp'] ?>" alt=" Profile Picture">

                <!-- <img src="https://via.placeholder.com/40" alt="Profile Picture"> -->
            </div>
            <div class="latest-stories-front-page">
                <img src="/uploads/stories/image/<?= $LS['media'] ?>" alt="Random Image">
            </div>
            <!-- Added box-shadow directly to the img -->
            <div class="story-username"><?= $LS['username'] ?></div>
        </div>


<?php endforeach;
endif; ?>




<!-- Story Dialog Box -->
<!-- <div id="story-dialog">
    <div id="story-dialog-content">

        <div class="stories-header">
            <div class="progress-bar-section">
                <div class="progress-bar active"></div>
                <div class="progress-bar"></div>
                <div class="progress-bar active"></div>
                <div class="progress-bar"></div>
                <div class="progress-bar"></div>
                <div class="progress-bar"></div>
                <div class="progress-bar"></div>
                <div class="progress-bar"></div>
            </div>
            <div class="story-user-info">
                <img src="https://placekitten.com/50/50" alt="Profile Picture" class="rounded-circle mr-2" width="40">

                <p>chad guru 2h X</p>
                <i class="fa-light fa-xmark"> </i>
                <i class="fa-solid fa-house"></i>
            </div>


        </div>



        <span id="story-close-button" onclick="hideStoryDialog()">Close</span>
        <div class="story-media-section">
            <div class="story-left-click"></div>
            <img loading="lazy" fetchpriority="high" id="story-media" class="story-dialog-media" src="" alt="Story Image Placeholder">
            <div class="story-right-click"></div>
        </div>

        <div class="story-footer">
            <div class="story-reply">reply</div>

        </div>
    </div>
</div>
-->

<!-- <script>
    function showStoryDialog(imageUrl) {
        var dialog = document.getElementById("story-dialog");
        var image = document.getElementById("story-media");
        image.src = imageUrl;
        dialog.style.display = "block";
    }

    function hideStoryDialog() {
        var dialog = document.getElementById("story-dialog");
        dialog.style.display = "none";
    }
</script>  -->