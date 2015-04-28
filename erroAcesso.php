<?php
setcookie("login", '', time()-42000); 
setcookie("loginAutomatico", '', time()-42000); 

include_once("cabecalho.php");

?>

    <div class="erro">

      <div>
        <h1>Erro de acesso. Você não esta logado!</h1>
		<p><a href="index.php">Fazer login.</a></p>
        
	 </div>

	  
	  
    </div>


<?php
include_once("rodape.html");
?>