<?php
session_start();

include_once('config.php');  

if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('Location: home.php');
}
$logado = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu Principal</title>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: url("https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1500&q=80");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

    .box{
        background: rgba(0,0,0,0.65);
        padding: 45px;
        border-radius: 15px;
        width: 360px;
        text-align: center;
        box-shadow: 0 0 25px rgba(0,0,0,.7);
        backdrop-filter: blur(3px);
        position: center;
    }

    h1{
        margin: 0 0 25px;
        font-size: 30px;
        color: dodgerblue;
    }

    .inputSubmit{
        width: 100%;
        padding: 12px;
        background: dodgerblue;
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: .3s;
        margin-top: 10px;
        text-decoration: none;
        display: block;
        position: center;
    }

    .inputSubmit:hover{
        background: #006bcb;
    }

    .back{
        display: block;
        margin-bottom: 20px;
        margin-top: 10px;
        text-decoration: none;
        padding: 10px;
        border-radius: 8px;
        border: 2px solid dodgerblue;
        color: dodgerblue;
        transition: .3s;
        font-weight: bold;
        font-size: 16px;
        width: 100%;
    }

    .back:hover{
        background: dodgerblue;
        color: white;
    }


    .alterar-btn{
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    color: white;
    margin-top: 12px;
    text-decoration: none;
    position: relative;
    }
    .alterar-btn::after{
    content: "";
    width: 0%;
    height: 2px;
    background: dodgerblue;
    position: absolute;
    left: 0;
    bottom: -2px;
    transition: .3s;
    }
    .alterar-btn:hover::after{
    width: 100%;
    }
    .alterar-btn:hover{
    color: #f7f7f7ff;
    }

</style>
</head>
<body>

<div class="box">

    <h1>Menu</h1>

    <a href="sistema.php" class="inputSubmit">Buscar</a>

    <a href="formulario.php" class="inputSubmit" style="margin-top:10px;">Cadastrar</a>

    <a href="home.php" class="back">⟵ Voltar</a>

    <a href="usuario.php" class="alterar-btn">Alterar acesso</a>

</div>

</body>
</html>
