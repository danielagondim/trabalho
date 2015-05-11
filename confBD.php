
<?php
 function conn_mysql(){

   
$servidor = "us-cdbr-azure-northcentral-a.cleardb.com";
     
$porta = 3306;
   
$banco = "bancodadosdani";
   
$usuario = "beef55aa7ed688";
   
$senha = "a45c64a5";
      
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
