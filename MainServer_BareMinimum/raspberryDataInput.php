<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DataInput</title>
</head>
<body>
<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

include_once('dist/Medoo.php');

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$publicip = get_client_ip();
$curtime = (new DateTime())->format("Y-m-d H:i:s");

if(isset($_POST['localip'])){
    $localip = $_POST['localip'];
    $coretemp = $_POST['coretemp'];
}
$SQL = "INSERT INTO paper_server VALUES('', '$curtime', '$localip', '$publicip', '$coretemp')";
mysqli_query($conn, $SQL);

echo("</br><hr></br>PublicIP = $publicip</br>");
echo("localip = $localip</br>");
echo("coretemp = $coretemp</br>");
echo("curtime = $curtime</br></br><hr></br>");

?>
</body>
</html>
