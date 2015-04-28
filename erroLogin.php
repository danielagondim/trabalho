<?php
setcookie("login", '', time()-42000); 
setcookie("loginAutomatico", '', time()-42000); 

include_once("cabecalho.php");

?>


    <div class="erro">

      <div>
        <h1>Não foi possível realizar o login.</h1>
		<p><a href="index.php">Tente novamente.</a></p>
        
	 </div>

	  
	  
    </div>

<?php
include_once("rodape.html");
?>