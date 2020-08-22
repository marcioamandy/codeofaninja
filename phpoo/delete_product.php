<?php
try
{
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/product.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $product = new Product($db);
    // check if value was posted
    if($_POST)
    {
        // set product id to be deleted
        $product->id = $_POST['object_id'];
        
        // delete the product
        if($product->delete()){
            echo "Objeto foi deletado.";
        }
        // if unable to delete the product
        else{
            echo "Objeto não deletado.";
        }
    }

    if ($_GET['s']== 'all')
    {
        empty($_POST['chkexcluir']) ? $excluir = '' : $excluir = $_POST['chkexcluir'];
        if(!empty($excluir)){ //check if user ticked any checkbox
            foreach($excluir as $keys => $values){
                $product->id = $values;
                $product->delete();
            }
            echo "Objetos foram deletados.";
        }
    }
} catch (Exception $e) {
    echo 'Error : ',  $e->getMessage(), "\n";
}
?>