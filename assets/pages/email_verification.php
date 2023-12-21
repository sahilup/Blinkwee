    <div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form method="post" action="assets/php/validation.php?email_verification">
                <div class="d-flex justify-content-center">


                </div>
                <?php 
                if(isset($_GET['code_resent']))
                {
                    ?> 
                    <div class="alert alert-success">Code resent! </div>
                    
                    <?php
                }
                ?>
                <h1 class="h5 mb-3 fw-normal">Verify Your Email Address</h1>


                <p>Please enter the 6 digit pin sent to you</p>
                <div class="form-floating mt-1">

                    <input type="text" name="verification_code" minlength="6" maxlength="6" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">######</label>
                </div>
                <?=validation_error('email_verification') ?>
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <a href="assets/php/validation.php?resend_code" class="text-decoration-none" type="submit">Resend pin</a>
                    <button class="btn btn-primary" type="submit">Verify Email</button>
                </div>
                <br>
                <a href="assets/php/validation.php?logout" class="text-decoration-none mt-5"><i class="bi bi-arrow-left-circle-fill"></i>
                    Logout</a>
            </form>
        </div>
    </div>