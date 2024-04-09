<div class="dialog-box-bg">


    <div class="dialog-box">
        <div class="dialog-box-header">
            <p>Verification Taks</p>
            <i class="dialog-box-close-btn fa-solid fa-xmark"></i>
        </div>

        <div class="dialog-box-content">
            <div class="verification-container">
                <div class="blocks">

                    <?php for ($i = 0; $i < count($taskData) - 1; $i++) : ?>
                        <div class="block">
                            <div class="header"><?= $taskData[$i]['title'] ?></div>
                            <div class="habit-media">



                                <?php if ($taskData[$i]['type'] == 'video') : ?>

                                    <video src="uploads/habits/habit_sent/<?= $taskData[$i]['type'] ?>/<?= $taskData[$i]['media'] ?>" controls></video>

                                <?php elseif ($taskData[$i]['type'] = 'image') : ?>

                                    <img src="uploads/habits/habit_sent/<?= $taskData[$i]['type'] ?>/<?= $taskData[$i]['media'] ?>" alt="error"></img>

                                <?php endif; ?>
                            </div>
                            <!-- <img src="uploads/habits/habit_sent/ ?=  < dede //$taskData[$i]['media'] ?>" alt="Nature 1"> -->
                            <button class="unverify-btn" data-sent-time="<?= $taskData[$i]['sent_time'] ?>" data-habit-id="<?= $taskData[$i]['habit_id'] ?>"><i class="fas fa-times-circle"></i> Unverify</button>
                            <button class="verify-btn" data-sent-time="<?= $taskData[$i]['sent_time'] ?>" data-habit-id="<?= $taskData[$i]['habit_id'] ?>"><i class="fas fa-check-circle"></i> Verify</button>
                        </div>
                    <?php endfor; ?>

                    <?php if (!empty($taskData)) : // check if taskData is not empty 
                    ?>
                        <div class="block last-block">
                            <div class="header"><?= $taskData[count($taskData) - 1]['title'] ?></div>

                            <div class="habit-media">

                                <?php if ($taskData[count($taskData) - 1]['type'] == 'video') : ?>

                                    <video src="uploads/habits/habit_sent/<?= $taskData[count($taskData) - 1]['type'] ?>/<?= $taskData[count($taskData) - 1]['media'] ?>" controls></video>

                                <?php elseif ($taskData[$i]['type'] = 'image') : ?>

                                    <img src="uploads/habits/habit_sent/<?= $taskData[count($taskData) - 1]['type'] ?>/<?= $taskData[count($taskData) - 1]['media'] ?>" alt="error"></img>

                                <?php endif; ?>
                            </div>


                            <button class="unverify-btn last-block" data-sent-time="<?= $taskData[$i]['sent_time'] ?>" data-habit-id="<?= $taskData[$i]['habit_id'] ?>"><i class="fas fa-times-circle" data-sent-time="<?= $taskData[count($taskData) - 1]['sent_time'] ?>"></i> Unverify</button>
                            <button class="verify-btn last-block" data-sent-time="<?= $taskData[$i]['sent_time'] ?>" data-habit-id="<?= $taskData[$i]['habit_id'] ?>"><i class="fas fa-check-circle" data-sent-time="<?= $taskData[count($taskData) - 1]['sent_time'] ?>"></i> Verify</button>
                        </div>
                    <?php endif; ?>



                </div>




            </div>
        </div>


    </div>


</div>