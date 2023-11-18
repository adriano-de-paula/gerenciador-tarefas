<?php
    session_start();

    if (!isset($_SESSION['tarefas'])) {
        $_SESSION['tarefas'] = array();
    }

    if (isset($_GET['nome-tarefa'])) {
        array_push($_SESSION['tarefas'], $_GET['nome-tarefa']);
        unset($_GET['nome-tarefa']);
    }

    if (isset($_GET['limpar'])) {
        unset($_SESSION['tarefas']);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">

    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <div class="container">
        <div class="cabecalho">
            <h1>Gerenciador de Tarefas</h1>
        </div>
        <div class="formulario">
            <form action="" method="get">
                <label for="nome-tarefa">Tarefa:</label>
                <input type="text" name="nome-tarefa" placeholder="Nome da Tarefa">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="divisor"></div>
        <div class="lista-tarefas">
            <?php
                if(isset($_SESSION['tarefas'])) {
                    echo "<ul>";
                    foreach($_SESSION['tarefas'] as $key => $tarefa) {
                        echo "<li>$tarefa</li>";
                    }
                    echo "</ul>";
                }
            ?>
            <form action="" method="get">
                <input type="hidden" name="limpar" value="limpar">
                <button type="submit" class="bt-limpar">Limpar Tarefa</button>
            </form>
        </div>
        <div class="rodape">
            <p>Desenvolvido por Adriano de Paula</p>
        </div>
    </div>
</body>
</html>