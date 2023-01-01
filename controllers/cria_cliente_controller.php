<?php

require_once '../models/cliente.php';
require_once '../models/conexao.php';
session_start();


try {
    $cliente = new Cliente();

    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $endereco = htmlspecialchars($_POST['endereco']);
    $senha = $_POST['senha'];
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $cliente->nome = $nome;
        $cliente->email = $email;
        $cliente->telefone = $telefone;
        $cliente->endereco = $endereco;
        $cliente->senha = $senha;

        $cliente->criar();

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
