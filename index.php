<?php
include_once("cabecalho.php");
include('confBD.php');
if(isset($_COOKIE['loginAutomatico'])){
   header("Location: ./VerificarLogin.php");
}
else if(isset($_COOKIE['login']))
	$nomeUser = $_COOKIE['login'];
	else $nomeUser="";

?>

<table>
    <tr>
        <td  width='250px';>
                       <div class="starter-template">
                           <form class="form-signin" role="form" method="post" action="./verificarLogin.php">
                               <h3 class="form-signin-heading">Login</h3>
                               <input type="text" class="form-control" placeholder="Login" name="login" value="<?php echo $nomeUser?>"required                                          autofocus><br>
                               <input type="password" class="form-control" placeholder="Senha" name="senha" required><br>
                               <label>
                                   <input type="checkbox"  name="lembrarLogin" value="loginAutomatico"> Permanecer conectado
                               </label><br>
                               <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button><br>
                               <button class="btn btn-lg btn-success btn-block" type="button"                   onclick="javascript:window.location.href='./cadastroUsuario.php'">Cadastrar-se</button>
                           </form>
                        </div>
            </td>
        
        <td>
            <p id="apresentacao">
                Yerbook para cadastro dos alunos do curso de Especialização em Desenvolvimento de Aplicações Web da PUCMINAS.<br/>
                Para fazer parte deste Yerbook basta se cadastrar. Seja bem vindo!
            </p> 
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
                        <a href="verParticipante.php?login =<?php echo $todos['login'] ?>" >
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
            
        </td>
        </tr>
</table>
<?php
	include_once("rodape.html");
?>


                    <a href="danielagondim.html" >
                        
