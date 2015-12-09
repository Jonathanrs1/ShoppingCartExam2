<?php
require 'vendor/autoload.php';
require 'database/ConDB.class.php';
require 'shopping/ShoppingService.php';

$app = new \Slim\Slim();


$app->get('/shopping/', function() use ($app)
{
    $itens = ShoppingService::listItens();
    $app->response()->header('Content-Type', 'application/json');
    echo json_encode($itens);
});



$app->post('/shopping/', function() use ($app)
{
    $itemJson = $app->request()->getBody();
    $newItem = json_decode($itemJson, true);
    
    if($newItem) 
    {
        $app->response()->header('Content-Type','application/json');
        $item = ShoppingService::add($newItem);
        $result = array('description'=>'Testando','qty'=>'10','price'=>'2','id'=>$item['id']);
        
        echo json_encode($result);
    }
    else 
    {
        $app->response->setStatus(400);
        echo "Não é possivel salvar";
    }
});




$app->delete('/itens/:id', function($id) use ($app)
{
    $app->response()->header('Content-Type','application/json');
    $result;
    
    if(ShoppingService::delete($id)) 
    {
      $result = array('status'=>'true','message'=>' deleted!');
    }
    else
    {
      $app->response->setStatus('404');
      $result = array('status'=>'false','message'=>'item with ' .$id .' does not exit');
    }
    
    echo json_encode($result);
});


$app->run();
?>