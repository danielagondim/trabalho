
<?php
require_once("./authSession.php");
include_once("cabecalho.php");
include 'confBD.php';

$login = $_GET['login'];
?>



      <div>
        
        
		 <form method="post" action="./gravaNovaFoto.php" enctype = "multipart/form-data" role = "form">
		 <h3 class="form-signin">Alterar Foto</h3>
			  <input type="hidden" name="login" value="<?php echo $login ?>" > 
              <input type="hidden" name="MAX_FILE_SIZE" value="500000" >
             <div class= "form-group">
                 <label for="fileName">Foto:</label>
                <input type="file" name="fileName" id="fileName"></imput>
               
             </div>
              
             
			  <button type="submit" class="btn btn-primary">Alterar</button>
		 </form>

	 </div>


<?php
include_once("rodape.html");
?>