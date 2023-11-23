<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuario</title>
</head>
<body>
    
    <?php
    include 'conexao.php';

    // Conexão com a DB

    $conexao = new Conexao();
    $conexao->open();

    // Obtém informações de entrada do usuário

    $nome = $_GET["nome"];
    $sexo = $_GET["sexo"];
    $ano_nascimento = $_GET["ano_nascimento"];
    $sql = "INSERT INTO usuarios (nome_usuario, ano_nascimento, sexo) VALUES ('$nome', '$ano_nascimento', '$sexo');";
   
    // Exibe informações inseridas

    echo "Me chamo $nome, sou do sexo $sexo e nasci no ano de $ano_nascimento";

    // Executa a query na DB

    $result = pg_query($sql);

    // Resultado da query

    if($result){
        echo "Inserção de usuário realizada.";
    } else {
        echo "Houve algum erro, tente novamente.";
    }

    $conexao->close();


    ?>
</body>
</html>