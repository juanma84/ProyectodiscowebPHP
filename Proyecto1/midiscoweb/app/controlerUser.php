<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------
include_once 'config.php';
include_once 'modeloUser.php';

/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlUserInicio(){
    $msg = "";
    $user ="";
    $clave ="";
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['user']) && isset($_POST['clave'])){
            $user =$_POST['user'];
            $clave=$_POST['clave'];
            if ( modeloOkUser($user,$clave)){
                $_SESSION['user'] = $user;
                $_SESSION['tipouser'] = modeloObtenerTipo($user);
                if ( $_SESSION['tipouser'] == "Máster"){
                    $_SESSION['modo'] = GESTIONUSUARIOS;
                    header('Location:index.php?orden=VerUsuarios');
                }
                else {
                  // Usuario normal;
                  // PRIMERA VERSIÓN SOLO USUARIOS ADMISTRADORES
                  $msg="Error: Acceso solo permitido a usuarios Administradores.";
		
                  // $_SESSION['modo'] = GESTIONFICHEROS;
                  // Cambio de modo y redireccion a verficheros
                }
            }
            else {
                $msg="Error: usuario y contraseña no válidos.";
           }  
        }
    }
    
    include_once 'plantilla/facceso.php';
}

// Cierra la sesión y vuelca los datos
function ctlUserCerrar(){
    session_destroy();
    modeloUserSave();
    header('Location:index.php');
}

function ctlUserAlta(){
	include_once 'plantilla/añadir.php';
}

function ctlUserAltaError(){
	include_once 'plantilla/añadir2.php';
}

function ctlUserAlta2(){
	$id = $_GET['iduser'];
	$nombre = $_GET['nombre'];
	$contra = $_GET['contra'];
	$correo = $_GET['correo'];
	$tipouser = $_GET['tipouser'];
	$useracti = $_GET['useracti'];
	
	modeloUserAdd($id,$nombre,$contra,$correo,$tipouser,$useracti);	
}

function ctlUserDetalles(){
	$clav = $_GET['id'];
	modeloUserGet($clav);	
}

function ctlUserModificar(){
	$clav = $_GET['id'];
	modeloUserUpdate($clav);	
}

function ctlUserActualizar(){
	$id = $_GET['iduser'];
	$nombre = $_GET['nombre'];
	$contra = $_GET['contra'];
	$correo = $_GET['correo'];
	$tipouser = $_GET['tipouser'];
	$useracti = $_GET['useracti'];
	
	modeloUserUpdate2($id,$nombre,$contra,$correo,$tipouser,$useracti);	
}



function ctlUserBorrar(){
	$clav = $_GET['id'];
	modeloUserDel($clav);
}


// Muestro la tabla con los usuario 
function ctlUserVerUsuarios (){
    // Obtengo los datos del modelo
    $usuarios = modeloUserGetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verusuariosp.php';
   
}
