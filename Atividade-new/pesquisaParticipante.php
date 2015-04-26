<?php
include_once("cabecalho.php");
?>

    <div class="row">
        <div class="col-md-12"> 
            <h1>Yearbook - Buscar Alunos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="formularioBusca" role="form" method="post" action="./listaParticipantes.php">
                 <div class="form-group">
                    <label for="InputNome">Nome:</label>
                    <input type="text" class="form-control" id="InputNome" name="nomeParticipante" placeholder="Nome" autofocus>
                    <p class="lead">Deixe em branco para mostrar todos os contatos.</p>
                </div> 
                    <button type="submit" class="btn btn-primary">Pesquisar</button>                  
            </form>
        </div>
    </div>

<?php
include_once("rodape.php");
?>