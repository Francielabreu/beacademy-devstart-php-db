<?php

declare(strict_types=1);

namespace App\Controller;
use App\Connection\Connection;


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
        $con = Connection::getConnection(); 

        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $photo = $_POST['photo'];
            $valor = $_POST['valor'];
            $quantity = $_POST['quantity'];
            $category_id = $_POST['category'];
            $created_at= date('Y-m-d H:i:s');

            $query = $con->prepare("INSERT INTO tb_product (name,description,photo,valor,quantity,category_id,created_at) 
            VALUES
            ('{$name}','{$description}','{$photo}','{$valor}','{$quantity}','{$category_id}','{$created_at}')");

            $query->execute();

            echo "Produto cadastrado com sucesso";
        }
        $result = $con->prepare("SELECT * FROM tb_category");
        $result->execute();
        parent::render('Product/add',$result);
    }



    public function editAction():void
    {
        parent::render('Product/edit');
    }



    public function removeAction():void
    {
        $id = $_GET['id'];
        $con = Connection::getConnection();
        $result =$con->prepare("DELETE FROM tb_product WHERE id='{$id}'");
        $result->execute();

        $message = "Produto Excluido com sucesso";
        include dirname(__DIR__).'/View/_partials/message.php';
    }
}