<?php 
require_once '../models/cliente.php';
require_once '../models/conexao.php';

try {
    $id_cliente = $_POST['id_cliente'];
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $endereco = htmlspecialchars($_POST['endereco']);

    $cliente = new Cliente($id_cliente);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $cliente->nome = $nome;
        $cliente->email = $email;
        $cliente->telefone = $telefone;
        $cliente->endereco = $endereco;

        $cliente->editar();

        //setcookie("msg", "Cliente Cadastrado com Sucesso");
        //setcookie("CRIAR", true);
        header("Location: ../views/index.php");
    } else {
        //setcookie("msg", "ERRO");
        //setcookie("CRIAR", true);
        //header("Location: gerencia_usuario.php");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
