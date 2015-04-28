<?php
require_once("./authSession.php");
include_once("cabecalho.php");
?>

    <div class="container">

      <div>
        <h1>Yearbook - Buscar Participante</h1>
        
		 <form role="form" method="post" action="./listaParticipantes.php">
			  <div class="form-group">
				<label for="InputNome">Nome:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeParticipante" placeholder="Nome" autofocus>
				<p class="lead">Deixe em branco para mostrar todos os contatos.</p>
			  </div>
			  		  
			  
			  <button type="submit" class="btn btn-primary">Pesquisar</button>
		 </form>

	 </div>

    </div><!-- /.container -->

<?php
include_once("rodape.html");
?>