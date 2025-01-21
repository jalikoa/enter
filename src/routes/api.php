<?php
    if(isset($_POST["register"])){
        require_once "../src/controllers/register_controller.php"; 
    }
    elseif(isset($_POST["login"])){
        require_once "../src/controllers/login_controller.php"; 
    }
    elseif(isset($_POST["contactus"])){
        require_once "../src/controllers/contactus_controller.php"; 
    }
    elseif(isset($_POST["logout"])){
        require_once "../src/controllers/logout_controller.php"; 
    }
    elseif(isset($_POST["reset_password"])){
        require_once "../src/controllers/account_manager.php"; 
    }
    elseif(isset($_POST["enter_otp"])){
        require_once "../src/controllers/account_manager.php"; 
    }
    elseif(isset($_POST["updateonline"])){
    require_once "../src/controllers/online_updater_controller.php";
    }
    elseif(isset($_POST["addnewmember"])){
        require_once "../src/controllers/members_controller.php";
    }
    elseif(isset($_POST["searchmember"])){
        require_once "../src/controllers/members_controller.php";
    } 
    elseif(isset($_POST["fetchmebers"])){
        require_once "../src/controllers/members_controller.php";
    } 
    elseif(isset($_POST["addnewdiscussion"])){
        require_once "../src/controllers/discussions_controller.php";
    } 
    elseif(isset($_POST["updateTyping"])){
        require_once "../src/controllers/typing_updater_contrroler.php";
    }
    elseif(isset($_POST["sendmessage"])){
        require_once "../src/controllers/messages_controller.php";
    }
    elseif(isset($_POST["fetchmessages"])){
        require_once "../src/controllers/messages_controller.php";
    }
    else {
        require_once "./index.html";
    }