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

if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or cidade LIKE'%$data%' or setor LIKE'%$data%' ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, Helvetica, sans-serif;
            color: #fff;
            padding-bottom: 50px;
        }
        .content-box{
            background: rgba(0, 0, 0, 0.3);
            margin: 40px auto;
            padding: 25px;
            border-radius: 15px;
            max-width: 95%;
        }
        .table-bg{
            background: rgba(0,0,0,0.7) !important;
            border-radius: 10px;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #fff !important;
        }
        .top-buttons{
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn-voltar{
            background: #1e59d8ff;
            color: white;
            border-radius: 8px;
            padding: 10px 22px;
            text-decoration: none;
            transition: .3s;
        }
        .btn-voltar:hover{
            background: #555;
            color: white;
        }
        .search-box{
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>
<div class="content-box">
    <div class="top-buttons">
        <a class="btn-voltar" href="home.php">⬅ Voltar</a>
        <a href="sair.php" class="btn btn-danger">Sair</a>
    </div>
    <h2 class="text-center">Bem-vindo</h2>
    <div class="search-box">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            🔍
        </button>
    </div>
    <table class="table text-white table-bg table-hover text-center align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Setor</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Sexo</th>
                <th>Nascimento</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($user_data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $user_data['id'] ?></td>
                    <td><?= $user_data['nome'] ?></td>
                    <td><?= $user_data['setor'] ?></td>
                    <td><?= $user_data['email'] ?></td>
                    <td><?= $user_data['telefone'] ?></td>
                    <td><?= $user_data['sexo'] ?></td>
                    <td><?= $user_data['data_nasc'] ?></td>
                    <td><?= $user_data['cidade'] ?></td>
                    <td><?= $user_data['estado'] ?></td>
                    <td><?= $user_data['endereco'] ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $user_data['id'] ?>">Editar
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $user_data['id'] ?>">Excluir
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                             <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });
    function searchData(){
        window.location = 'sistema.php?search=' + search.value;
    }
</script>
</body>
</html>