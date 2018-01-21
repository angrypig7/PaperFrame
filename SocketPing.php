<?php
$fp = @fsockopen("121.183.192.10", 22, $errno, $errstr);
if (!$fp) {
    echo "ERROR</br>";
    echo "ERROR: $errno - $errstr<br />\n";
    echo "ERROR</br>";
}
else{
    echo "$fp";
}
?>
