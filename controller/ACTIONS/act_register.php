<?php
        
        require_once (__DIR__."/../MDB/mdbCliente.php");	
		$errMsg = 'OK';
	
        $numero_movil = $_POST['Telefono'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];        
        $password = $_POST['Contraseña'];
        $email = $_POST['Email'];

        $cliente = autenticarCliente($email, $password);
		if($cliente == null){

            $nuevocliente=NULL;
            $nuevocliente= new Cliente("",$nombre,$apellido,$numero_movil,$password,$email);
            insertarCliente($nuevocliente);
            //header("Location: ../../view/store/registrate.html?band=2"); 

            echo'<script type="text/javascript">
            alert("Cliente registrado correctamente");
            window.location.href="../../view/store/";
            </script>';
                    
		}else{
             $errMsg .= 'telefono y/o contraseña no válido o existente';

             echo'<script type="text/javascript">
             alert("telefono y/o contraseña no válido o existente");
             window.location.href="../../view/store/registrate.html";
             </script>';

            //header("Location: ../../view/store/registrate.html?band=1"); 
		}

    
        
        
?>