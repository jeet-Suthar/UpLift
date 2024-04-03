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

if (isset($post_data)) :
    foreach ($post_data as $PD) : ?> <!-- $PD is refering post data-->
        <div class="post-container">

            <!-- User Profile Section -->
            <div class="post-info">

                <img src="/uploads/assets/user/user_pfp/<?= $PD['profile_dp'] ?>" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                <div class=" mt-2">
                    <h6><?= $PD['username'] ?></h6>
                    <p><?= getPostedTime($PD['uploaded_time']); ?></p>
                    <p></p>
                </div>
            </div>


            <?php if ($PD['type'] == 'video') : ?>
                <div>
                    <video src="/uploads/video/<?= $PD['media_url'] ?>" class="media" controls></video>
                </div>

            <?php elseif ($PD['type'] = 'image') : ?>

                <div>
                    <img src="/uploads/image/<?= $PD['media_url'] ?>" class="media"></img>
                </div>

            <?php endif; ?>

            <!-- Post Actions (Like, Comment, Share) -->
            <div class="post-actions">

                <div class="like-btn">
                    <i class="fas fa-duotone fa-thumbs-up likeButton" data-post-id="<?= $PD['post_id'] ?>"></i>
                    <span class="ml-2 action-word">Like</span>
                    <span class="ml-2 count-number like-count"><?= $PD['total_likes'] ?></span>
                </div>

                <div class="comment-btn">
                    <i class="far fa-comment commentButton" data-post-id="<?= $PD['post_id'] ?>"></i>
                    <span class="ml-2 action-word">Comment</span>
                    <span class="ml-2 count-number comment-count"><?= $PD['total_comments'] ?></span>
                    <!-- <div class="total_likes"><span>200</span></div> -->
                </div>
                <div>
                    <i class="fas fa-share"></i>
                    <span class="ml-2 action-word">Share</span>

                </div>
            </div>

            <!-- for caption -->
            <div class=" caption">
                <p><strong><?= $PD['username']; ?></strong> <?= $PD['caption']; ?></p>
            </div>

            <hr>
            </hr>

            <div class="add-comment">
                <img src="https://placekitten.com/50/50" alt="Profile Picture" class="rounded-circle mr-2" width="40">
                <div class="comment-form">

                    <p>What's on your mind ?</p>
                </div>

            </div>

            <?php static $index = 0;
            $commentInfo = $comment_data[$index];
            $index++;
            if (!empty($commentInfo)) : ?>

                <div class="comment-section">

                    <div class="comment-header">
                        <strong>Comments: </strong>
                    </div>
                    <div class="comment" id=<?= $commentInfo[0]['comment_id'] ?>>
                        <strong><?= $commentInfo[0]['username'] ?>: </strong><span><?= $commentInfo[0]['content'] ?></span>
                    </div>
                    <div class="comment" id=<?= $commentInfo[0]['comment_id'] ?>>
                        <strong><?= $commentInfo[1]['username'] ?>: </strong><span><?= $commentInfo[1]['content'] ?></span>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-center">

                    <span class="view-all-comment ">View all comments</span>
                </div>
            <?php endif; ?>

            <!-- <div class="add-comment">add comment</div> -->
        </div>
        </div>

<?php endforeach;
endif; ?>