<?php
 function conn_mysql(){

   
$servidor = '$sr1fm16sth.database.windows.net
'   
$porta = 1433;
   
$banco = "bancodani"
   
$usuario = "daniela";
   
$senha = "dani#2015"
      
$conn = new PDO("sqlsrv:server=$servidor;
	                   
		 port=$porta;
					   
		 dbname=$banco", 
					   
		 $usuario, 
					   
		 $senha,
					  
 array(PDO::ATTR_PERSISTENT => true)
 );
      
return $conn;
   }
?>

