<?php

declare(strict_types=1);



namespace App\Controller;

class CategoryController extends AbstractController{

    public function listCategory():void
    {
        parent::render('Category/Listar');
    }
    public function addCategory():void
    {
       parent::render('Category/Adicionar');
    }
    public function editCategory():void
    {
       parent::render('Category/Editar');
    }
}