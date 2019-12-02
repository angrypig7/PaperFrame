<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>PaperFrame</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main-layout.css" type="text/css">
    <?php if (!isset($NOLOGIN)) {include "login.php";}?>
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
                    <li><a href="/main.php?menu=2">Menu2</a></li>
                    <li><a href="/layout_SAMPLE.php">sample</a></li>
                    <li><a href="/hash.php">HASH</a></li>
                    <li class="last"><a href="/">LOGOUT</a></li>
                </ul>
            </nav>
        </header>
    </div>
