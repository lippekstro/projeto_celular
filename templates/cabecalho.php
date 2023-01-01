<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Celulares</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/carrossel.css">
    <link rel="stylesheet" href="../css/cabecalho.css">
    <link rel="stylesheet" href="../css/cards.css">
    <link rel="stylesheet" href="../css/rodape.css">
    <link rel="stylesheet" href="../css/sobre.css">
    <link rel="stylesheet" href="../css/produto.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/carrinho.css">


</head>

<body>
    <header>
        <!-- AQUI VAO OS ITENS DO CABEÇALHO DA PAGINA -->
        <div class="container-pesquisa">
            <div class="container-logo">
                <a href="../views/index.php">
                    <img src="../img/logo-white-removebg-preview.png" alt="">
                </a>
            </div>

            <div class="container-busca">
                <form action="">
                    <div class="caixa_busca">
                        <input type="search" name="busca" id="busca">
                        <button class="botao_busca" type="submit">
                            <span class="material-symbols-outlined">search</span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="carrinho_login">
                <a href="../views/carrinho.php"><span class="material-symbols-outlined">shopping_cart</span></a>
                <div class="dropdown">
                    <?php if (!isset($_SESSION['usuario'])) : ?>
                        <a href="../views/login.php"><span class="material-symbols-outlined">login</span></a>
                    <?php else : ?>
                        <div class="flex-horizontal-alinhado">
                            <p>Olá, <?= $_SESSION['usuario']['nome'] ?></p>
                            <a href="../views/login.php"><span class="material-symbols-outlined">account_circle</span></a>
                        </div>

                        <div class="conteudo-dropdown">
                            <a href="">Editar Perfil</a>
                            <a href="../views/logout.php">Sair</a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="menu-global">
            <ul class="links-global">
                <li><a href="../views/index.php">INICIO</a></li>
                <li><a href="../views/celulares.php">CELULARES</a></li>
                <li><a href="../views/sobre.php">SOBRE NÓS</a></li>
            </ul>
        </div>
    </header>

    <main>
        <!-- AQUI VAO OS ITENS DO CONTEUDO PRINCIPAL DA PAGINA -->