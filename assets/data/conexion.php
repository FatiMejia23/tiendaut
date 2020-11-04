<?php
    class Conexion {
        var $conn;

        function conectar(){
            $conn = null;
            try{
                $con=new PDO('mysql:host=localhost;dbname=tiendaut','root','');
            
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
               // echo 'Conectado a la base de datos <br><br>';
        }
        catch(PDOException $e){
		    die('Error conectando con la base de datos: ' 
		            . $e->getMessage());

        }
        return $conn;
    }

    function buscarUsario($user, $pass){
        $con = $this->conectar();

        $consulta = 'SELECT nombre
                    FROM usuario 
                    WHERE usuario=:usuario 
                    AND contraseña=:pass';
   
   
    $stmt = $con->prepare($consulta);
	$stmt->execute(array(':usuario'=>$user,':pass'=>$pass));    
    $registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRegistros = count($registro);

    return $numRegistros;
    }
	    
    }
?>