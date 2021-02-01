<?php 
function conectar_bd(){
	$conn = mysqli_connect("localhost","id2777745_juniorjrml","147741","id2777745_america");
								if (!$conn) {
									die("Connection failed: " . mysqli_connect_error());
								}
								return $conn;
}
function desconectar_bd($conn){
	mysqli_close($conn);
}

function logar($strId,$strSenha,$conn){
	$consulta = mysqli_query($conn ,"SELECT nick, senha FROM usuarios");
	
	//para cada elemento da linha da tabela usuarios
	while($Resultado = mysqli_fetch_assoc($consulta)) {
		//verifica se a senha e o login estao corretos caso sim cria sessoes correspondentes
		if ($strId == $Resultado["nick"] && $strSenha == $Resultado["senha"]) {			
			//atribuicoes das sessions dos atributos de quem logou
			$_SESSION["id"] = $strId;
			return 1;
		}
	}
	return 0;
}

function usuarioRepetido($strId,$strEmail,$conn){
	$consulta = mysqli_query($conn ,"SELECT nick, email FROM usuarios");
	while ($analise = mysqli_fetch_assoc($consulta)) {	
		if ($strLoginrepetido =($strId == $analise["nick"]) || $strEmailrepetido = ($strEmail == $analise["email"]) ) {
			//manter todas as variaveis na condicional para depois implementar oq estrepetido e retornar a resposta(so email, email e login ou so login)
			return 1;
		}			
	}
	return 0;
	
}
?>