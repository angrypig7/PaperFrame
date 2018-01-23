<?php
function checkalive($ip, $port){
    if($socket = @fsockopen($ip, $port, $errno, $errstr)) {
        echo 'online!';
        fclose($socket);
    } else {
        echo "ERROR - OFFLINE</br>";
        echo "DEBUG: $errno - $errstr<br />\n";
        echo "ERROR</br>";
    }
}

function checkalive_not_working($ip, $port){
    $fp = @fsockopen($ip, $port, $errno, $errstr);
    if (!$fp) {
        echo "ERROR</br>";
        echo "ERROR: $errno - $errstr<br />\n";
        echo "ERROR</br>";
    }
    else{
        echo "$fp";
    }
}
?>
