<?= $this->include('template/header') ?>

<body>
    <?= $this->include('template/navbar') ?>
    <div class="content mt-3">

        <!--left side bar  -->

        <div class="left-sidebar  col-md-2 pt-4">

            <div class="sidebar-search">
                <input type="text" class="search-input" placeholder="Search...">
            </div>

            <div class="sidebar-options">
                <div class="sidebar-item home-btn active">
                    <i class="fas fa-home avtive"></i> Home
                </div>
                <div class="sidebar-item">
                    <i class="fas fa-search"></i> Explore
                </div>
                <div class="sidebar-item">
                    <i class="fas fa-regular fa-comment-dots"></i> Messages
                </div>
                <div class="sidebar-item habit-btn">
                    <i class="fas fa-chart-line "></i> Habits
                </div>
                <div class="sidebar-item">
                    <i class="fas fa-calendar-alt"></i> Events
                </div>
                <div class="sidebar-divider"></div>
                <div class="sidebar-item">
                    <i class="fas fa-check-circle"></i> AOK
                </div>
                <div class="sidebar-divider"></div>
                <div class="sidebar-heading">My Habits</div>
                <div class="sidebar-item">
                    <i class="fas fa-star"></i> Habit A
                </div>
                <div class="sidebar-item">
                    <i class="fas fa-heart"></i> Habit B
                </div>

            </div>

        </div>

        <!-- centeral paet of page which will contain stories and main feed -->

        <div class="center-content col-md-7">

            <!-- stories-section div will added here dynamically -->

            <!-- main-feed div will added here dynamically -->

        </div>

        <!-- right side bar which contain stories verifications and habit msg -->

        <div class="right-sidebar">

            <span>Verification</span>

            <div class="verification-section">


                <div class="verification-element">

                    <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                    <div class=" mt-2">
                        <h6>chad guru</h6>
                        <p>2 hours</p>
                        <p></p>
                    </div>
                </div>
                <div class="verification-element">

                    <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                    <div class=" mt-2">
                        <h6>chad guru</h6>
                        <p>2 hours</p>
                        <p></p>
                    </div>
                </div>
                <div class="verification-element">

                    <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                    <div class=" mt-2">
                        <h6>chad guru</h6>
                        <p>2 hours</p>
                        <p></p>
                    </div>
                </div>
                <div class="verification-element">

                    <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                    <div class=" mt-2">
                        <h6>chad guru</h6>
                        <p>2 hours</p>
                        <p></p>
                    </div>
                </div>
                <div class="verification-element">

                    <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                    <div class=" mt-2">
                        <h6>chad guru</h6>
                        <p>2 hours</p>
                        <p></p>
                    </div>
                </div>
                <div class="verification-element">

                    <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                    <div class=" mt-2">
                        <h6>chad guru</h6>
                        <p>2 hours</p>
                        <p></p>
                    </div>
                </div>

                <div class="verification-element">

                    <img src="/uploads/image/1708007671_e648facee8a8daa959a8.gif" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

                    <div class=" mt-2">
                        <h6>chad guru</h6>
                        <p>2 hours</p>
                        <p></p>
                    </div>
                </div>

            </div>





        </div>


    </div>

    <!-- JavaScript links -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/index.js') ?>"></script>

</body>

</html>