<?php
require_once("./authSession.php");
require_once("confBD.php");




try
{
	
$login = $_GET['login'];
            
               
//instancia objeto PDO, conectando-se ao mysql
$conexao = conn_mysql();
            
// cria instrução SQL parametrizada
$SQL = 'DELETE FROM participantes WHERE login = ?';
                          
//prepara a execução
$operacao = $conexao->prepare($SQL);					  
            
//executa a sentença SQL com os parâmetros passados por um vetor
            
$delete = $operacao->execute(array($login));
             
            
 // fecha a conexão ao banco
 $conexao = null;
            
//verifica se o retorno da execução foi verdadeiro ou falso,
//monstrando a mensagem de sucesso para o cliente
 if ($delete){
        header("Location:./excluirSucesso.php");
        die();
}
else {
    echo "<h1>Erro na operação.</h1>\n";
        $arr = $operacao->errorInfo();		//mensagem de erro retornada pelo SGBD
         $erro = utf8_decode($arr[2]);
        echo "<p>$erro</p>";							//deve ser melhor tratado em um caso real
        echo "<p><a href=\"./principal.php\">Principal</a></p>\n";
    }
 }



catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}



?>
