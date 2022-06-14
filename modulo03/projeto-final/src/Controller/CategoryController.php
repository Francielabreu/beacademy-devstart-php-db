<?php

declare(strict_types=1);



namespace App\Controller;
use App\Connection\Connection;

class CategoryController extends AbstractController{



    public function listAction():void
    {
        //realizando conexão e selecionando para mostrar na view
        $con = Connection::getConnection(); 
        $result = $con->prepare('SELECT * FROM tb_category');
        $result->execute();      

        parent::render('Category/list', $result);
    }

    public function addAction():void
    {
        $con = Connection::getConnection(); 

        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $result = $con->prepare("INSERT INTO tb_category(name,description) VALUE('{$name}', '{$description}')");
            $result->execute();    

            echo 'Categoria Cadastrada com Sucesso!';
          
        }
        parent::render('Category/add');
    }
}