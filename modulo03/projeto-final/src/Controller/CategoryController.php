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

    public function removeAction():void
    {
        $con = Connection::getConnection(); 

        $id= $_GET['id'];
        $result = $con->prepare("DELETE FROM tb_category WHERE id='{$id}'");
        $result->execute();
        echo 'Categoria Excluida com Sucesso!';
    }

    public function updateAction():void
    {
        $id= $_GET['id'];
        $con = Connection::getConnection(); 

        if ($_POST) {
            $newname = $_POST['name'];
            $newdescription = $_POST['description'];

            $result = $con->prepare("UPDATE tb_category SET name = '{$newname}', description='{$newdescription}' WHERE id='{$id}'");
            $result->execute();   
            echo 'Categoria Atualizada com Sucesso!';   

        }

        $result = $con->prepare("SELECT * FROM tb_category WHERE id='{$id}'");
        $result->execute();      
       


        //pegamos a informação que irar um array associativo
        $data= $result->fetch(\PDO::FETCH_ASSOC);
        parent::render('Category/edit',$data);
    }
}