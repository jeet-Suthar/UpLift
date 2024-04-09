    <!-- //! inside this component we gonna use array of $profile_info -->
    <!-- //! so where you use it pass $data variable with $profile_info sub array -->
    <!-- //! OR ELSE IT WILL NOT WORK -->

    <!-- following section checks type sub array whether it is from followers or followings request page -->



    <div class=" user-block-container">
        <?php foreach ($profile_info as $PI) : ?>

            <div <?php if (!($type == "verification_task" || $type == "verifier" || $type == "newVerifier" || $type == "chatFriend")) : ?> id="user-block-element" <?php endif; ?> class="user-block-element" data-user-id="<?= $PI['user_id'] ?>">
                <?php
                // Check if the user has a profile picture
                if ($PI['profile_dp'] === null) {
                    // If the user does not have a profile picture, display a default one
                ?>
                    <img src="uploads/assets/user/user_pfp/pfp_placeholder.png" class="rounded-circle mr-2" width="40" height="40">
                <?php
                } else {
                    // If the user has a profile picture, display it
                ?>
                    <img src="uploads/assets/user/user_pfp/<?= $PI['profile_dp']; ?>" class="rounded-circle mr-2" width="40" height="40">
                <?php
                }
                ?>



                <div class=" mt-2">
                    <h6><?= $PI['fname'] ?> <?= $PI['lname'] ?></h6>
                    <p>@<?= $PI['username'] ?></p>
                    <?php if ($type == "request") : ?>
                        <span class="accept-btn"><i class="fa-solid fa-user-plus"></i></span>
                    <?php elseif ($type == "verifier") : ?>
                        <i id="remove-verifier-cross" class="remove-verifier-cross fa-solid fa-xmark" data-user-id="<?= $PI['user_id'] ?>"></i>

                    <?php elseif ($type == "newVerifier") : ?>
                        <i id="add-verifier-plus" class="add-verifier-plus fa-solid fa-plus" data-user-id="<?= $PI['user_id'] ?>"></i>


                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>