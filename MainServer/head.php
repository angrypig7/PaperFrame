<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>PAPERFRAME - server management page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main-layout.css" type="text/css">
    <script type="text/javascript" src="assests/js/main.js"></script>
    <?php include "login.php"; ?>
</head>
<body>
    <div class="wrapper row1">
        <header id="header" class="clear">
            <div id="hgroup">
                <h1><a href="/main.php">Paper<span>Frame</span></a></h1>
                <h2>server management page powered from Odroid</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="/server.php?serverno=1">Server1</a></li>
                    <li><a href="/server.php?serverno=2">Server2</a></li>
                    <li><a href="/server.php?serverno=3">Server3</a></li>
                    <li><a href="/hash.php">HASH</a></li>
                    <li class="last"><a href="/">LOGOUT</a></li>
                </ul>
            </nav>
        </header>
    </div>
