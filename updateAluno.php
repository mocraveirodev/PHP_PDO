<?php
    include_once("config/conexao.php");

    $db = conectarBanco();

    // $query = $db->query('SELECT * FROM cursos');

    // $cursos = $query->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($cursos);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo "Você deve passar um ID!";
        exit;
    }

    $query = $db->query('SELECT * FROM alunos WHERE id=?');

    $aluno = $query->execute([$id]);

    $aluno = $aluno->fetch(PDO::FETCH_ASSOC);
    var_dump($aluno);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banner</title>
</head>
<body>
    <form action="cadastroAluno.php" method="post">
        <h2>Nome Aluno</h2>
        <input type="text" name="nomeAluno" id="">
        <input type="text" name="raAluno" id="">
        <select name="curso" id="">
            <?php foreach ($cursos as $curso): ?>
                <option value="<?= $curso["id"]; ?>"><?= $curso["nome"]; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>