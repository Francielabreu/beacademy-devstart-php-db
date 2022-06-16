<h1>Listar produtos</h1>

<div>
    <a href="/produtos/novo" class="btn btn-primary btn-sm mb-3">Novo Produto</a>
</div>

<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>IMAGEM</th>
            <th>VALOR</th>
            <th>QUANTIDADE</th>
            <th>DATA DE CADASTRO</th>
            <th>Ações</th>
        </tr>
    </thead>
    <Tbody>
        <?php
        while ($product = $data->fetch(\PDO::FETCH_ASSOC)) {
            extract($product);

            echo "
                <tr>
                    <td>{$id}</td>
                    <td>{$name}</td>
                    <td>{$description}</td>
                    <td> <img width='60px' height='45px' src='{$photo}'> </td>
                    <td>{$valor}</td>
                    <td>{$quantity}</td>
                    <td>{$created_at}</td>


                    <td>
                        <a href='/produtos/editar?id={$id}'class='btn btn-primary btn-sm'>Editar</a>
                        <a href='/produtos/excluir?id={$id}'class='btn btn-danger btn-sm'>Excluir</a>
                    </td>
                </tr>
               
            ";
        }
        ?>
    </Tbody>
</table>