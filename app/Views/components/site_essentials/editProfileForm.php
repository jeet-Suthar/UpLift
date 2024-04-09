<div class="dialog-box-bg">

    <div class="dialog-box">
        <div class="dialog-box-header">
            <p>Edit Profile</p>
            <i class="dialog-box-close-btn fa-solid fa-xmark"></i>
        </div>

        <div class="dialog-box-content">

            <?= form_open_multipart('profile_update') ?>
            <label for="profile_dp">Profile Picture:</label>
            <input type="file" name="profile_dp" id="profile_dp" accept="image/*">
            <br>
            <label for="background_img">Background Image:</label>
            <input type="file" name="background_img" id="background_img" accept="image/*">
            <br>
            <label for="bio">Bio (150 words limit):</label>
            <textarea name="bio" id="bio" maxlength="150"></textarea>
            <br>
            <button type="submit">Update Profile</button>
            <?= form_close() ?>


        </div>

        <div class="dialog-box-footer" id="dialog-box-button">

        </div>


    </div>/

</div>