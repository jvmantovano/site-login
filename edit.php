<?php
session_start();
include_once('config.php');

// Proteção de acesso (verifica sessão)
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: home.php');
    exit;
}
$logado = $_SESSION['usuario'];

// Buscar dados quando abrir a página com ?id=...
if(!empty($_GET['id']))
{
    $id = intval($_GET['id']); // segurança básica
    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if($result && $result->num_rows > 0)
    {
        $user_data = mysqli_fetch_assoc($result);

        $nome       = $user_data['nome'];
        $setor      = $user_data['setor'];
        $email      = $user_data['email'];
        $telefone   = $user_data['telefone'];
        $sexo       = $user_data['sexo'];
        $data_nasc  = $user_data['data_nasc'];
        $cidade     = $user_data['cidade'];
        $estado     = $user_data['estado'];
        $endereco   = $user_data['endereco'];
    }
    else
    {
        header('Location: sistema.php');
        exit;
    }
}
else
{
    header('Location: sistema.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Usuário | PLATV</title>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background: url('https://images.unsplash.com/photo-1485217988980-11786ced9454?auto=format&fit=crop&w=1200&q=80');
        background-size: cover;
        backdrop-filter: blur(5px);
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box{
        width: 400px;
        background: rgba(0,0,0,0.55);
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 0 25px rgba(0,0,0,.6);
        color: #fff;
        display: flex;
        flex-direction: column;
        gap: 14px;
        position:absolute;
    }

    h1{
        text-align: center;
        margin: 0;
        margin-bottom: 15px;
        font-size: 24px;
        color: #00aaff;
    }

    .inputBox{
        margin-bottom: 18px;
        width: 100%;
    }

    .inputUser{
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        border: none;
        outline: none;
        background: rgba(255,255,255,.08);
        color: #fff;
        font-size: 14px;
    }

    .labelInput{
        display: block;
        font-size: 13px;
        margin-bottom: 6px;
        color: #ddd;
    }

    #data_nascimento{
        margin: 10px 0;
        font-size: 14px;
        padding: 10px;
        border-radius: 10px;
        border: none;
        background: rgba(255,255,255,.08);
        color: #fff;
    }

    #submit{
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

    #submit:hover{
         background: #005fcc;
    }

    .back-btn{
        display: block;
        width: 100%;
        padding: 12px;
        background: transparent;
        border: 2px solid #00aaff;
        border-radius: 10px;
        text-align: center;
        color: #00aaff;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        transition: .3s;
        margin-bottom: 5px;
    }

    .back-btn:hover{
        background: #00aaff;
        color: white;
    }

    /* pequenos ajustes responsivos */
    @media (max-width: 460px){
        .box { width: 92%; padding: 20px; }
    }
</style>
</head>

<body>
<div class="box">

    <!-- Botão voltar estilizado -->
    <a href="sistema.php" class="back-btn">⟵ Voltar</a>

    <form action="saveEdit.php" method="POST">
        <h1><b>Editar Cliente</b></h1>

        <div class="inputBox">
            <label class="labelInput" for="nome">Nome completo</label>
            <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo isset($nome) ? htmlspecialchars($nome) : ''; ?>" required>
        </div>

        <div class="inputBox">
            <label class="labelInput" for="setor">Setor</label>
            <input type="text" name="setor" id="setor" class="inputUser" value="<?php echo isset($setor) ? htmlspecialchars($setor) : ''; ?>" required>
        </div>

        <div class="inputBox">
            <label class="labelInput" for="email">Email</label>
            <input type="text" name="email" id="email" class="inputUser" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
        </div>

        <div class="inputBox">
            <label class="labelInput" for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo isset($telefone) ? htmlspecialchars($telefone) : ''; ?>" required>
        </div>

        <p style="margin: 10px 0; color:#ddd;">Sexo:</p>
        <label style="color:#ddd; margin-right: 10px;"><input type="radio" name="genero" value="feminino" <?php echo (isset($sexo) && $sexo == 'feminino') ? 'checked' : ''; ?>> Feminino</label><br>
        <label style="color:#ddd; margin-right: 10px;"><input type="radio" name="genero" value="masculino" <?php echo (isset($sexo) && $sexo == 'masculino') ? 'checked' : ''; ?>> Masculino</label><br>
        <label style="color:#ddd; margin-right: 10px;"><input type="radio" name="genero" value="outro" <?php echo (isset($sexo) && $sexo == 'outro') ? 'checked' : ''; ?>> Outro</label>

        <label class="labelInput" style="margin-top:10px;" for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo isset($data_nasc) ? htmlspecialchars($data_nasc) : ''; ?>" required>

        <div class="inputBox">
            <label class="labelInput" for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo isset($cidade) ? htmlspecialchars($cidade) : ''; ?>" required>
        </div>

        <div class="inputBox">
            <label class="labelInput" for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo isset($estado) ? htmlspecialchars($estado) : ''; ?>" required>
        </div>

        <div class="inputBox">
            <label class="labelInput" for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo isset($endereco) ? htmlspecialchars($endereco) : ''; ?>" required>
        </div>

        <input type="hidden" name="id" value="<?php echo isset($id) ? intval($id) : ''; ?>">

        <input type="submit" name="update" id="submit" value="Salvar Alterações">
    </form>
</div>
</body>
</html>
