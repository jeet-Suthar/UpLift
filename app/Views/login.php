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
          <h1 class="navbar-title">Login</h1>

        </div>

        <form class="" style="" action="<?= base_url('/login') ?>" method="post" novalidate>

          <!-- email -->
          <div class="form-group">
            <label for="exampleInputEmail1" name='email'>Email address</label>
            <input type="email" class="form-control <?php if (isset($validation) && $validation->getError('email')) : ?> error-input <?php endif; ?>" id="exampleInputEmail1" name="email" placeholder="Enter email" value="<?= set_value('email') ?>" autocomplete="new-email">
            <?php if (isset($validation) && $validation->getError('email')) : ?>
              <p class="error-msg"><?= ($validation->getError('email')) ?></p>
            <?php elseif (!isset($validation)) : ?>
              <small id="emailHelp" class="form-text text-muted">Your Credenstials are safe with us.</small>

            <?php endif; ?>
          </div>


          <?php $showPasswordError = true;
          if (
            isset($validation) &&
            ($validation->getError('email') == 'Email is not registered! Please sign up.'
              || $validation->getError('email') == 'Please enter a valid email address!')
          ) : $showPasswordError = false;
          endif; ?>


          <!-- password -->
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control <?php if ($showPasswordError && isset($validation) && $validation->getError('user_password')) : ?> error-input <?php endif; ?>" id="exampleInputPassword1" name="user_password" placeholder="Password" autocomplete="off">

            <?php if ($showPasswordError && isset($validation) && $validation->getError('user_password')) : ?>

              <p class="error-msg"><?= ($validation->getError('user_password')) ?></p>
            <?php endif; ?>
          </div>


          <?php //if (isset($validation)) : 
          ?>
          <!-- <div>
            v//$validation->listErrors(); 
          </div> -->
          <?php //endif; 
          ?>


          <button type="submit" class="btn btn-primary">Login</button>
          <div class="login-form-footer">
            <span>New to Uplift ? </span><a href="signup">Sign Up</a>
          </div>
        </form>

      </div>

    </div>
  </div>


</body>

</html>