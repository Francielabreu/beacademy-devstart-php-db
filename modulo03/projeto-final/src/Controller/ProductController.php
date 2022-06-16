<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use Dompdf\Dompdf;


class ProductController extends AbstractController
{

    public function listAction(): void
    {
        $con = Connection::getConnection();
        $result = $con->prepare("SELECT * FROM tb_product");
        $result->execute();

        parent::render('Product/list', $result);
    }



    public function addAction(): void
    {
        $con = Connection::getConnection();

        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $photo = $_POST['photo'];
            $valor = $_POST['valor'];
            $quantity = $_POST['quantity'];
            $category_id = $_POST['category'];
            $created_at = date('Y-m-d H:i:s');

            $query = $con->prepare("INSERT INTO tb_product (name,description,photo,valor,quantity,category_id,created_at) 
            VALUES
            ('{$name}','{$description}','{$photo}','{$valor}','{$quantity}','{$category_id}','{$created_at}')");

            $query->execute();

            parent::renderMessage('Produto Cadastrado com sucesso');
        }
        $result = $con->prepare("SELECT * FROM tb_category");
        $result->execute();
        parent::render('Product/add', $result);
    }



    public function editAction(): void
    {
        $con = Connection::getConnection();



        $id = $_GET['id'];
        $product = $con->prepare("SELECT * FROM tb_product WHERE id='{$id}'");
        $product->execute();

        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $photo = $_POST['photo'];
            $valor = $_POST['valor'];
            $quantity = $_POST['quantity'];

            $query = "
                UPDATE tb_product SET
                    name='$name',
                    description='$description',
                    photo='$photo',
                    valor='$valor',
                    quantity='$quantity'
                WHERE id='{$id}'


                ";
            $resultUpdate = $con->prepare($query);
            $resultUpdate->execute();
            parent::renderMessage('Produto Atualizado com sucesso');
        }

        parent::render('Product/edit', [
            'product' => $product->fetch(\PDO::FETCH_ASSOC),
        ]);
    }



    public function removeAction(): void
    {
        $id = $_GET['id'];
        $con = Connection::getConnection();
        $result = $con->prepare("DELETE FROM tb_product WHERE id='{$id}'");
        $result->execute();


        parent::renderMessage('Produto Excluido com sucesso');
    }


    public function reportAction(): void
    {
        $con = Connection::getConnection();

        $result = $con->prepare('SELECT prod.id,prod.name,prod.quantity,cat.name as category FROM tb_product prod INNER JOIN tb_category cat ON prod.category_id=cat.id');
        $result->execute();

        $content = '';
        while ($product = $result->fetch(\PDO::FETCH_ASSOC)) {
            extract($product);
            $content .= "
                <tr>{$id}</tr>
                <tr>{$name}</tr>
                <tr>{$quantity}</tr>
            ";
        }

        $html = "
            <h1>Relatorio de Produto no Estoque</h1>
                <table border='1' width='100%'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>QUANTIDADE</th>
                        </tr>
                    </thead>
                     <tbody>
                        {$content}
                    </tbody>
                 </table>
            ";





        //$pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->render();
        $pdf->stream();
    }
}
