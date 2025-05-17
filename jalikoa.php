<?php
try {
    mkdir('./jalikoa/http',0777,true);
    echo "directory created";
} catch (e){
    echo "Error mking the dir:  ".$e->getMessage();
}