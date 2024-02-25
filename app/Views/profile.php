<?= $this->include('template/header')?>

<body>


    <?= print_r($user) ?>
    <!-- Profile Page Content -->
    <div class="container-fluid profile-container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 profile-sidebar">
                <div class="text-center">
                    <img src="user-profile-image.jpg" alt="User Profile">
                    <div class="profile-details">
                        <h2>username</h2>
                        <p>@usernmae</p>
                        <p>Last Login:</p>
                        <p class="bio"><?php echo $user['bio']?></p>
                    </div>
                </div>
            </div>
            <!-- Main Content (Space for Future Implementation) -->
            <div class="col-md-9 main-content">
                <!-- Space for future implementation of post and stories section -->
                <!-- You can add your post and stories content here -->
            </div>
        </div>
    </div>


    <!-- <p><?= print_r($error) ?></p> -->