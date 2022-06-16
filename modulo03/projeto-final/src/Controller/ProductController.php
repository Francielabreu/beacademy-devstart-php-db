<?php

declare(strict_types=1);

namespace App\Controller;
use App\Connection\Connection;
use LDAP\Result;

class ProductController extends AbstractController{

    public function listAction():void
    {
        $con = Connection::getConnection(); 
        $result =$con->prepare("SELECT * FROM tb_product");
        $result->execute();

        parent::render('Product/list',$result);
    }



    public function addAction():void
    {
        parent::render('Product/add');
    }



    public function editAction():void
    {
        parent::render('Product/edit');
    }
}