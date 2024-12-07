<?php

class logout {
    public function logout_user(){
    session_start();
    session_unset();
    session_destroy();
    return true;
    } 
}