<?php
include_once("cabecalho.php");
include 'confBD.php';
echo '<div id="lista">';
echo '<div class="row">';
echo '<div class="col-md-9">';


try
{


	    // instancia objeto PDO, conectando no mysql
		$conexao = conn_mysql();
		
		//captura valores do vetor POST
		//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
		$nomeBusca = utf8_encode(htmlspecialchars($_POST['nomeParticipante']));
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM participantes ';

//		se existe um nome para busca... 
		if(strlen($nomeBusca)>0){
		    $nomeBusca = '%'.$nomeBusca.'%';		
			$SQLSelect = $SQLSelect.'WHERE nomeCompleto like ?';	//anexa a restrição à sentença SQL
		}
//		
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  
				
		//executa a sentença SQL com o valor passado por parâmetro
		$pesquisar = $operacao->execute(array($nomeBusca));
		
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		if (count($resultados)>0){		
			echo '<table class="table">';	
			echo '<thead><tr><th colspan="3">Lista de Participantes</th></tr></thead>';
			echo '<thead><tr><th>Foto</th><th>Nome Completo</th><th>Login</th></tr></thead>';
			echo '<tbody>';
			foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
			
				//em cada 'linha' do vetor de resultados existem elementos com os mesmos nomes dos campos recuperados do SGBD
				echo "\n<tr><td><a href='verParticipante.php?login=".utf8_decode($contatosEncontrados['login'])."'><img height = '80px'  width='80px'src='".$contatosEncontrados['arquivoFoto']."'></a></td>";
				echo "<td><a href='verParticipante.php?login=".utf8_decode($contatosEncontrados['login'])."'>".utf8_decode($contatosEncontrados['nomeCompleto'])."</a></td>";
				echo "<td>".utf8_decode($contatosEncontrados['login'])."</td></tr>";		
			}
			echo '</table>';
		}
		else{
			echo"\n<h1>Não foram encontrados contatos com os dados fornecidos</h1>";
		}
		
		echo "\n<a class='btn btn-primary' href=\"./pesquisaParticipante.php\" >Realizar nova busca</a>\n";
		//echo"\n<hr>";	
	   die(); 

    
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, a exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}
echo'</div>';
echo'</div>';
echo'</div>';

include_once("rodape.php");
