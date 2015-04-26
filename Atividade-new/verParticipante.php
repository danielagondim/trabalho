<?php
require_once("confBD.php");
include_once("cabecalho.php");
?>

	  
  	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
    $login = utf8_encode($_GET['login']);
				
	// instrução SQL básica (sem restrição de nome)
	$SQLSelect = 'SELECT p.*, e.nomeEstado, c.nomeCidade FROM participantes as p left join cidades c on (c.idCidade = p.cidade) left join estados e on (e.idEstado = c.idEstado) WHERE login = ?';
	
    //prepara a execução da sentença
	$operacao = $conexao->prepare($SQLSelect);					  
	$pesquisar = $operacao->execute(array($login));
	//captura TODOS os resultados obtidos
	$resultados = $operacao->fetchAll();
	// fecha a conexão (os resultados já estão capturados)
	$conexao = null;
    
    ?>
   
      <div id="dados">
            <div class="row">
                <div class="col-md-4">
                    <img id = "imagem" src="<?php echo $resultados[0]['arquivoFoto']?>" alt="Daniela Gondim" />
                </div>
                <div class="col-md-8">
                    <dl class="dados_pessoais">
                        <dt>Dados Pessoais<dt><dd></dd>
                        <dt>Nome:</dt>
                        <dd><?php echo $resultados[0]['nomeCompleto']?></dd>
                        <dt>Cidade:</dt>
                        <dd><?php echo $resultados[0]['nomeCidade']?></dd>
                         <dt>Estado:</dt>
                        <dd><?php echo $resultados[0]['nomeEstado']?></dd>
                        <dt>E-mail:</dt>
                        <dd><?php echo $resultados[0]['email']?></dd>
                        <dt>Descrição:</dt>
                        <dd><?php echo $resultados[0]['descricao']?></dd>
                     </dl>
                    <a class="btn btn-primary" href='pesquisaParticipante.php'>Voltar</a>
                 </div>
            </div>
           

</div>

	
<?php
        } //try
	catch (PDOException $e)
	{
		// caso ocorra uma exceção, exibe na tela
		echo "Erro!: " . $e->getMessage() . "<br>";
		die();
	}
	  
  ?>

<?php
include_once("rodape.php");
?>