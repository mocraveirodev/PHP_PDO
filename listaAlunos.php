<?php
    include_once("config/conexao.php");

    $db = conectarBanco();

    $query = $db->query('SELECT * FROM alunos');

    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Lista de Alunos</h1>

    <ul>
        <?php foreach($resultado as $aluno) { ?>
            <li><?= $aluno["nome"]; ?></li>
        <?php } ?>
    </ul>
</body>
</html>