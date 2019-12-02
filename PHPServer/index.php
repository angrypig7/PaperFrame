<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN-PaperFrame</title>
        <link rel="stylesheet" href="assets/css/login-style.css" type="text/css">

    </head>
    <body>
        <?php setcookie("LOGINVAL", "NULL", 1); ?>
        <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Paper<span>Frame</span></div>
		</div>
		<br>
		<div class="login">
            <form class="" action="login.php" method="post">
                <input type="text" placeholder="username" name="ID" autofocus><br>
				<input type="password" placeholder="password" name="PW"><br>
				<input type="submit" value="Login">
            </form>
		</div>
    </body>
</html>
