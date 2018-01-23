<?php
include("./head.php");
include_once('dist/Medoo.php');
include_once('SocketPing.php');

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

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
$localip = "0";//inital value
$temperature = "0";//inital value
$serverno = -100;//inital value

if(isset($_GET['serverno'])){
    $serverno = $_GET['serverno'];
    if($serverno < 0 || $serverno > 3){
        $serverno = 0;
    }
}
if(isset($_POST['localip'])){
    $localip = $_POST['localip'];
}
if(isset($_POST['temperature'])){
    $temperature = $_POST['temperature'];
}

// if($localip!=0){
//     $SQL = "INSERT INTO pf_servers VALUES('', '$curtime',  '$serverno', '$localip', '$publicip', '$temperature')";
//     mysqli_query($conn, $SQL);
// }

switch($serverno){
    case 0:
        $serverip = "127.0.0.1";
        $serverport = 80;
        break;
    case 1:
        $serverip = "121.184.155.176";
        $serverport = 22;
        break;
    case 2:
        $serverip = "127.0.0.1";
        $serverport = 22;
        break;
    case 3:
        $serverip = "127.0.0.1";
        $serverport = 22;
        break;
}

?>
<!-- content -->
<div class="wrapper row2">
    <div id="container" class="clear">
        <!-- content body -->
        <div id="homepage">
            <!-- One Quarter -->
            <h1><?php echo"SERVER $serverno"; ?></h1>
            <section id="code">
                <form class="" action="#" method="post">
                    <input type="text" name="localip" placeholder="localip"></br>
                    <input type="text" name="temperature" placeholder="temperature"></br>
                    <input type="submit" value="Submit"></br>
                </form>
            </section>
            <section id="code">
                <?php
                echo("serverno : $serverno</br>");
                echo("publicIP : $publicip</br>");
                echo("localip : $localip</br>");
                echo("temperature : $temperature</br>");
                echo("curtime : $curtime</br></br></br>");
                checkalive($serverip, $serverport);
                ?>
            </section>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include("./footer.php"); ?>
