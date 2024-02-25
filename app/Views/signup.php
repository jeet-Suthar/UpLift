<?= $this->include('template/header') ?>

<body>
  <?= $this->include('template/navbar') ?>

  <div class="form">
    <form class="w-25 p-3" style="margin: 50px auto; padding:10px" action="" method="post">

      <div class="form-row">
        <!-- first name -->
        <div class="form-group col-md-6">
          <label for="fname">first name</label>
          <input type="text" class="form-control" id="fname" name="fname" value="<?= set_value('fname') ?>">
        </div>
        <!-- last name -->
        <div class="form-group col-md-6">
          <label for="lname">last name</label>
          <input type="text" class="form-control" id="lname" name="lname" value="<?= set_value('lname') ?>">
        </div>
      </div>


      <!-- email -->
      <div class="form-group ">
        <label for="exampleInputEmail1" name='email'>Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?= set_value('email') ?>">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <!-- username -->
      <div class="form-group">
        <label for="username">user name</label>
        <input type="text" class="form-control" id="suername" name="username" value="<?= set_value('username') ?>">
      </div>

      <div class="form-row">
        <!-- password -->
        <div class="form-group col-md-6">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="user_password" placeholder="Password">
        </div>

        <!-- cpassword -->
        <div class="form-group col-md-6">
          <label for="exampleInputPassword1">cPassword</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Password">
        </div>
      </div>

      <?php if (isset($validation)) : ?>
        <div class='alert alert-danger'>
          <?= $validation->listErrors(); ?> <!-- for listing errors -->

          <!-- following is for getting particular errors for each field by 
            by which we can display error below every field which is getting errors -->

          <?php //print_r($validation->getErrors()['username']) 
          ?>
        </div>
      <?php endif; ?>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>


</body>

</html>