<?php
session_start();
$error = "";


include_once('config.php');


$conn = null;
if (isset($conexao)) $conn = $conexao;
elseif (isset($conn)) $conn = $conn;
elseif (isset($mysqli)) $conn = $mysqli;

if (!$conn) {

    die("Erro: não foi possível encontrar a conexão com o banco. Verifique config.php (variável \$conexao, \$conn ou \$mysqli).");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $user = isset($_POST['user']) ? trim($_POST['user']) : '';
    $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';

    if ($user === '' || $pass === '') {
        $error = "Preencha usuário e senha.";
    } else {

        $sql = "SELECT * FROM entrar WHERE usuario = ? LIMIT 1";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('s', $user);
            if (!$stmt->execute()) {
                $error = "Erro ao executar consulta: " . $stmt->error;
            } else {
                $res = $stmt->get_result();
                if ($row = $res->fetch_assoc()) {
                    $hash_db = $row['senha'];

                    if (password_verify($pass, $hash_db)) {
                        $_SESSION['usuario'] = $row['usuario'];
                        header('Location: login.php');
                        exit;
                    }

                    if ($pass === $hash_db) {
                        $_SESSION['usuario'] = $row['usuario'];
                        header('Location: login.php');
                        exit;
                    }

                    $error = "Usuário ou senha incorretos.";
                } else {
                    $error = "Usuário não encontrado.";
                }
                $res->free();
            }
            $stmt->close();
        } else {
            $error = "Erro no SQL: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PLATV | Login</title>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: url("fotos.jpeg");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    .box{
        background: rgba(0,0,0,0.6);
        padding: 40px;
        border-radius: 15px;
        width: 350px;
        box-shadow: 0 0 20px rgba(0,0,0,.6);
        backdrop-filter: blur(3px);
    }

    h1{
        font-size: 36px;
        margin-bottom: 5px;
        color: dodgerblue;
    }

    h2{
        font-size: 18px;
        margin-bottom: 25px;
    }

    input{
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: none;
        margin-bottom: 15px;
        outline: none;
        font-size: 15px;
    }

    .button{
        width: 100%;
        background: transparent;
        border: 2px solid dodgerblue;
        color: white;
        padding: 14px;
        border-radius: 10px;
        cursor: pointer;
        transition: .3s;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 12px;
    }

    .button:hover{
        background: dodgerblue;
    }

    .erro{
        margin-top: 10px;
        color: red;
        font-weight: bold;
        font-size: 14px;
    }

    .linkButton{
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    color: white;
    margin-top: 12px;
    text-decoration: none;
    position: relative;
    }
    .linkButton::after{
    content: "";
    width: 0%;
    height: 2px;
    background: dodgerblue;
    position: absolute;
    left: 0;
    bottom: -2px;
    transition: .3s;
    }
    .linkButton:hover::after{
    width: 100%;
    }
    .linkButton:hover{
    color: #f7f7f7ff;
    }

</style>

</head>
<body>

<div class="box">
    <h1>Login</h1>
    <h2>Autenticação necessária</h2>

    <form method="POST" action="">
        <input type="text" name="user" placeholder="Usuário" required>
        <input type="password" name="pass" placeholder="Senha" required>

        <button type="submit" name="submit" class="button">Entrar</button>
    </form>

    <?php if(!empty($error)): ?>
        <div class="erro"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
</div>
</body>
</html>
