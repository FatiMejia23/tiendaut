<?php
	try{
	$con=new PDO('mysql:host=localhost;dbname=tiendaut','root','');

	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	echo 'Conectado a la base de datos <br><br>';
/*

//Esta parte busca todos los registros de la tabla  y regresa todos los nombre

	$stmt = $con->prepare('SELECT nombre FROM usuario');
	$stmt->execute();

	while($datos = $stmt->fetch() ){
		echo 'Nombre: '. $datos[0] . '<br>'; 
	}
*/
$user = 'juanito';
	$pass = 'bbbbb';
	$nombre = 'Lebron James';
	$correo = 'lebron@nba.com';

// Regresa el registro Juan 
	
/*
	$stmt = $con->prepare('SELECT nombre, correo FROM usuario WHERE usuario=:usuario');
	$stmt->bindParam(':usuario',$user, PDO::PARAM_STR);
	$stmt->execute();
	//$stmt->execute(array(':usuario'=>$user));

	while($datos = $stmt->fetch() ){
		echo 'Nombre: ' . $datos[0] . '<br>' . 'Correo: '. $datos[1]; 
	}	
*/
	//insercion de registro
$user='Juanchita';
$pass='14561';

$stmt =$con->prepare('INSERT INTO USUARIO (nombre,contraseña)
VALUES (:user,:pass)');
$rows = $stmt->execute(array(':user'=>$user,':pass'=>$pass));


if($rows == 1){
echo 'Insercion correcta';
}


/*
		//Modificacion de un registro
		$stmt = $con->prepare('UPDATE usuario SET usuario=:user WHERE nombre=:nom');
		$rows = $stmt->execute(array(':user'=>$user,':nom'=>$nombre));

		if($rows > 0){
			echo 'Modificacion correcta';
		} 

*/
		//Borrar de un registro
		$stmt = $con->prepare('DELETE FROM usuario WHERE usuario=:user');
		$rows = $stmt->execute(array(':user'=>$user));

		if($rows > 0){
			echo 'Borrado correcto';
		}
	}
	catch(PDOException $e){
		die('Error conectando con la base de datos: ' 
		. $e->getMessage());

	}
?>