<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


function serverinfo($serverno){
    $serverno[3];

    switch($serverno){
        case 0:
            $server[0] = "127.0.0.1";
            $server[1] =  80;
            return $server;
            break;
        case 1: //Odorid HC1
            $server[0] = "121.184.155.176";
            $server[1] = 22;
            return $server;
            break;
        case 2: //RaspPi 2B
            $server[0] = "";
            $server[1] =  22;
            return $server;
            break;
        case 3: //IWINV waterplus
            $server[0] = "115.68.231.45)";
            $server[1] =  22;
            return $server;
            break;
    }
}

function checkalive_echo($ip, $port){
    if($socket = @fsockopen($ip, $port, $errno, $errstr)) {
        echo 'online!';
        fclose($socket);
    } else {
        fclose($socket);
        echo "ERROR - OFFLINE<br>";
        echo "DEBUG: $errno - $errstr<br />\n";
        echo "ERROR<br>";
    }
}


function checkalive($ip, $port){
    if($socket = @fsockopen($ip, $port, $errno, $errstr)) {
        return 0;   //server is up
        fclose($socket);
    } else {
        return 1;   //server is down
    }
}


function checkalive_not_working($ip, $port){
    $fp = @fsockopen($ip, $port, $errno, $errstr);
    if (!$fp) {
        echo "ERROR<br>";
        echo "ERROR: $errno - $errstr<br />\n";
        echo "ERROR<br>";
    }
    else{
        echo "$fp";
        fclose($fp);
    }
}
?>
