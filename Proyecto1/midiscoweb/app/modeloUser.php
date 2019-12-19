<?php 
/* DATOS DE USUARIO
• Identificador ( 5 a 10 caracteres, no debe existir previamente, solo letras y números)
• Contraseña ( 8 a 15 caracteres, debe ser segura)
• Nombre ( Nombre y apellidos del usuario
• Correo electrónico ( Valor válido de dirección correo, no debe existir previamente)
• Tipo de Plan (0-Básico |1-Profesional |2- Premium| 3- Máster)
• Estado: (A-Activo | B-Bloqueado |I-Inactivo )
*/
// Inicializo el modelo 
// Cargo los datos del fichero a la session
function modeloUserInit(){
    
    /*
    $tusuarios = [ 
         "admin"  => ["12345"      ,"Administrado"   ,"admin@system.com"   ,3,"A"],
         "user01" => ["user01clave","Fernando Pérez" ,"user01@gmailio.com" ,0,"A"],
         "user02" => ["user02clave","Carmen García"  ,"user02@gmailio.com" ,1,"B"],
         "yes33" =>  ["micasa23"   ,"Jesica Rico"    ,"yes33@gmailio.com"  ,2,"I"]
        ];
    */
   
    $datosjson = @file_get_contents(FILEUSER) or die("ERROR al abrir fichero de usuarios");
    $tusuarios = json_decode($datosjson, true);
    $_SESSION['tusuarios'] = $tusuarios;

      
}


// Comprueba usuario y contraseña (boolean)
function modeloOkUser($user,$clave){
    return ($user=='admin') && ($clave =='12345');
}


// Devuelve el plan de usuario (String)
function modeloObtenerTipo($user){
    return "Máster";
}


// Borrar un usuario (boolean)
function modeloUserDel($user){
    unset($_SESSION['tusuarios'][$user]);
   
	actualizarfichero();
	
	header('Location:index.php?orden=VerUsuarios');
}

// Añadir un nuevo usuario (boolean)
function modeloUserAdd($id,$nombre,$contra,$correo,$tipouser,$useracti){	
	
	foreach ($_SESSION['tusuarios'] as $k => $v) {
		echo "$k => $v.\n";
		if($k==$id){
			$var=1;
		}
	}
	
	if($var==1){
		header('Location:index.php?orden=AltaError');
	}else{
		array_push($_SESSION['tusuarios'][$id]);
		$_SESSION['tusuarios'][$id][0]=$contra;
		$_SESSION['tusuarios'][$id][1]=$nombre;
		$_SESSION['tusuarios'][$id][2]=$correo;
		$_SESSION['tusuarios'][$id][3]=$tipouser;
		$_SESSION['tusuarios'][$id][4]=$useracti;
			
		actualizarfichero();
		
		header('Location:index.php?orden=VerUsuarios');
	}
}


// Actualizar un nuevo usuario (boolean)
function modeloUserUpdate ($user){
    $_SESSION['0'] = $user;
	$_SESSION['1'] = $_SESSION['tusuarios'][$user][0];
	$_SESSION['2'] = $_SESSION['tusuarios'][$user][1];
	$_SESSION['3'] = $_SESSION['tusuarios'][$user][2];
	$_SESSION['4']= $_SESSION['tusuarios'][$user][3];
	$_SESSION['5'] = $_SESSION['tusuarios'][$user][4];
	
	include_once "plantilla/modificar.php";
}


// Actualizar un nuevo usuario(de verdad) (boolean)
function modeloUserUpdate2 ($id,$nombre,$contra,$correo,$tipouser,$useracti){
	//echo $_SESSION['tusuarios'][$id][0];
	
	$_SESSION['tusuarios'][$id][0]=$contra;
	$_SESSION['tusuarios'][$id][1]=$nombre;
	$_SESSION['tusuarios'][$id][2]=$correo;
	$_SESSION['tusuarios'][$id][3]=$tipouser;
	$_SESSION['tusuarios'][$id][4]=$useracti;
	actualizarfichero();	
	
	header('Location:index.php?orden=VerUsuarios');
}


// Tabla de todos los usuarios para visualizar
function modeloUserGetAll (){
    // Genero lo datos para la vista que no muestra la contraseña ni los códigos de estado o plan
    // sino su traducción a texto
    $tuservista=[];
    foreach ($_SESSION['tusuarios'] as $clave => $datosusuario){
        $tuservista[$clave] = [$datosusuario[1],
                               $datosusuario[2],
                               PLANES[$datosusuario[3]],
                               ESTADOS[$datosusuario[4]]
                               ];
    }
    return $tuservista;
}


// Datos de un usuario para visualizar
function modeloUserGet ($user){
	$_SESSION['0'] = $user;
	$_SESSION['1'] = $_SESSION['tusuarios'][$user][0];
	$_SESSION['2'] = $_SESSION['tusuarios'][$user][1];
	$_SESSION['3'] = $_SESSION['tusuarios'][$user][2];
	$_SESSION['4']= $_SESSION['tusuarios'][$user][3];
	$_SESSION['5'] = $_SESSION['tusuarios'][$user][4];
	
	include_once "plantilla/detalles.php";
}


// Vuelca los datos al fichero
function modeloUserSave(){
    
    $datosjon = json_encode($_SESSION['tusuarios']);
    file_put_contents(FILEUSER, $datosjon) or die ("Error al escribir en el fichero.");
    fclose($fich);
}

//Actualiza el fichero
function actualizarfichero(){
	$fich = @fopen(FILEUSER,"w") or die ("Error al escribir en el fichero.");
    $datosjon = json_encode($_SESSION['tusuarios']); 
    @file_put_contents(FILEUSER, $datosjon) or die ("Error al escribir en el fichero."); 
    fclose($fich);
}
