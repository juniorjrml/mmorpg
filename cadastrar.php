<?php
session_start();
if ($_SESSION["logado"] != 1) {
	echo "<form action='registra.php' method='post'>
	<table border='2' title='Identificador,Login'><tr><td>Id:<input type='text' name='id'></input></td></tr></table>
	<table border='2'><tr><td>Senha:<input type='password' name='senha'></input></td></tr></table>
	<table border='2'><tr><td>Email:<input type='text' name='email'></input></td></tr></table>
	<input type='submit' value='Cadastrar'>
	</form>";
}
?>