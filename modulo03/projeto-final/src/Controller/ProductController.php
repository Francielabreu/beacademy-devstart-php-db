<?php

declare(strict_types=1);

namespace App\Controller;


class ProductController extends AbstractController{

    public function listAction():void
    {
        parent::render('Product/Listar');
    }
    public function addAction():void
    {
        parent::render('Product/Adicionar');
    }
    public function editAction():void
    {
        parent::render('Product/Editar');
    }
}