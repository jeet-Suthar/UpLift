<div class="habit-section">
    <div class="today-date">
        <h1>
            It's 29 March
        </h1>
    </div>
    <i class="fa-solid fa-user-check verifier-btn" data-user-id="<?= session()->get('id') ?>"></i>
    <div class="habit-separator mb-3 mt-3">
        <h4>Habits</h4>
        <hr>
    </div>

    <!-- if data passed from habitController have $habits array then following block will be excecuted -->
    <?php if (!empty($habits)) : ?>
        <div class="user-habits">
            <!-- for each habit habit block should be generated -->
            <?php foreach ($habits as $H) : ?>

                <div class="habit-container">
                    <div class="habit-name"><?= $H['title'] ?></div>
                    <div class="streak-count">
                        <span><?= $H['current_streak'] ?></span>
                        <i class="fas fa-fire" style="color: orange;"></i>
                    </div>
                    <div class="habit-description">
                        <?= $H['description'] ?>
                    </div>
                    <button class="validate-button" data-habit-id="<?= $H['habit_id'] ?>">Validate</button>
                </div>

            <?php endforeach; ?>
        </div>

        <!-- if no habit exists then No habits should be show instead -->
    <?php else : ?>
        <h5 style="text-align: center; color:gray; margin-bottom: 70px;">No habits taken yet!</h5>
    <?php endif; ?>

    <div class="reward-separator mb-3 mt-3">
        <h4>Rewaeds & badges!</h4>
        <hr>
    </div>

    <?php if (!empty($rewards)) : ?>
        <!-- for each habit habit block should be generated -->
        <div class="user-reward-container">
            <?php foreach ($rewards as $R) : ?>


                <div class="user-reward">
                    <img src="/uploads/assets/rewards/<?= $R['img'] ?>"></img>
                    <h3><?= $R['title'] ?><h3>
                            <div class="user-reward-tooltip">
                                <span><?= $R['description'] ?></span>
                            </div>
                </div>


            <?php endforeach; ?>
        </div>

        <!-- if no habit exists then No habits should be show instead -->
    <?php else : ?>
        <h5 style="text-align: center; color:gray; margin-bottom: 70px;">No Rewards received yet!</h5>
    <?php endif; ?>

</div>