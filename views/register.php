<h1>Create Account</h1>
<form action="" method="post">
  <div class="mb-3">
    <label >Email address</label>
    <input name="email" type="email" class="form-control" >
  </div>
  <div class="mb-3">
    <label >FirstName </label>
    <input name="first_name" type="text" 
      value="<?php echo $model->first_name ?>" 
      class="form-control <?php echo $model->isError('first_name') ? 'is-invalid' : ' ' ?>" 
    >
    <div class="invalid-feedback">
      <?php echo $model->getFirstErrors('first_name') ?>
    </div>
  </div>
  <div class="mb-3">
    <label >SecondName </label>
    <input name="second_name" type="text" class="form-control" >
  </div>
  <div class="mb-3">
    <label >Password</label>
    <input name="password" type="password" class="form-control" >
  </div>
  <div class="mb-3">
    <label >Confirm Password</label>
    <input name="confirm_password" type="password" class="form-control" >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>