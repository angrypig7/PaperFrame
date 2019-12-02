<?php  // validate login status

if(isset($NOLOGIN)){
    $quadhashID = "857b47cfadee1b62e6057c23d3cb880e7d5c5c19edcd95c71d3a0b4a0164c21445d3afa8acecc86099d54c9696db0e5a953634b44b1652fbdf5838bff97f3d4b";
    $quadhashPW = "e91fff92100ab81af765adc0e62f286b313629dc146b659f5db67d208edab8c49b6be2a23bbf884e9ebf44c733368797649b3305482059f8dbd7fb85f622ad5d";
    $hashcookie = "68d609bd44a83f4756bc99a35ecdf4c29d6472a9244b10b4443c621abc2741913b58e511aef9bfb854df3cf40203938b0026ff78ba9caecc0294742dbc48e75c";
    // ID and PW are hashed twice, cookie value will be checked after being hashed twice again.

    $ID=addslashes($_POST['ID']);
    $PW=addslashes($_POST['PW']);

    $userhashID = hash("sha512", hash("sha512", $ID));
    $userhashPW = hash("sha512", hash("sha512", $PW));

    if($quadhashID==$userhashID && $quadhashPW==$userhashPW){
        setcookie("LOGINVAL", $hashcookie);
        echo"<script>location.replace('/main.php');</script>";
    }else{
        echo"<script>alert('Incorrect Login!');location.replace('/');</script>";
        die;
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>PaperFrame</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main-layout.css" type="text/css">
    <?php if (!isset($NOLOGIN)) {include "index.php";}?>
</head>
<body>
    <div class="wrapper row1">
        <header id="header" class="clear">
            <div id="hgroup">
                <h1><a href="/main.php">Paper<span>Frame</span></a></h1>
                <h2>Server management script</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="/main.php">Main</a></li>
                    <li><a href="/main.php">Linux_Script</a></li>
                    <li><a href="/layout_SAMPLE.php">sample</a></li>
                    <li class="last"><a href="/">LOGOUT</a></li>
                </ul>
            </nav>
        </header>
    </div>
