<?php
require_once 'config.php';
$dbConnect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die("The database didn't connect, check the database credentials");
//The following is a function used to show pages
function showPage($pageName, $data="")
{
    include("assets/pages/$pageName.php");
}

//Function to show errors on the field 
function validation_error($field){
if(isset($_SESSION['error'])){
    $err =$_SESSION['error'];
    if(isset($err['field']) && $field==$err['field']){
        ?> 
        <div class="alert alert-danger my-2" role="alert">
    <?=$err['msg']?>
</div>
        <?php

    }
}
}

//Function to checkk duplicate email in the database.
function checkExistingEmail($user_email)
{
    global $dbConnect;
    $querySql = "SELECT count(*) as row FROM users WHERE email_address='$user_email'";
    $run_query = mysqli_query($dbConnect,$querySql);
    $return_data= mysqli_fetch_assoc($run_query);
    return $return_data['row'];
}

//Check if email is held by someone else in the database
function checkOtherExistingEmail($user_email)
{
    global $dbConnect;
    $user_id = $_SESSION['userdata']['id'];
    $querySql = "SELECT count(*) as row FROM users WHERE email_address='$user_email' && id!='$user_id'";
    $run_query = mysqli_query($dbConnect,$querySql);
    $return_data= mysqli_fetch_assoc($run_query);
    return $return_data['row'];
}
//Function to check duplicate username in the database.
function checkExistingUser($user_name)
{
    global $dbConnect;
    $querySql = "SELECT count(*) as row FROM users WHERE username='$user_name'";
    $run_query = mysqli_query($dbConnect,$querySql);
    $return_data= mysqli_fetch_assoc($run_query);
    return $return_data['row'];
}

//Function to check duplicate username in the database.
function checkOtherExistingUser($user_name)
{
    global $dbConnect;
    $user_id = $_SESSION['userdata']['id'];
    $querySql = "SELECT count(*) as row FROM users WHERE username='$user_name' && id!='$user_id'";
    $run_query = mysqli_query($dbConnect,$querySql);
    $return_data= mysqli_fetch_assoc($run_query);
    return $return_data['row'];
}

//function to keep the form data values on the input fields after an error is thrown while registering
function formDataValues($field){
    if(isset($_SESSION['formdata'])){
        $formData =$_SESSION['formdata'];
        return $formData[$field];
    }

}
//To validate logins
function validate_login_function($form_data)
{
    $res=array();
    $res['status']=true;
    $blank=false;
   
    
    if(!$form_data['user_name_email'])
    {
        $res['msg'] = "Username/Email cannot be left blank";
        $res['status']=false;
        $res['field']='user_name_email';
        $blank=true;

    }
    if(!$form_data['user_password'])
    {
        $res['msg'] = "Password cannot be left blank";
        $res['status']=false;
        $res['field']='user_password';
        $blank=true;
    }  

    if(!$blank && !checkuserdata($form_data)['status'])
    {
        $res['msg'] = "The username or password is incorrect";
        $res['status'] = false;
        $res['field'] = 'checkuser';
    }
    else 
    {
        $res['user'] = checkuserdata($form_data)['user'];
    }
        
    return $res; 

}

//To check for the user in the database for login

function checkuserdata($login_data)
{
    global $dbConnect;
    $user_name_email= $login_data['user_name_email'];
    $user_password= md5($login_data['user_password']);
    $querySql = "SELECT * FROM users WHERE (email_address='$user_name_email' || username = '$user_name_email') && password='$user_password'";
    $run_query= mysqli_query($dbConnect, $querySql);
    $datafetch['user'] = mysqli_fetch_assoc($run_query)??array();
    if(count($datafetch['user'])>0)
    {
        $datafetch['status']=true;
    }
    else
    {
        $datafetch['status']=false;
    }

    return $datafetch;

}
//To get the user data by id

function getuserdata($user_id)
{
    global $dbConnect;
    $querySql = "SELECT * FROM users WHERE id=$user_id";
    $run_query= mysqli_query($dbConnect, $querySql);
    return mysqli_fetch_assoc($run_query);

}

//To validate registrations
function validate_forms_function($form_data)
{
    $res=array();
    $res['status']=true;
    if(!$form_data['user_first_name'])
    {
        $res['msg'] = "First name cannot be left blank";
        $res['status']=false;
        $res['field']='user_first_name';    

    }
    if(!$form_data['user_last_name'])
    {
        $res['msg'] = "Last name cannot be left blank";
        $res['status']=false;
        $res['field']='user_last_name';

    }
    if(!$form_data['user_email'])
    {
        $res['msg'] = "Email cannot be left blank";
        $res['status']=false;
        $res['field']='user_email';

    }
    if(!$form_data['user_name'])
    {
        $res['msg'] = "Username cannot be left blank";
        $res['status']=false;
        $res['field']='user_name';

    }
    if(!$form_data['user_password'])
    {
        $res['msg'] = "Password cannot be left blank";
        $res['status']=false;
        $res['field']='user_password';

    }  
    if(checkExistingEmail($form_data['user_email']))
    {
        $res['msg'] = "Email already registered";
        $res['status']=false;
        $res['field']='user_email';

    } 
    if(checkExistingUser($form_data['user_name']))
    {
        $res['msg'] = "username already registered";
        $res['status']=false;
        $res['field']='user_name';

    }       
    return $res; 

}

//To Insert User data into the user table
function registerUsers($data)
{
 global $dbConnect;
 $user_first_name= mysqli_real_escape_string($dbConnect,$data['user_first_name']);
 $user_last_name= mysqli_real_escape_string($dbConnect,$data['user_last_name']);
 $gender = $data['user_gender'];
 $user_email= mysqli_real_escape_string($dbConnect,$data['user_email']);
 $user_name= mysqli_real_escape_string($dbConnect,$data['user_name']);
 $user_password= mysqli_real_escape_string($dbConnect,$data['user_password']);
 $user_password = md5($user_password);
 $querySql = "INSERT INTO users(first_name, last_name, gender, email_address, username, password) VALUES('$user_first_name','$user_last_name',$gender,'$user_email','$user_name','$user_password')";
 return mysqli_query($dbConnect, $querySql);
}

//To verify email and change the acc_status value
function verifyEmailUpdatestatus($email_address)
{
    global $dbConnect;
    $querySql = "UPDATE users SET acc_status=1 WHERE email_address='$email_address'";
    return mysqli_query($dbConnect, $querySql);
}
//creating a new password
function setnewpassword($email_address, $new_password)
{
    $new_password=md5($new_password);
    global $dbConnect;
    $querySql = "UPDATE users SET password='$new_password' WHERE email_address='$email_address'";
    return mysqli_query($dbConnect, $querySql);
}

//function to validate and update in the edit profile section
function validate_update_function($form_data,$image)
{
    $image_size_given = 1024; //change this value to change the size limit for the profile picture. it is currently set to 1MB

    $res=array();
    $res['status']=true;
    
    if(!$form_data['user_first_name'])
    {
        $res['msg'] = "First name cannot be left blank";
        $res['status']=false;
        $res['field']='user_first_name';    

    }
    if(!$form_data['user_last_name'])
    {
        $res['msg'] = "Last name cannot be left blank";
        $res['status']=false;
        $res['field']='user_last_name';

    }
    if(!$form_data['user_name'])
    {
        $res['msg'] = "Username cannot be left blank";
        $res['status']=false;
        $res['field']='user_name';

    }
 

    if(checkOtherExistingUser($form_data['user_name']))
    {
        $res['msg'] = $form_data['user_name']. " is already registered";
        $res['status']=false;
        $res['field']='user_name';

    }       

    if($image['name'])
    {
        $image_name = basename($image['name']);
        $image_type = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $image_size = $image['size']/1000;

        if($image_type!= 'jpg' && $image_type!= 'jpeg' && $image_type!= 'png' && $image_type!='webp')
        {
            $res['msg'] = "Image type is not supported";
            $res['status']=false;
            $res['field']='profile_pic';
    
        }
        if($image_size>$image_size_given) 
        {
            $res['msg'] = "Image is too big, please select image smaller than " .$image_size_given/1024 ." MB";
            $res['status']=false;
            $res['field']='profile_pic';
    
        }
        
    }
    
    return $res; 
}

function updateProfile($userdata, $image)
{
    global $dbConnect;

$user_first_name= mysqli_real_escape_string($dbConnect,$userdata['user_first_name']);
 $user_last_name= mysqli_real_escape_string($dbConnect,$userdata['user_last_name']);
 //$user_email= mysqli_real_escape_string($dbConnect,$userdata['user_email']);
 $user_name= mysqli_real_escape_string($dbConnect,$userdata['user_name']);
 $user_password= mysqli_real_escape_string($dbConnect,$userdata['user_password']);


 if(!$userdata['user_password'])
 {
    $user_password= $_SESSION['userdata']['password'];
 }
 else 
 {
    $user_password = md5($user_password);
    $_SESSION['userdata']['password'] = $user_password;
 }


 $profile_pic="";
 if($image['name'])
 {
     $image_name1 = time().basename($image['name']);
     $image_target ="../images/profile/$image_name1";
     move_uploaded_file($image['tmp_name'], $image_target);
     $profile_pic= ", profile_pic='$image_name1'";
     
     
 }

 $querySql = "UPDATE users SET first_name= '$user_first_name', last_name='$user_last_name', username='$user_name', password='$user_password' $profile_pic WHERE id=".$_SESSION['userdata']['id'];
 return mysqli_query($dbConnect,$querySql);
    
}
?>