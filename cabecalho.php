<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            POS GRADUACAO - DANIELA
        </title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width">
        <script src="js/bootstrap.js"type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" /> 
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="jquery-1.11.1.js"></script>
      
       <script type="text/javascript"> 
    $(document).ready(function(){ 
        
            $(document).ready(function(e){
               
                $('#btnEstados').hide();
                $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>'); 
                 
                $.getJSON('consulta.php?opcao=estado', 
                          function (dados){ if (dados.length > 0){ 
                              var option = '<option>Selecione o Estado</option>'; 
                              $.each(dados, function(i, obj){ 
                                  option += '<option value="'+obj.idEstado+'">'+obj.sigaEstado+'</option>';
                              }) 
                              $('#mensagem').html('<span class="mensagem">Total de estados encontrados.: '+dados.length+'</span>');
                              $('#cmbEstado').html(option).show();
                          }else{
                              Reset(); 
                              $('#mensagem').html('<span class="mensagem">Não foram encontrados estados!</span>');
                          }
                 })
              
                    
            })      
                
            
       
          $('#cmbEstado').change(function(e){ 
              
                 var estado = $('#cmbEstado').val(); 
             
                 $('#mensagem').html('<span class="mensagem">Aguarde, carregando ...</span>');
                 $.getJSON('consulta.php?opcao=cidade&valor='+estado, function (dados){ 
                     if (dados.length > 0){
                         var option = '<option>Selecione a Cidade</option>'; 
                        $.each(dados, function(i, obj){ option += '<option value="'+obj.idCidade+'">'+obj.nomeCidade+'</option>';
                                                       }) 
                         $('#mensagem').html('<span class="mensagem">Total de cidades encontradas.: '+dados.length+'</span>');
                     }else{
                         Reset(); 
                         $('#mensagem').html('<span class="mensagem">Não foram encontradas cidades para esse estado!</span>');
                     } $('#cmbCidade').html(option).show(); 
                 })
         })
                
//          function Reset(){ 
//                $('#cmbEstado').empty().append('<option>Carregar Países</option>>'); 
//               $('#cmbCidade').empty().append('<option>Carregar Cidades</option>'); 
//           }
            
            
            })  ;      
            
    
                               

</script> 
    

    </head>
    <body>
        <header>
            <p>
                <img src="fotos/logo_puc_minas_virtual.jpg" alt="logo" class= "logo"/>
                Pós-Graduação - Desenvolvimento de Aplicações Web na Nuvem - DANIELA GONDIM		
            </p>
            <h1>
                YEARBOOK
            </h1>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bar1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">Site</a>
            </div>
           <nav class = "navbar navbar-default" role= "navigator" >
               <div class="collapse navbar-collapse" id = "bar1">
                   <ul class="nav navbar-nav">
                       <li class="active"><a href="principal.php">Dados Pessoais</a></li>
                       <li><a href="./cadastroUsuario.php">Cadastrar Participante</a></li>
                       <li><a href="./pesquisaParticipante.php">Busca Participantes</a></li>
			           <li><a href="./logout.php">Logout</a></li>
                  </ul>
               </div><!--/.nav-collapse -->
           </nav>    
        </header>
  
        
     
        
        <main>
            <div class="container">
                <div class="principal">
