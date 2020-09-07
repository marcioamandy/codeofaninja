<?php
// login checker for 'customer' access level
 
// if access level was not 'Admin', redirect him to login page
if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    $_SESSION['action'] = "logged_in_as_admin";
    header("Location: {$home_url}indexadmin");
}
 
// if $require_login was set and value is 'true'
else if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['access_level'])){
        $_SESSION['action']="please_login";
        header("Location: {$home_url}login");
    }
}
 
// if it was the 'login' or 'register' or 'sign up' page but the customer was already logged in
else if(isset($page_title) && ($page_title=="Login" || $page_title=="Sign Up")){
    // if user not yet logged in, redirect to login page
    if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Customer"){
        $_SESSION['action']="already_logged_in";
        header("Location: {$home_url}index");
    }
}
 
else{
    // no problem, stay on current page
}
?>