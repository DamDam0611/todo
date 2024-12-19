<?php

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/models/Task.php';
require_once __DIR__ . '/../app/controllers/TaskController.php';
require_once __DIR__ . '/../app/models/Projet.php';
require_once __DIR__ . '/../app/controllers/ProjetsController.php';

$router = new Router();
$router->add('/', [new TaskController, 'index']);
$router->add('/create', [new TaskController, 'create']);
$router->add('/complete', function () {
    $id = $_POST['id'] ?? null;
    (new TaskController)->markAsCompleted($id);
});
$router->add('/delete', function () {
     $id = $_POST['id'] ?? null;
     (new TaskController)->delete($id);
});

$router->add('/index', [new ProjetsController, 'index']);
$router->add('/createProjet', [new ProjetsController, 'create']);
$router->add('/delete', function () {
     $id = $_POST['id'] ?? null;
     (new ProjetsController)->delete($id);
});

$router->add('/projetView', [new ProjetsController, 'projetView']);

$router->dispatch();
