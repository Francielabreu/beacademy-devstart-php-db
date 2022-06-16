<h1>Editar produtos</h1>
<?php
extract($data);
?>
<form action="" method="post">

    <label for="name">Nome</label>
    <input value="<?php echo $product['name'];?>" type="text" name="name" id="name" class="form-control mb-3">

    <label for="description">Descrição</label>
    <textarea type="text" name="description" id="description" class="form-control mb-3"><?php echo $product['name'];?></textarea>

    <label for="photo">Imagem</label>
    <input value="<?php echo $product['photo'];?>"type="text" name="photo" id="photo" class="form-control mb-3">

    <label for="valor">Valor</label>
    <input value="<?php echo $product['valor'];?>"type="text" name="valor" id="valor" class="form-control mb-3">

    <label for="quantity">Quantidade</label>
    <input value="<?php echo $product['quantity'];?>" type="text" name="quantity" id="quantity" class="form-control mb-3">

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>