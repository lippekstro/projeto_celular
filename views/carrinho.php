<?php
require_once '../templates/cabecalho.php';
?>


<div class="container-carrinho">
    <div class="container-tabela">
        <table>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
            <tr>
                <td><img src="item1.jpg" alt="Item 1"></td>
                <td>Item 1</td>
                <td>
                    <form>
                        <input type="number" value="1">
                        <button type="submit">Atualizar</button>
                    </form>
                </td>
                <td>R$ 10,00</td>
            </tr>
            <tr>
                <td><img src="item2.jpg" alt="Item 2"></td>
                <td>Item 2</td>
                <td>
                    <form>
                        <input type="number" value="1">
                        <button type="submit">Atualizar</button>
                    </form>
                </td>
                <td>R$ 20,00</td>
            </tr>
        </table>
    </div>

    <div class="container-total">
        <p>CEP: 65000-000</p>
        <p>Frete: 0 R$</p>
        <p>TOTAL: 1999.99 R$</p>
    </div>
</div>


<?php
require_once '../templates/rodape.php';
?>