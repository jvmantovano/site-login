<?php
session_start();
    
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('Location: home.php');
}
$logado = $_SESSION['usuario'];
if(isset($_POST['submit']))
{
    include_once('config.php');

    $id = $_POST['id'];
    $senha = $_POST['usuario'];
    $usuario = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO host(id,usuario,senha)
    VALUES ('$id','$usuario','$senha')");

    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Usuario</title>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background: url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?auto=format&fit=crop&w=1500&q=80');
        background-size: cover;
        backdrop-filter: blur(5px);
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container{
        width: 400px;
        background: rgba(0,0,0,0.55);
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 0 25px rgba(0,0,0,.6);
        color: #fff;
        display: flex;
        flex-direction: column;
        gap: 14px;
        position: absolute;
        align-items: center;
        
    }

    h2{
        text-align: center;
        margin: 0;
        margin-bottom: 15px;
        font-size: 24px;
        color: #00aaff;
    }

    .input-group{
        margin-bottom: 18px;
        width: 400px;
        
    }

    .input-group label{
        font-size: 14px;
        margin-bottom: 6px;
        display: block;
        color: #ddd;
    }

    .input-group input, select{
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        border: none;
        outline: none;
        background: rgba(255,255,255,.1);
        color: #fff;
        font-size: 14px;
    }

    .sexo-group{
        margin: 10px 0;
    }

    .sexo-group label{
        margin-right: 10px;
    }

    button{
        width: 100%;
        padding: 12px;
        background: #0077ff;
        border: none;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        font-size: 16px;
        transition: .3s;
    }

    button:hover{
        background: #005fcc;
    }

    .login-link{
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .login-link a{
        color: #00aaff;
        text-decoration: underline;
    }

    /* Botão voltar */
    .back-btn{
        display: block;
        width: 100%;
        padding: 12px;
        background: transparent;
        border: 2px solid #00aaff;
        border-radius: 10px;
        text-align: center;
        color: #00aaff;
        margin-top: -10px;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        transition: .3s;
    }

    .back-btn:hover{
        background: #00aaff;
        color: white;
    }

</style>
</head>
<body>

<div class="container">

    <a href="login.php" class="back-btn">⟵ Voltar</a>

    <h2>Edição Usuário</h2>

    <form action="formulario.php" method="POST">

        <div class="input-group">
            <label>Usuario</label>
            <input type="text" name="usuario" required>
        </div>

        <div class="input-group">
            <label>senha</label>
            <input type="text" name="senha" required>
        </div>
        <button type="submit" name="submit">Editar</button>
    </form>
</div>

</body>
</html>
