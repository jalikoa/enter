<?php
/**
 * Future guardians initiative 
 *
 * @see       https://github.com/jalikoa/fgi/ The future guardians repository
 * @author    Calvince Owino Jalikoa (Kenya) <d34calvo@gmail.com>
 * @copyright 2024 - 2025 Calvince Owino CEO Jalsoft
 * @license   Thi programe is written for the specific needs of future guardians initiative and no part can be taken away without prior permissions
 * CEO JalSoft Calvince Owino
 * @see contact at +254799311413
 */
require_once "../src/models/logout_model.php";
use jalikoa\FGIprogramme\logout;
$logout = new logout();
if ($logout->logout_user()){
    echo json_encode(["success" => true,"message" => "Succefully logged out"]);
} else {
    echo json_encode(["logout unsuccesfull"]);
}