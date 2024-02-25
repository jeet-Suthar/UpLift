

<?= $this->include('template/header') ?>

  <body>
    <?= $this->include('template/navbar') ?>

    <div class="form"> 
    <form class="w-25 p-3"  style="margin: 50px auto; padding:10px" action="<?= base_url('/login')?>" method="post">

      <!-- email -->
      <div class="form-group ">
        <label for="exampleInputEmail1" name='email'>Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder="Enter email" value="<?= set_value('email')?>">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <!-- password -->
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="user_password" placeholder="Password">
      </div>
      
      <?php  if(isset($validation)): ?>
        <div> 
          <?= $validation->listErrors(); ?>   <!-- for listing errors -->
        </div>
      <?php endif; ?>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
   
  
  </body>
</html>