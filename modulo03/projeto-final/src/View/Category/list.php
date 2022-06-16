<h1>Listar categoria</h1>

<div>
    <a href="/categorias/nova" class="btn btn-primary btn-sm mb-3">Nova Categoria</a>
</div>
<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>Ações</th>
        </tr>
    </thead>
    <Tbody>
        <?php 
        while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
            extract($category);

            echo '<tr>';
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
               
                echo "<td>
                    <a href='/categorias/editar?id={$id}'class='btn btn-primary btn-sm'>Editar</a>
                    <a href='/categorias/excluir?id={$id}'class='btn btn-danger btn-sm'>Excluir</a>
                </td>";
                

            echo '</tr>';
        }
        ?>
    </Tbody>
</table>