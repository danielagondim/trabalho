<?php
include_once("cabecalho.php");
include('confBD.php');

?>
<div class="row">
    <div class="col-md-3">        
        <p id="apresentacao">
            Yerbook dos alunos do curso de Especialização em Desenvolvimento de Aplicações Web da PUCMINAS.<br/>
                Seja bem vindo!
        </p> 
    </div>
    <div class="col-md-9">
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
        </div>
    </div>
            
 


<?php
	include_once("rodape.php");
?>


                 
                        
