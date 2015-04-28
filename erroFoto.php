<?php
setcookie("login", '', time()-42000); 
setcookie("loginAutomatico", '', time()-42000); 

include_once("cabecalho.php");

?>


    <div class="erro">

      <div>
        <h1>Arquivo inválido!!!.</h1>
		<p><a href="CadastroUsuario.php">Voltar à Página de Cadastro.</a></p>
        
	 </div>

	  
	  
    </div>

<?php
include_once("rodape.html");
?>