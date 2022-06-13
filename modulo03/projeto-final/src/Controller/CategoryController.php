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
}