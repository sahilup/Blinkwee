<?php
require_once 'assets/php/functions.php';
if(isset($_SESSION['Authentication']))
{
    $user = getuserdata($_SESSION['userdata']['id']);

}

$pageurlcount = count($_GET);


//Check if the user is logged in if yes then show the following content. The  user is verified here. The code is 1
if(isset($_SESSION['Authentication']) && $user['acc_status']==1 && !$pageurlcount)
{
    showPage('header',['pageTitle'=>'BlinkWee']);
    showPage('navbar');
    showPage('wall');
}
//The User is not verified and is directed to the verification page. The code is 0
elseif(isset($_SESSION['Authentication']) && $user['acc_status']==0 && !$pageurlcount)
{
    showPage('header',['pageTitle'=>'Verify Your Email']);
    showPage('email_verification');
}
//The user is banned by the admin and is directed to the banned page. The code is 2
elseif(isset($_SESSION['Authentication']) && $user['acc_status']==2 && !$pageurlcount)
{
    showPage('header',['pageTitle'=>'Account Banned']);
    showPage('banned');
}

elseif(isset($_SESSION['Authentication']) && isset($_GET['edit_profile']))
{
    showPage('header',['pageTitle'=>'Edit Your Profile']);
    showPage('navbar');
    showPage('edit_profile');
}


//Show registration page 
elseif(isset($_GET['register']))
{
    showPage('header',['pageTitle'=>'Register on BlinkWee']);
    showPage('register');
}

//show login page
elseif(isset($_GET['login']))
{
    showPage('header',['pageTitle'=>'login on BlinkWee']);
    showPage('login');
}

//show forgot password page
elseif(isset($_GET['forgotpassword']))
{
    showPage('header',['pageTitle'=>'forgot your password?']);
    showPage('forgot_password');
}

//if the user is not logged in and if it access the site then show login page by default
else
{
    if(isset($_SESSION['Authentication']))
    {
        showPage('header',['pageTitle'=>'BlinkWee']);
        showPage('navbar');
        showPage('wall');
    }
    else
    {
        showPage('header',['pageTitle'=>'login on BlinkWee']);
        showPage('login');
    }
    
}

showPage('footer'); 

unset($_SESSION['error']); 
unset($_SESSION['formdata']);