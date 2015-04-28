<?php
include_once("cabecalho.php");
include 'confBD.php';
$login = $_GET['login'];
// instancia objeto PDO, conectando no mysql
$conexao = conn_mysql();
						
// instrução SQL básica (sem restrição de nome)
$SQLSelect = 'SELECT * FROM participantes WHERE login=?';
				
//prepara a execução da sentença
$operacao = $conexao->prepare($SQLSelect);					  
				
//executa a sentença SQL com o valor passado por parâmetro
$pesquisar = $operacao->execute(array($login));
		
//captura TODOS os resultados obtidos
$resultados = $operacao->fetchAll();

		
// fecha a conexão (os resultados já estão capturados)
$conexao = null;
 
?>


      <div>
        
        
		 <form role="form" method="post" action="./gravaUpdateUsuario.php" enctype = "multipart/form-data" role = "form">
		 <h3 class="form-signin">YEARBOOK<br>Altera Participante</h3>
			  <div class="form-group">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" value = "<?php echo $resultados[0]['nomeCompleto']?>" placeholder="Nome completo" required autofocus>
			  </div>
			  <input type="hidden" class="form-control" id="InputLogin" name="login" value = "<?php echo $resultados[0]['login']?>"  placeholder="Login desejado" required>
			  
			  <div class="form-group">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="passwd" value = "" placeholder="Senha (4 a 8 caracteres)">
			  </div>
			  <div class="form-group">
				<label for="InputSenhaConf">Confirmação de Senha:</label>
				<input type="password" class="form-control" id="InputSenhaConf" name="passwd2" placeholder="Confirme a senha">
			  </div>
            
       
        	
         <div class= "form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $resultados[0]['email']?>" placeholder="e-mail" required>
              </div>
             
             <div id="estado"> 
                  <label>Selecione novo Estado:</label> 
                  <select id="cmbEstado" name = "estado"> 
                      <option>Carregar Estados</option> 
                  </select> 
                  <input type="button" value="Carregar Estados" id="btnEstados" class="botao"/> 
             </div> 
           
            <div id="cidade">
                <label>Selecione nova Cidade:</label> 
                <select id="cmbCidade" name = "cidade"> 
                    <option>Carregar Cidades</option> 
                </select> 
          </div>
             <input type="hidden" class="form-control" id="InputLogin" name="cidade2" value = "<?php echo $resultados[0]['cidade']?>" >
              <div class= "form-group">
                  <label for="descricao">Descrição:</label>
                  <textarea id="descricao" name="descricao"><?php echo $resultados[0]['descricao']?></textarea>
              </div>
              </div>
          
              
        


			  <button type="submit" class="btn btn-primary">Alterar</button>
		 </form>

	 </div>


<?php
include_once("rodape.html");
?>