<div class="login">
  <div class="login-container d-flex justify-content-center align-items-center">
    <div class="card shadow p-4">
      <h1 class="h4 text-center">Forgot Your Password?</h1>

      <?php
      if (isset($_SESSION['forgotpasscode']) && !isset($_SESSION['temp_auth']))
      {
        $forgotpassaction='verifycode';
      }
      else if (isset($_SESSION['forgotpasscode']) && isset($_SESSION['temp_auth']))
      {
        $forgotpassaction='changepasscode';
      }
      else{
            $forgotpassaction='forgotpassword';
          }
      ?>

      <form class="mt-4" method="post" action="assets/php/validation.php?<?=$forgotpassaction?>">
    <?php

 if ($forgotpassaction== 'forgotpassword')
 {
      ?>
      <div class="mb-3">
          <input
            type="email"
            name="user_email"
            class="form-control rounded-0"
            id="floatingInput"
            placeholder="Enter your Email Address"
            required
          />
        </div>
        <?=validation_error('user_email') ?> 
        <div class="d-grid gap-2 mb-3">
        <button
          class="btn btn-primary mb-3 w-100"
          type="submit"
        >
          Send Verification Code
        </button>  
        </div>
      <?php
 }    
 ?>    
    <?php
 if ($forgotpassaction== 'changepasscode')
 {
      ?>
              <div class="mb-3">
          <label for="floatingPassword" class="form-label">New Password</label>
          <input
            type="password"
            class="form-control rounded-0"
            name="user_password"
            minlength="6"
            id="floatingPassword"
            placeholder="New Password"
             required
          />
        </div>
        <?=validation_error('user_password') ?> 
        <button
            class="btn btn-primary mb-3 w-100"
            type="submit"
          >
            Change Password
          </button>
          
      <?php
 }    
 ?>    
<?php
 if ($forgotpassaction== 'verifycode'){
?>
        <p class="text-center">Enter the 6 digit pin sent to <br> <b><?=$_SESSION['forgot_user_email']?></b></p>

        <div class="mb-3">  
        <input
            type="text"
            name="code"
            minlength="6"
            maxlength="6"
            class="form-control rounded-0"
            id="floatingInput"
            placeholder="verification code"
            required
          />
        </div>
        <div class="d-grid gap-2 mb-3">
        <?=validation_error('email_verification') ?> 

        <button
            class="btn btn-primary mb-3 w-100"
            type="submit"
          >
            Verify Code
          </button>
          </div>
<?php
 }    
 ?>    
   
        <div class="text-center">
          <a
            href="?login"
            class="text-decoration-none text-primary"
          >
            <i class="bi bi-arrow-left-circle-fill me-1"></i> Go Back To Login
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
