<?php require_once('confBD.php'); 
$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';

if (! empty($opcao)){	 
    
    switch ($opcao) 
    { 
        case 'estado': 
        { 
            echo getAllrEstado($valor);
            break;
            
        }
        
        case 'cidade': 
        { 
            echo getFilterCidade($valor); 
            break; 
        } 
    } 
} 


function getAllEstado(){ 
    $pdo = Conectar();
    $sql = 'SELECT idEstado, sigaEstado FROM estados'; 
    $stm = $pdo->prepare($sql); 
    $stm->execute(); 
    sleep(1); 
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC)); 
    $pdo = null;	
} 


function getFilterCidade($estado){ 
    $pdo = Conectar(); 
    $sql = 'SELECT idCidade, nomeCidade FROM cidades WHERE idEstado = ?'; 
    $stm = $pdo->prepare($sql); 
    $stm->bindValue(1, $estado); 
    $stm->execute(); sleep(1); 
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC)); 
    $pdo = null;	
} 
?>

