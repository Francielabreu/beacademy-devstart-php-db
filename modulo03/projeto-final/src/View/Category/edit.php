<h1>Editar categoria</h1>

<form action="" method="post">

    <label for="name">Nome</label>
    <input class="form-control mb-3" type="text" name="name" id="name" value="<?php echo $data['name']?>">

    <label for="description">Descrição</label>
    <textarea class="form-control mb-3" name="description" id="description"><?php echo $data['description']?></textarea>

    <button class="bt btn-primary mb-3" type="submit">Enviar</button>
</form>