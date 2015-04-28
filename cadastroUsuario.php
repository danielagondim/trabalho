<?php
include_once("cabecalho.php");
include 'confBD.php';


?>



      <div>
        
        
		 <form method="post" action="./cadastroNovoUsuario.php" enctype = "multipart/form-data" role = "form">
		 <h3 class="form-signin">Cadastro de Participante</h3>
			  <div class="form-group">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" placeholder="Nome completo" required autofocus>
			  </div>
			  <div class="form-group">
			  <label for="InputLogin">Login:</label>
				<input type="text" class="form-control" id="InputLogin" name="login" placeholder="Login desejado" required>
			  </div>
			  <div class="form-group">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="passwd" placeholder="Senha (4 a 8 caracteres)">
			  </div>
			  <div class="form-group">
				<label for="InputSenhaConf">Confirmação de Senha:</label>
				<input type="password" class="form-control" id="InputSenhaConf" name="passwd2" placeholder="Confirme a senha">
			  </div>
             <div class= "form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="e-mail" required>
              </div>
            <div id="estado"> 
                  <label>Estado:</label> 
                  <select id="cmbEstado" name = "estado"> 
                      <option>Carregar Estados</option> 
                  </select> 
                  <input type="button" value="Carregar Estados" id="btnEstados" class="botao"/> 
             </div> 
           
            <div id="cidade">
                <label>Cidade:</label> 
                <select id="cmbCidade" name = "cidade"> 
                    <option>Carregar Cidades</option> 
                </select> 
          </div>
          <div id="mensagem">
        	
        </div>
              <input type="hidden" name="MAX_FILE_SIZE" value="500000" >
             <div class= "form-group">
                 <label for="fileName">Foto:</label>
                <input type="file" name="fileName" id="fileName"></imput>
               
             </div>
              
              <div class= "form-group">
                  <label for="descricao">Descrição:</label>
                  <textarea class="form-control" name="descricao"></textarea>
              </div>
          
              
        


			  <button type="submit" class="btn btn-primary">Cadastrar</button>
		 </form>

	 </div>


<?php
include_once("rodape.html");
?>