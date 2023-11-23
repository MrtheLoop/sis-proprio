<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover usuário</title>
</head>
<body>
    <?php
     include 'conexao.php';
    // Inicia conexão
    $conexao = new Conexao();
    $conexao->open();

    // Recebe entrada do usuário

    $funcao = $_GET['funcao'];

    // Realiza consulta para exibir quais os usuários

    if ($funcao == 'todos'){
        $sql = "SELECT id_usuario, nome_usuario, funcao FROM usuarios";
    } else {
        $sql = "SELECT id_usuario, nome_usuario, funcao FROM usuarios WHERE funcao = '$funcao';";
    }

    // Exibi erro de conexão para o caso de ter algo errado

    $result = pg_query($sql);
    if (!$result) {
    echo "Ocorreu um erro.\n";
    exit;
    }

    // Exibe resultado da consulta $sql    

    while ($row = pg_fetch_row($result)) {
    $nome = strtok($row[1], " ");

    echo "<div class='funcao' name='nome' style='width:300px; border:1px solid; margin:5px;'> ID: $row[0] <br> Nome: $row[1] <br> Função: $row[2] </div>";
    }

    // Realiza consulta de quantas linhas tem, usando por base o campo id_usuario

    $func_contar_linhas = "SELECT COUNT(id_usuario) FROM usuarios;";
    $linhas = pg_query($func_contar_linhas);


    // While para exibir todos os options no select tendo por base a quantidade de linhas $contar_linhas

    while ($row = pg_fetch_row($linhas)) {
        echo "$row[0]";
    }

    // Encerra conexão

    $conexao->close();
    ?>
</body>
</html>
