    <!-- //! inside this component we gonna use array of $profile_info -->
    <!-- //! so where you use it pass $data variable with $profile_info sub array -->
    <!-- //! OR ELSE IT WILL NOT WORK -->

    <!-- following section checks type sub array whether it is from followers or followings request page -->



    <div class=" user-block-container">
        <?php foreach ($profile_info as $PI) : ?>

            <div class="user-block-element" data-user-id="<?= $PI['user_id'] ?>">

                <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                <div class=" mt-2">
                    <h6><?= $PI['fname'] ?> <?= $PI['lname'] ?></h6>
                    <p>@<?= $PI['username'] ?></p>
                    <?php if ($type == "request") : ?>
                        <span class="accept-btn">Accept <i class="fa-solid fa-check"></i></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>