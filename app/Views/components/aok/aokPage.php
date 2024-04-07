<?php function getPostedTime($postDate)
{

    //* as our database have timestamp without timezone so we have use extra php function for it

    //! NOTE: I (jeet) have set timezone of both $currentDate and $postDateTime to 'Asia/Kolkata', SO NOW PB IS SOLVED :)

    $currentDate = new DateTime();
    $currentDate->setTimezone(new DateTimeZone('Asia/Kolkata'));

    $postDateTime = new DateTime($postDate, new DateTimeZone('Asia/Kolkata'));
    $interval = $currentDate->diff($postDateTime);


    // print_r($currentDate);
    // echo "<br>";
    // print_r($postDateTime);
    if ($interval->days == 0) {
        // Less than a day ago
        if ($interval->h > 0) {
            return $interval->h == 1 ? $interval->h . ' hour ago' : $interval->h . ' hours ago';
        } elseif ($interval->i > 0) {
            return $interval->i == 1 ? $interval->i . ' minute ago' : $interval->i . ' minutes ago';
        } else {
            return 'Just now';
        }
    } else {
        // More than a day ago
        return $postDateTime->format('M j, Y');
    }
}

if (isset($aok_data)) :
    foreach ($aok_data as $AD) : ?>
        <div class="aok-container">

            <!-- User Profile Section -->
            <div class="aok-info">
                <img src="/uploads/assets/user/user_pfp/<?= $AD['anonymous_profile_dp'] ?>" alt="Profile Picture" class="rounded-circle profile-picture mr-2" width="40" height="40">
                <div class="user-details mt-2">
                    <h6><?= $AD['anonymous_username'] ?></h6>
                    <p><?= getPostedTime($AD['uploaded_time']); ?></p>
                </div>
            </div>

            <!-- Media Section -->
            <?php if ($AD['type'] == 'video') : ?>
                <div>
                    <video src="/uploads/video/<?= $AD['media'] ?>" class="media" controls></video>
                </div>
            <?php elseif ($AD['type'] == 'image') : ?>
                <div>
                    <img src="/uploads/image/<?= $AD['media'] ?>" class="media"></img>
                </div>
            <?php endif; ?>

            <!-- Post Actions Section -->
            <div class="post-actions">
                <div class=" like-btn">
                    <i class="fas fa-duotone fa-solid fa-hand-holding-heart likeButton" data-aok-id="<?= $AD['act_id'] ?>"></i>
                    <span class="ml-2 action-word">Gratitude</span>
                    <span class="ml-2 count-number like-count"><?= $AD['total_gratitude'] ?></span>
                </div>
            </div>

            <!-- Caption Section -->
            <div class="caption">
                <p><strong><?= $AD['anonymous_username']; ?></strong> <?= $AD['context']; ?></p>
            </div>
        </div>
<?php endforeach;
endif; ?>