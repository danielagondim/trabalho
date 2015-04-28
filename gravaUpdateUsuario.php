<?php
require_once("confBD.php");




try
{
	// se não foram passados 4 parâmetros na requisição e não vier da página de cadastro e se a foto não for selecionada
	//desvia para a mensagem de erro: 	// "previne" acesso direto à página
	$origem = basename($_SERVER['HTTP_REFERER']);
   	if((count($_POST)<9)&&($origem!='alteraUsuario.php')){
		header("Location:./erroAcesso.php");
		die();
	}
	//se existem os parâmetros...
	else{
            
               
            //instancia objeto PDO, conectando-se ao mysql
            $conexao = conn_mysql();
            
            //captura valores do vetor POST
            //utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
            $nome = utf8_encode(htmlspecialchars($_POST['nomeCompleto']));
            $login = utf8_encode(htmlspecialchars($_POST['login']));
            $senha = utf8_encode(htmlspecialchars($_POST['passwd']));
            $senhaConf = utf8_encode(htmlspecialchars($_POST['passwd2']));
            $email = utf8_encode(htmlspecialchars($_POST['email']));
            $descricao = utf8_encode(htmlspecialchars($_POST['descricao']));
            $cidade2 = utf8_encode(htmlspecialchars($_POST['cidade2'])); //Cidade antiga
            $cidade = utf8_encode(htmlspecialchars($_POST['cidade']));
            echo $cidade;
            echo 'meio';
            echo $cidade2;
            
            if ($cidade == 'CARREGAR Cidades'){
                $cidade = $cidade2;
            }
                
            echo $cidade;
            if(($senha!=$senhaConf)||(strlen($senha)<4)||(strlen($senha)>8)){
            header("Location:./erroUpdate.php");
            die();
            }
            
            // cria instrução SQL parametrizada
            $SQL = 'UPDATE participantes SET nomeCompleto = ?, senha= MD5(?) , email = ?, descricao = ?, cidade = ? WHERE login = ?';
                          
            //prepara a execução
            $operacao = $conexao->prepare($SQL);					  
            
            //executa a sentença SQL com os parâmetros passados por um vetor
            
            $update = $operacao->execute(array($nome, $senha, $email, $descricao, $cidade, $login));
             
            
            // fecha a conexão ao banco
            $conexao = null;
            
            //verifica se o retorno da execução foi verdadeiro ou falso,
            //monstrando a mensagem de sucesso para o cliente
            if ($update){
                 header("Location:./gravaUpdateSucesso.php");
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
        }


catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}



?>
