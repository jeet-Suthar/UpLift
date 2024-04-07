<?= $this->include('template/header') ?>

<body>

  <div class="login-form">
    <div class="login-form-header">
      <img src="uploads/assets/site_images/UpLiftLogo2.png" alt="Logo" class="navbar-logo">
      <h1 class="navbar-title">UpLift</h1>

    </div>

    <form class="" style="" action="<?= base_url('/login') ?>" method="post">

      <!-- email -->
      <div class="form-group ">
        <label for="exampleInputEmail1" name='email'>Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="<?= set_value('email') ?>" autocomplete="new-email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <!-- password -->
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control " id="exampleInputPassword1" name="user_password" placeholder="Password" autocomplete="off">
      </div>

      <?php if (isset($validation)) : ?>
        <div>
          <?= $validation->listErrors(); ?> <!-- for listing errors -->
        </div>
      <?php endif; ?>


      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>


</body>

</html>