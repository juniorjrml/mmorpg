<?php
 if($_POST["id"] == "" || $_POST["senha"] == "" || $_POST["email"] == ""){
 	header("location: cadastrar.php");
 }
include 'util.php';
$conn = conectar_bd();
$strId = $_POST["id"];
$strSenha = $_POST["senha"];
$strEmail = $_POST["email"];

$concluiUsuarios = "INSERT INTO usuarios(nick, senha, email) VALUE('$strId', '$strSenha', '$strEmail')";
	
if(usuarioRepetido($strId,$strEmail,$conn) == 0){
	/*atualmente oq esta garantindo*
	*a integridade do BD e a função*
	*usuarioRepetido, futuramente  *
	*alterar o campo nick e email da*
	*tabela usuarios para campos unicos*/
	if(mysqli_query($conn ,$concluiUsuarios)){
		echo "Cadastro realizado com Sucesso!<br /> <a href='index.php'>Faca login!</a>";	
	}
	else{
		echo "Falha ao realizar o cadastro!<br />
		<a href='cadastrar.php'>Tente novamente!</a><br />
		<a href='index.php'>ou faca login!</a>";
	}
}
else{
	echo "Falha ao realizar o cadastro!<br />
		Conta existente<br />
	<a href='index.php'>faca login!</a>";
}	
desconectar_bd($conn);
?>