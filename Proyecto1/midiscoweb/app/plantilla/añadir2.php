<html>
	<header>
		<link rel="shortcut icon" href="../img/disco.png"/>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
		<link href="web/css/cabecera.css" rel="stylesheet" type="text/css" />
		<link href="web/css/iniciar.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="web/js/funciones.js"></script>
		</script>
	</header>
	
	<nav>	
		<ul id="menu-bar">
		<li><b><a href="../index.html"><img class="disco" src="../img/disco.png"></a></b></li>
		 <li><a href="../index.html">Inicio</a></li>
		 <li><a href="informacionutil.html">Información Útil</a></li>
		 <li><a href="#">Modos</a>
		  <ul>
		   <li><a href="supervivencia.html">Supervivencia</a></li>
		   <li><a href="creativo.html">Creativo</a></li>
		   <li><a href="aventura.html">Aventura</a></li>
		   <li><a href="extremo.html">Extremo</a></li>
		  </ul>
		 </li>
		 <li><a href="#">Recetas</a>
		  <ul>
		   <li><a href="fabricacion.html">Fabricación</a></li>
		   <li><a href="alquimia.html">Alquimia</a></li>
		   <li><a href="fundicion.html">Fundicion</a></li>
		  </ul>
		 </li>
		 
		 <li class="active" id="ini"><a href="iniciar.html">Iniciar Sesion</a></li> 
		</ul>
	</nav>
	
	<section>
		<center>
		<br>
		<h2>Alta de Usuario</h2>
		<h2>¡Atención!¡El usuario ya existe!</h2>
		<form action='index.php'>
			Usuario(id): <input name="iduser" type="text"><br>
			Nombre: <input name="nombre" type="text"><br>
			Contraseña: <input name="contra" type="text"><br>
			Correo: <input name="correo" type="text"><br>
			Tipo de usuario:
			<select name="tipouser">
				<option value="0" >Basico</option>
				<option value="1">Profesional</option>
				<option value="2">Premium</option>
				<option value="3">Máster</option>
			</select> <br>
			
			 Estado del usuario: 
			 <select name="useracti">
				<option value="A" >Activo</option>
				<option value="I">Inactivo</option>
				<option value="B">Bloqueado</option>
			</select> <br><br>
			<input type='submit' name="orden" class="myButton" value='Alta Usuario'>
			
		</form>
		<form action='index.php'>
			<input type='hidden' name='orden' value='VerUsuarios'><input type='submit' class="myButton" value='Atrás'>
		</form>
		</center>
	</section>
	
	<footer class="final">	
		<center><a href="http://www.facebook.es"><img src="../img/F.png" class="fotofacebook"/></a>
		<a href="http://www.instagram.es"><img src="../img/I.png" class="fotoinsta"/></a>
		<a href="http://www.twitter.es"><img src="../img/T.png" class="fototwitter"/></a>
		<img src="../img/copi.png" class="fotocopi"/></center>
		<span class="info">&nbsp&nbsp&nbsp&nbsp&nbsp David Gómez Roldán<br>gomezdavid253@gmail.com</span>
	</footer>
</html>
