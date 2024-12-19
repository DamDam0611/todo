<?php

class ProjetsController
{
     public function index()
    {
        $projets = Projet::all();
        $tasks= Task::all();
        include __DIR__ . '/../views/tasks/index.php';
    }
 
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Projet::create($_POST['title']);
            header('Location: /');
            exit;
        }
 
        include __DIR__ . '/../views/tasks/createProjet.php';
 }
 
    
     public function delete($id)
    {
       Projet::delete($id);
       Task::delete($id);
       header('Location: /');
        exit;
    }

    public function projetview()
    {
        include __DIR__ . '/../views/tasks/projetview.php';
    }
}