    <div class="login">
        <div class="col-4 bg-light border rounded p-4 shadow-sm">
            <form method="post" action="assets/php/validation.php?register">
                <div class="d-flex justify-content-center">

                    <img class="mb-4" src="assets/images/blinkwee.png" alt="" height="45">
                </div>
                <h1 class="h5 mb-3 fw-normal">Join BlinkWee today!</h1>
                <div class="d-flex">
                    <div class="form-floating mt-1 col-6 ">
                        <input 
                        type="text"
                        name="user_first_name"
                        value="<?= formDataValues('user_first_name')?>"
                        class="form-control rounded-0"
                        placeholder="username/email">
                        <label for="floatingInput">first name</label>
                    </div>
                    <div class="form-floating mt-1 col-6">
                        <input
                        type="text" name="user_last_name"
                        value="<?= formDataValues('user_last_name')?>"
                        class="form-control rounded-0"
                        placeholder="username/email">
                        <label for="floatingInput">last name</label>
                    </div>
                </div>
                <?=validation_error('user_first_name') ?>
                <?=validation_error('user_last_name') ?>
              
                <div class="d-flex gap-3 my-3">
                    <div class="form-check">
                        <input
                        class="form-check-input"
                        type="radio"
                        name="user_gender"
                        id="exampleRadios1"
                        value="0" checked <?=formDataValues('user_gender')==0?'checked':''?>>
                            
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                        class="form-check-input"
                        type="radio"
                        name="user_gender"
                        id="exampleRadios3"
                        value="1" <?=formDataValues('user_gender')==1?'checked':''?>>
                        <label class="form-check-label" for="exampleRadios3">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                        class="form-check-input"
                        type="radio"
                        name="user_gender"
                        id="exampleRadios2"
                            value="2" <?=formDataValues('user_gender')==2?'checked':''?>>
                        <label class="form-check-label" for="exampleRadios2">
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-floating mt-1">
                    <input 
                    type="email"
                    name="user_email"
                    value="<?= formDataValues('user_email')?>"
                    class="form-control rounded-0"
                    placeholder="username/email">
                    <label for="floatingInput">Email</label>
                </div>
                <?=validation_error('user_email') ?>
              
                <div class="form-floating mt-1">
                    <input
                    type="text"
                    name="user_name"
                    value="<?= formDataValues('user_name')?>"
                    class="form-control rounded-0"
                    placeholder="username/email">
                    <label for="floatingInput">username</label>
                </div>
                <?=validation_error('user_name') ?>
              
                <div class="form-floating mt-1">
                    <input 
                    type="password"
                    name="user_password"
                    value="<?= formDataValues('user_password')?>"
                    class="form-control rounded-0"
                    minlength="6"
                    id="floatingPassword"
                    placeholder="Password">
                    <label for="floatingPassword">password</label>
                </div>
                <?=validation_error('user_password') ?>
              
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                    <a href="?login" class="text-decoration-none">Already have an account ?</a>
                </div>
            </form>
        </div>
    </div>

