<?php
    header("Access-Control-Allow-Origin: http://localhost:3000");
    // header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, application");
    require_once "../src/routes/api.php";
