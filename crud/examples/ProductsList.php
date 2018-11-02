<html><head><title>CONSULTA DE PRODUCTOS</title></head><body>

<?php
// Here we define constants /!\ You need to replace this parameters
require_once('conexion.php');

try{
    $webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
    $products['resource'] = 'products';

    $xml = $webService->get($products);

    $resources = $xml->products->children();
}
catch(Exception $ex){
    echo "Se ha producido un error: {$ex->getMessage()}";
}



if(isset($resources)){
    echo '<table>
            <tr>
                <th>ID</th>
                <th>ver mas</th>
            </tr>';

            foreach($resources as $resource){
                echo '<tr>
                          <td>'.$resource->attributes().'</td>
                          <td>mas informacion</td>
                     </tr>';
            }
}
echo '</table>';

?>