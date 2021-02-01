<?php
session_start();

?>
<!DOCTYPE html>
<head>
<title>
MMORPG Rev
</title>
<link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>


				<div class='fundo'>
                <div class='login'>
                <form action='home.php' method='post'>
                Login:<br />
                <input type='text' name='id'><br />
                Senha:<br />
                <input type='password' name='senha'><br /><br />
                <input type='submit' value='Entrar'>
                </form>
                <br />
                <a href='cadastrar.php'>Cadastrar</a>
                </div>
				</div>


</body>
</html>