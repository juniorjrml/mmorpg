<?php 
function conectar_bd($username, $password){
	try {
		$conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

	return $conn;
}


function desconectar_bd($conn){
	mysqli_close($conn);
}

function logar($strUsername, $strSenha, $conn){
	$consulta = $conn->query("SELECT username, password FROM user");
	
	//para cada elemento da linha da tabela usuarios
	foreach($consulta as $usuario) {
		//verifica se a senha e o login estao corretos caso sim cria sessoes correspondentes
		if ($strUsername == $usuario["username"] && $strSenha == $usuario["password"]) {			
			//atribuicoes das sessions dos atributos de quem logou
			$_SESSION["id"] = $strUsername;
			return 1;
		}
	}
	return 0;
}

function usuarioRepetido($strUsername, $strEmail, $conn){
	$analise = $conn->query("SELECT username, email FROM user");

	foreach($analise as $usuario) {	
		if ($strLoginrepetido =($strUsername == $usuario["username"]) || $strEmailrepetido = ($strEmail == $usuario["email"]) ) {
			//manter todas as variaveis na condicional para depois implementar o q esta repetido e retornar a resposta(so email, email e login ou so login)
			return 1;
		}			
	}
	
	return 0;

}
?>