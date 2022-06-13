<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<h1>Listar categoria</h1>


<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
        </tr>
    </thead>
    <Tbody>
        <?php 
        while ($category = $data->fetch(\PDO::FETCH_ASSOC)) {
            echo '<tr>';
                echo '<td>'.$category['id'].'</td>';
                echo '<td>'.$category['name'].'</td>';
                echo '<td>'.$category['description'].'</td>';
            echo '</tr>';
        }
        ?>
    </Tbody>
</table>