<?php
function sanitize($ch){
    return stripslashes(trim(htmlspecialchars($ch)));
}
