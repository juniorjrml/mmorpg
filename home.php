<?php
	session_start();
?>
<!DOCTYPE html>
<head>
<title>
MMORPG Rev
</title>
</head>
<body>
<?php
		if($_SESSION["logado"]!= 1){//case não esteja logado tenta conectar
			include 'util.php';
			$conn = conectar_bd();
			$strId = $_POST["id"];
			$strSenha = $_POST["senha"];
			$_SESSION["logado"] = logar($strId,$strSenha,$conn);
			desconectar_bd($conn);
		}
		// se conseguiu logar
		if ($_SESSION["logado"] == 1) {
			//imprime o menu
			echo "<table border='2'><tr><td>";
			echo "<h2>Seja bem vindo </h2>".$_SESSION["id"];
			echo "</td></tr></table>";
			echo "<br />";
			echo "<table border='1'><tr><td>Voce esta logado!</td></tr></table><table border='1'><tr><td><br /><a href='inicio.php'>Jogar!</a><br />";
			echo "<br /> <a href='logout.php'>sair</a></td></tr></table>";
		}
		else {
			//mensagem mensagem caso nao tenha conseguido logar
			echo "vc nao esta logado!<h6><a href='index.php'>(faca login aqui)</a></h6>";
		}
?>
</body>
</html>
