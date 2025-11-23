<?php
session_start();
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sqlUpdate = "UPDATE entrar SET usuario='$usuario', senha='$usuario'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);

    }
    header('Location: sistema.php');
?>