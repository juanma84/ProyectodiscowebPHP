

<?php 
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
?>
	<header>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
	</header>
<center>
			<h2>Acceso solo permitido a usuarios Administradores.</h2>
			<h2>Login</h2>
			<div class="formu">
				<form name='ACCESO' method="post" action="index.php">
					<br>
					<span>Usuario:</span><br> 
					<input type="text" name="user" id="usuario" value="<?= $user ?>"></input>
					<br><br>
					<span>Contraseņa:</span><br>
					<input type="password" name="clave" id="contra" value="<?= $clave ?>"></input>
					<br><br>
					<input type="submit" name="orden" id="enviar" value="Entrar"></input>
				</form>
			</div>
</center>
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido
$contenido = ob_get_clean();
include_once "principal.php";

?>
