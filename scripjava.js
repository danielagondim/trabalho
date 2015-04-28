<script type="text/javascript"> 
    $(document).ready(function(){ 
        <!-- Carrega os Estados --> 
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
                
            
        <!--Carrega as Cidades-->
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
                
//           <!-- Resetar Selects --> function Reset(){ 
//                $('#cmbEstado').empty().append('<option>Carregar Países</option>>'); 
//               $('#cmbCidade').empty().append('<option>Carregar Cidades</option>'); 
//           }
            
            
            })  ;  
</script>
            