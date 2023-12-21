<?php
global $user;
?>  
  <div class="container col-9 rounded-0 d-flex justify-content-between">
        <div class="col-12 bg-white border rounded p-4 mt-4 shadow-sm">
            <form method="post" action="assets/php/validation.php?profileupdate" enctype="multipart/form-data">
                <div class="d-flex justify-content-center">

                </div>
                <h1 class="h5 mb-3 fw-normal">Edit Profile</h1>

                <?php
                if(isset($_GET['profile_updated']))
                {

                    ?>
                    <p class="text-success">
                        Profile Updated sucessfully!
                    </p>
                    <?php
                } 
                
                ?>

<?php
                if(isset($_GET['profile_update_failed']))
                {

                    ?>
                    <p class="text-success">
                    Something went wrong!
                    </p>
                    <?php
                } 
                
                ?>
                <div class="form-floating mt-1 col-6">
                    <img src="assets/images/profile/<?=$user['profile_pic']?>" class="img-thumbnail my-3" style="height:150px;" alt="...">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Change Profile Picture</label>
                        <input class="form-control" type="file" name="profile_pic" id="formFile">
                    </div>
                </div>
                <?= validation_error('profile_pic') ?>

                <div class="d-flex">
                    <div class="form-floating mt-1 col-6 ">
                        <input type="text" name="user_first_name" value="<?=$user['first_name']?>" class="form-control rounded-0" placeholder="First Name">
                        <label for="floatingInput">first name</label>
                    </div>

                    <div class="form-floating mt-1 col-6">
                        <input type="text" name="user_last_name" value="<?=$user['last_name']?>" class="form-control rounded-0" placeholder="Last Name">
                        <label for="floatingInput">last name</label>
                    </div>
                </div>
                <?= validation_error('user_first_name') ?>
                <?= validation_error('user_last_name') ?>

                <div class="d-flex gap-3 my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                            value="option1" <?=$user['gender']==0?'checked':''?> disabled>
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                            value="option2" <?=$user['gender']==1?'checked':''?> disabled>
                        <label class="form-check-label" for="exampleRadios3">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option2" <?=$user['gender']==2?'checked':''?> disabled>
                        <label class="form-check-label" for="exampleRadios2">
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-floating mt-1">
                    <input type="email" class="form-control rounded-0" name="user_email" value="<?=$user['email_address']?>" placeholder="username/email" disabled>
                    <label for="floatingInput">Email Address</label>
                </div>

                <br>
                <div class="form-floating mt-1">
                    <input type="text" class="form-control rounded-0" name="user_name" value="<?=$user['username']?>" placeholder="username/email">
                    <label for="floatingInput">Username</label>
                </div>
                <?= validation_error('user_name') ?>

                <br>
                <div class="form-floating mt-1">
                    <input type="password" class="form-control rounded-0" id="floatingPassword" name="user_password" minlength="6" placeholder="Password">
                    <label for="floatingPassword">New password</label>
                </div>
                <?= validation_error('user_password') ?>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Update Profile</button>



                </div>

            </form>
        </div>

    </div>