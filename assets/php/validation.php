<?php
require_once 'functions.php';
require_once 'sendMail.php';


//The following code is used for login 
if(isset($_GET['login']))
{
$res=validate_login_function($_POST);
//the following code is used to send OTP
if($res['status'])
{
    $_SESSION['Authentication'] = true;
    $_SESSION['userdata'] = $res['user'];
    if($res['user']['acc_status']==0)
    {
       $_SESSION['code']= $verificationCode = rand(111111,999999);
       sendmailcode($res['user']['email_address'],'Please verify your Email Address',$verificationCode);
    }
    header("location:../../");
    
}
else
{
    $_SESSION['error'] =$res;
    $_SESSION['formdata']=$_POST;
    header("location:../../?login");
}
}

//The following code is used for registration
if(isset($_GET['register']))
{
$res=validate_forms_function($_POST);
if($res['status'])
{
    if(registerUsers($_POST))
    {
        header('location:../../?login&newuser');
    }
    else
    {
        echo "<script> alert('something went wrong') </script>";
    }

}
else
{
    $_SESSION['error'] =$res;
    $_SESSION['formdata']=$_POST;
    header("location:../../?register");
}
}

//The following code is used for resending the OTP code on the email of the user.
if(isset($_GET['resend_code']))
{
    $_SESSION['code']= $verificationCode = rand(111111,999999);
       sendmailcode($_SESSION['userdata']['email_address'],'Please verify your Email Address',$verificationCode);
       header('location:../../?code_resent');
}
//The following code checks if the verification code written by the user matches the code given by the system
if(isset($_GET['email_verification']))
{
    $user_code= $_POST['verification_code'];
    $actual_code = $_SESSION['code'];
    
if($actual_code==$user_code)
    {
        if(verifyEmailUpdatestatus($_SESSION['userdata']['email_address']))
            {
                header('location:../../');
            }
        else 
            {
                echo "something went wrong";
            }

    }
else
{
    if (empty($user_code)) 
    {
        $res['msg'] ='The code cannot be empty';
    } 
    else 
    {
        $res['msg'] = 'Incorrect verification code';
    }
    $res['field']= 'email_verification';
    $_SESSION['error']= $res;
    header('location:../../');
}
}

//To log the user out
if(isset($_GET['logout']))
{
    session_destroy();
    header('location:../../');
}
//The following code checks email for forgot password and sends OTP
if(isset($_GET['forgotpassword']))
{
    if(empty($_POST['user_email']))
    {
        $res['msg'] = "Enter your Email ID";
        $res['field']='user_email';
        $_SESSION['error']= $res;
        header('location:../../?forgotpassword');
    }
    elseif(!checkExistingEmail($_POST['user_email']))
    { 
        $res['msg'] = "Email not register";
        $res['field']='user_email';
        $_SESSION['error']= $res;
        header('location:../../?forgotpassword');  
    } 
    else
    {
        $_SESSION['forgotpasscode']= $verificationCode = rand(111111,999999);
        sendmailcode($_POST['user_email'],'forgot your password?',$verificationCode);
        header('location:../../?forgotpassword&code_resent');
        $_SESSION['forgot_user_email'] = $_POST['user_email'];
    }

    }

    //The following code verifies the OTP

    if(isset($_GET['verifycode']))
{
    $user_code= $_POST['code'];
    $actual_code = $_SESSION['forgotpasscode'];
    
if($actual_code==$user_code)
    {
        $_SESSION['temp_auth']=true;
        header('location:../../?forgotpassword');
    }
else
{
    if (empty($user_code)) 
    {
        $res['msg'] ='The code cannot be empty';
    } 
    else 
    {
        $res['msg'] = 'Incorrect verification code';
    }
    $res['field']= 'email_verification';
    $_SESSION['error']= $res;
    header('location:../../?forgotpassword');
}

}
if(isset($_GET['changepasscode']))
{
    if(empty($_POST['user_password']))
    {

        $res['msg'] = "Enter your new password";
        $res['field']='user_password';
        $_SESSION['error']= $res;
        header('location:../../?forgotpassword');
    }
    else
    {
    setnewpassword($_SESSION['forgot_user_email'],$_POST['user_password']);
    header('location:../../?reset');
    session_destroy();
    
    }
}

if(isset($_GET['profileupdate']))
{

    $res=validate_update_function($_POST, $_FILES['profile_pic']);

    if($res['status'])
    {

        if(updateProfile($_POST, $_FILES['profile_pic']))
        {
            
            header("location:../../?edit_profile&profile_updated");
       
        }
        else
        {
            header("location:../../?edit_profile&profile_update_failed");

        }


    }
else
    {
        $_SESSION['error'] =$res;
        
        header("location:../../?edit_profile&profile_update_failed");
    }
}