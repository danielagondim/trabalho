<?php
require_once("./authSession.php");
require_once("confBD.php");
include_once("cabecalho.php");
?>

	  

   <div class="starter-template">
                    <h3 class="sub-header">Seja bem vindo(a)! - <?PHP echo utf8_decode($_SESSION['nomeCompleto']);?>
                    </h3>    
      </div>	

      	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
    $login = utf8_encode($_SESSION['nomeUsuario']);
				
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
                <img id = "imagem" src="<?php echo $resultados[0]['arquivoFoto']?>" alt="Daniela Gondim" />
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
                 <dt>
                     <dd>
                      <a  class="btn btn-primary" href="alteraUsuario.php?login=<?php echo $login ?>">Alterar Dados</a>  
                      <a  class="btn btn-primary" href="alteraFoto.php?login=<?php echo $login ?>">Alterar Foto</a> 
                         <a  class="btn btn-danger" href="excluiUsuario.php?login=<?php echo $login ?>">Excluir Participante</a> 
                    
                    </dd>
                </dt>
                
                
             </div>
<?php
$link_conexao = conn_mysql();

$sql = "select * from participantes";

$operacao = $link_conexao->prepare($sql);

$executar = $operacao->execute();

$resultado = $operacao->fetchAll();?>
<table>
                <ul>
                    

<?php foreach($resultado as $todos){?>
                    <li>
                        <a href="verParticipante.php?login=<?php echo utf8_decode($todos['login']) ?>" >
                            <figure>
                            <img src="<?php echo $todos['arquivoFoto'] ?>" />
                            <figcaption><?php echo $todos['nomeCompleto']?></figcaption>
                        </figure>    
                    </a>
                </li> 
    


<?php
}
?>
                    </ul>
    </table>

	
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
include_once("rodape.html");
?>