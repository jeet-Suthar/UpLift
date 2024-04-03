<div class="user-profile">
    <div class="user-profile-background-image">
        <img src="/uploads/assets/user/user_background_pic/<?= $profile_info['background_img'] ?>" alt="user-profile Background Image">
    </div>
    <img src="/uploads/assets/user/user_pfp/<?= $profile_info['profile_dp'] ?>" alt="Profile Picture" class="user-profile-pic">

    <!-- //! following code will check whether the user in ongoing session is veiwing his own profile -->
    <!-- //! if it's his own profile then edit button should be visible -->

    <?php if ($profile_info["user_id"] == session()->get('id')) : ?>
        <div class="edit-profile">
            <span>Edit Profile</span>
            <i class="fa-solid fa-pencil"></i>
        </div>
    <?php endif; ?>



    <div class="user-profile-info">
        <div class="user-profile-name"><?= $profile_info["fname"] ?> <?= $profile_info["lname"] ?></div>
        <div class="user-profile-user-id">@<?= $profile_info["username"] ?></div>
        <div class="user-profile-bio">
            <?= $profile_info["bio"] ?>
        </div>
        <div class="user-profile-follower-count" data-user-id="<?= $profile_info["user_id"] ?>"> <!--included user_id in order to make click function work -->
            <!-- here as result is return fromm DB in form of array with 0 indiex have count variable bcoz -->
            <!-- we have count query executed that why we goind in 0th index and in displaying value of count -->
            <?= $followerCount[0]['count'] ?> Followers
        </div>
        <span>|</span>
        <div class="user-profile-following-count" data-user-id="<?= $profile_info["user_id"] ?>"> <!--  included user_id in order to make click function work -->
            <?= $followingCount[0]['count'] ?> Followings
        </div>
    </div>
    <hr class="mt-4">
    <h4>Posts</h4>


</div>