<?php
    if(isset($_POST["register"])){
        require_once "../src/controllers/register_controller.php"; 
    }
    if(isset($_POST["login"])){
        require_once "../src/controllers/login_controller.php"; 
    }
    if(isset($_POST["contactus"])){
        require_once "../src/controllers/contactus_controller.php"; 
    }
    if(isset($_POST["logout"])){
        require_once "../src/controllers/logout_controller.php"; 
    }
    if(isset($_POST["reset_password"])){
        require_once "../src/controllers/account_manager.php"; 
    }
    if(isset($_POST["enter_otp"])){
        require_once "../src/controllers/account_manager.php"; 
    }
    if(isset($_POST["updateonline"])){
    require_once "../src/controllers/online_updater_controller.php";
    }