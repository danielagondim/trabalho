<?php
 function conn_mysql(){

   $servidor = '//${env.OPENSHIFT_MYSQL_DB_HOST}:${env.OPENSHIFT_MYSQL_DB_PORT}';
   $porta = 3306;
   $banco = "danielagondim";
   $usuario = "adminsPbyDMf";
   $senha = "utbCC8MTb-kW";
   
      $conn = new PDO("mysql:host=$servidor;
	                   port=$porta;
					   dbname=$banco", 
					   $usuario, 
					   $senha,
					   array(PDO::ATTR_PERSISTENT => true)
					   );
      return $conn;
   }
?>
