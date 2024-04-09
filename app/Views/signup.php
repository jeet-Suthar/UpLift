<?= $this->include('template/header') ?>

<body>

  <div class="login-upper-section">
    <img src="uploads/assets/site_images/UpLiftLogo2.png" alt="Logo" class=" navbar-logo ">
    <p class="navbar-title">UpLift</p>

  </div>

  <div class="login-container">
    <div class="login-section">

      <div class="left-login-container">
        <img src="uploads/assets/site_images/UpLiftLogoLogin.png" alt="Logo" class="login-right-logo">
        <p class="slogan-login">Inspire. Connect. Thrive</p>
      </div>

      <div class="login-form">
        <div class="login-form-header">
          <h1 class="navbar-title">Sign Up</h1>

        </div>

        <form class="" action="" method="post">

          <div class="form-row">
            <!-- first name -->
            <div class="form-group col-md-6">
              <label for="fname">first name</label>
              <input type="text" class="form-control" id="fname" name="fname" value="<?= set_value('fname') ?>">
              <?php if (isset($validation) && $validation->getError('fname')) : ?>
                <p class="error-msg"><?= ($validation->getError('fname')) ?></p>
              <?php endif; ?>
            </div>
            <!-- last name -->
            <div class="form-group col-md-6">
              <label for="lname">last name</label>
              <input type="text" class="form-control" id="lname" name="lname" value="<?= set_value('lname') ?>">
              <?php if (isset($validation) && $validation->getError('lname')) : ?>
                <p class="error-msg"><?= ($validation->getError('lname')) ?></p>
              <?php endif; ?>
            </div>
          </div>


          <!-- email -->
          <div class="form-group ">
            <label for="exampleInputEmail1" name='email'>Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?= set_value('email') ?>">
            <?php if (isset($validation) && $validation->getError('email')) : ?>
              <p class="error-msg"><?= ($validation->getError('email')) ?></p>
            <?php elseif (!isset($validation)) : ?>
              <small id="emailHelp" class="form-text text-muted">Your Credenstials are safe with us.</small>

            <?php endif; ?>
          </div>

          <!-- username -->
          <div class="form-group">
            <label for="username">user name</label>
            <input type="text" class="form-control" id="suername" name="username" value="<?= set_value('username') ?>">
            <?php if (isset($validation) && $validation->getError('username')) : ?>
              <p class="error-msg"><?= ($validation->getError('username')) ?></p>
            <?php endif; ?>
          </div>

          <div class="form-row">
            <!-- password -->
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="user_password" placeholder="Password">
              <?php if (isset($validation) && $validation->getError('user_password')) : ?>
                <p class="error-msg"><?= ($validation->getError('user_password')) ?></p>
              <?php endif; ?>
            </div>

            <!-- cpassword -->
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Password">
              <?php if (isset($validation) && $validation->getError('cpassword')) : ?>
                <p class="error-msg"><?= ($validation->getError('cpassword')) ?></p>
              <?php endif; ?>
            </div>
          </div>


          <?php  //if (isset($validation)) :
          ?>
          <!-- <div>
              // $validation->listErrors(); ?>
            </div> -->
          <?php //endif;
          ?>


          <button type="submit" class="btn btn-primary">Sign Up</button>
          <div class="login-form-footer">
            <span>Already Signed Up ?</span><a href="login">Log In</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>