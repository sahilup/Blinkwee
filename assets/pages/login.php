<div class="login">
  <div class="col-4 bg-light border rounded p-4 shadow-sm">
    <form method="post" action="assets/php/validation.php?login">
      <div class="d-flex justify-content-center">
        <img class="mb-4" src="assets/images/blinkwee.png" alt="" height="45">
      </div>
      <h1 class="h5 mb-3 fw-normal">Please login</h1>

      <div class="form-floating">
        <input
          name="user_name_email"
          type="text"
          value="<?= formDataValues('user_name_email') ?>"
          class="form-control rounded-0"
          placeholder="username/email"
        >
        <label for="floatingInput">username/Email</label>
      </div>
      <?= validation_error('user_name_email') ?>

      <div class="form-floating mt-1">
        <input
          name="user_password"
          minlength="6"
          type="password"
          class="form-control rounded-0"
          id="floatingPassword"
          placeholder="Password"
        >
        <label for="floatingPassword">password</label>
      </div>
      <?= validation_error('user_password') ?>
      <?= validation_error('checkuser') ?>

      <div class="mt-3 d-flex justify-content-between align-items-center">
        <button class="btn btn-primary rounded-pill" type="submit">Login</button>
        <a href="?register" class="text-decoration-none">Don't have an account?</a>
      </div>
      <br>
      <a href="?forgotpassword" class="text-decoration-none">Forgot password?</a>
    </form>
  </div>
</div>
