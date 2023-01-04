<?php
require_once '../templates/cabecalho.php';

try {
    $lista = Produto::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<div>
    <table>
        <caption>Tabela de Produtos</caption>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Fabricante</th>
            <th>Estoque</th>
            <th colspan="2"><a href="adicionar_produto.php"><span class="material-symbols-outlined">add</span></a><th>
        </tr>
        <?php foreach($lista as $produto): ?>
        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= $produto['fabricante'] ?></td>
            <td><?= $produto['estoque'] ?></td>
            <td><a href="editar_produto.php?id_produto=<?= $produto['id_produto'] ?>"><span class="material-symbols-outlined">edit</span></a></td>
            <td><a href="../controllers/deletar_produto_controller.php?id_produto=<?= $produto['id_produto'] ?>"><span class="material-symbols-outlined">delete</span></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php
require_once '../templates/rodape.php';
?>