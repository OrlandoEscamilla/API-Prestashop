<html><head><title>CONSULTA DE PRODUCTOS</title></head><body>

<?php
// Here we define constants /!\ You need to replace this parameters
require_once('conexion.php');

try{
    $webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
    $products['resource'] = 'products';

    if(isset($_GET['id']))
       $products['id'] = (int)$_GET['id'];

    $xml = $webService->get($products);

    $resources = $xml->children()->children();
}
catch(Exception $ex){
    echo "Se ha producido un error: {$ex->getMessage()}";
}


echo '<table>';

//Si tenemos los recursos los cargamos, si no pues sacamos un erros


if(isset($resources)){ 

    if(!isset($_GET['id'])){
      echo '<tr>
                <th>ID</th>
                <th>ver mas</th>
            </tr>';

            foreach($resources as $resource){
                echo '<tr>
                          <td>'.$resource->attributes().'</td>
                          <td><a href="?id='.$resource->attributes().'">mas informacion</a></td>
                     </tr>';
            }

        }

            else{
                foreach($resources as $key => $resource){
                    echo '<tr>';
                    echo '<th>'.$key.'</th><td>'.$resource.'</td>';
                    echo '</tr>';
                }
            }
        }


echo '</table>';

?>