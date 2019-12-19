<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
	
<center>
<h2>Usuarios:</h2>
<table border='1'>
	<tr>
<?php
$auto = $_SERVER['PHP_SELF'];
// identificador => Nombre, email, plan y Estado
?>
<?php foreach ($usuarios as $clave => $datosusuario) : ?>
<tr>		
<td><?= $clave ?></td> 
	<?php for  ($j=0; $j < count($datosusuario); $j++) :?>
     <td><?=$datosusuario[$j] ?></td>
	<?php endfor;?>
<td><a href="<?= $auto?>?orden=Borrar&id=<?= $clave ?>">Borrar</a></td>
<td><a href="<?= $auto?>?orden=Modificar&id=<?= $clave ?>">Modificar</a></td>
<td><a href="<?= $auto?>?orden=Detalles&id=<?= $clave?>">Detalles</a></td>
</tr>
<?php endforeach; ?>
</table>
<br><br>
<form action='index.php'>
	<input type='hidden' name='orden' value='Alta'> <input type='submit' class="myButton" value='Nuevo Usuario'>
</form>

<form action='index.php'>
	<input type='hidden' name='orden' value='Cerrar'> <input type='submit' class="myButton" value='Cerrar Sesión'>
</form>
</center>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>