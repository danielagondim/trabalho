<?php
require_once("confBD.php");




try
{
	
	//desvia para a mensagem de erro: 	// "previne" acesso direto à página
	$origem = basename($_SERVER['HTTP_REFERER']);
   	if((count($_POST)!=2)&&($origem!='alteraFoto.php')){
		header("Location:./erroAcesso.php");
		die();
	}
	//se existem os parâmetros...
	else{
        //Verifica se a foto foi anexada
        if (empty($_FILES["fileName"]["name"])){
            header("Location:./erroFoto1.php");
		    die();
        }
        else{
            $permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");  
            $temp = explode(".", basename($_FILES["fileName"]["name"]));
            $extensao = end($temp);
            
            if ((in_array($extensao, $permissoes))
                && (in_array($_FILES["fileName"]["type"], $permissoes))
                && ($_FILES["fileName"]["size"] < $_POST["MAX_FILE_SIZE"]) )
            {
                if ($_FILES["fileName"]["error"] > 0){
                    echo "<h1>Erro no envio, código: " . $_FILES["fileName"]["error"] . "</h1>";
                }
                else
                {
                    $dirUploads = "fotos/";
                    $nomeUsuario = $_POST["login"]."/";
                    
                    if(!file_exists ( $dirUploads ))
                        mkdir($dirUploads, 0500);  //permissao de leitura e execucao
                    
                    $caminhoUpload = $dirUploads.$nomeUsuario;
                    
                    if(!file_exists ( $caminhoUpload ))
                        mkdir($caminhoUpload, 0700);  //permissoes de escrita, leitura e execucao
                    
                    $pathCompleto = $caminhoUpload.basename($_FILES["fileName"]["name"]);
                    
                    move_uploaded_file($_FILES["fileName"]["tmp_name"], $pathCompleto);
                       
                }
            
            }
            else
            {
                 header("Location:./erroFoto1.php");
		          die();
            }
        
               
            //instancia objeto PDO, conectando-se ao mysql
            $conexao = conn_mysql();
            
            //pega a foto e o login
            $foto = $pathCompleto;
            $login = utf8_encode(htmlspecialchars($_POST['login']));   
            
            // cria instrução SQL parametrizada
            $SQL = 'UPDATE participantes set arquivoFoto = ? WHERE login = ?';
                        
                          
            //prepara a execução
            $operacao = $conexao->prepare($SQL);					  
            
            //executa a sentença SQL com os parâmetros passados por um vetor
            
            $update = $operacao->execute(array($foto, $login));
            
            // fecha a conexão ao banco
            $conexao = null;
            
            //verifica se o retorno da execução foi verdadeiro ou falso,
            //monstrando a mensagem de sucesso para o cliente
            if ($update){
                 header("Location:./fotoSucesso.php");
                 die();
            }
            else {
                echo "<h1>Erro na operação.</h1>\n";
                    $arr = $operacao->errorInfo();		//mensagem de erro retornada pelo SGBD
                    $erro = utf8_decode($arr[2]);
                    echo "<p>$erro</p>";							//deve ser melhor tratado em um caso real
                    echo "<p><a href=\"./Principal.php\">Retornar a Pagina Principal</a></p>\n";
                }
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
