<?php
require 'vendor/autoload.php';
require 'database/ConnectionFactory.php';
require 'cadastros/CadastroService.php';

$app = new \Slim\Slim();

// http://hostname/api/
$app->get('/', function() use ( $app ) {
    echo "Welcome to Your Pizza";
});

/*
HTTP GET http://domain/api/tasks
RESPONSE 200 OK
[
  {
    "id": 1,
    "description": "Learn REST",
    "done": false
  },
  {
    "id": 2,
    "description": "Learn JavaScript",
    "done": false
  },
  {
    "id": 3,
    "description": "Learn English",
    "done": false
  }
]
*/
$app->get('/cadastros/', function() use ( $app ) {
    $cadastros = CadastroService::listarCadastros();
    $app->response()->header('Content-Type', 'application/json');
    echo json_encode($cadastros);
});

/*
HTTP GET http://domain/api/tasks/1
RESPONSE 200 OK
{
  "id": 1,
  "description": "Learn REST",
  "done": false
}

RESPONSE 204 NO CONTENT
*/
$app->get('/cadastros/:id', function($id) use ( $app ) {
    $cadastros = CadastroService::getById($id);
    
    if($cadastro) {
        $app->response()->header('Content-Type', 'application/json');
        echo json_encode($cadastro);
    }
    else {
        $app->response()->setStatus(204);
    }
});

/*
HTTP POST http://domain/api/tasks
REQUEST Body
{
  "description": "Learn REST",
}

RESPONSE 200 OK Body
Learn REST added
*/
$app->post('/cadastros/', function() use ( $app ) {
    $cadastroJson = $app->request()->getBody();
    $novoCadastro = json_decode($cadastroJson, true);
    if($novoCadastro) {
        $cadastro = CadastroService::add($novoCadastro);
        echo "Cadastro {$cadastros['name']} added";
    }
    else {
        $app->response->setStatus(400);
        echo "Malformat JSON";
    }
});

/*
HTTP PUT http://domain/api/tasks/1
REQUEST Body
{
  "id": 1,
  "description": "Learn REST",
  "done": false
}

RESPONSE 200 OK
{
  "id": 1,
  "description": "Learn REST",
  "done": false
}
*/
$app->put('/cadastros/', function() use ( $app ) {
    $cadastroJson = $app->request()->getBody();
    $atualizarCadastro = json_decode($cadastroJson, true);
    
    if($atualizarCadastro && $atualizarCadastro['id']) {
        if(CadastroService::update($atualizarCadastro)) {
          echo "Cadastro {$atualizarCadastro['name']} atualizado";  
        }
        else {
          $app->response->setStatus('404');
          echo "Cadastro não encontrado";
        }
    }
    else {
        $app->response->setStatus(400);
        echo "Malformat JSON";
    }
});

/*
HTTP DELETE http://domain/api/tasks/1
RESPONSE 200 OK
Task with id = 1 was deleted
RESPONSE 404
Task with id = 1 not found
*/
$app->delete('/cadastros/:id', function($id) use ( $app ) {
    if(CadastroService::delete($id)) {
      echo "Cadastro with id = $id was deleted";
    }
    else {
      $app->response->setStatus('404');
      echo "Cadastro with id = $id not found";
    }
});

$app->run();
?>