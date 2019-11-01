<?php
    include_once("config/conexao.php");

    $db = conectarBanco();

    $query = $db->query('SELECT * FROM cursos');

    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);
    var_dump($_REQUEST);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }elseif(isset($_POST['id'])){
        $id = $_POST['id'];
    }else{
        echo "Você deve passar um ID!";
        exit;
    }

    $query = $db->prepare('SELECT * FROM alunos WHERE id=?');
    $query->execute([$id]);
    $aluno = $query->fetch(PDO::FETCH_ASSOC);

    // var_dump($aluno);

    if($_POST != []){
        $nomeAluno = $_POST['nomeAluno'];
        $raAluno = $_POST['raAluno'];
        $cursoId = $_POST['curso'];
        $id = $_POST["id"];

        $query = $db->prepare('UPDATE alunos SET nome = :nome, ra = :ra, curso_id = :curso_id WHERE id = :id;');
        $query->execute(["nome"=>$nomeAluno, "ra"=>$raAluno, "curso_id"=>$cursoId,"id"=>$id]);
    }

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
    <!-- <form action="updateAluno.php?id=<?= $id ?>" method="post"> -->
    <form action="updateAluno.php" method="post">
        <h2>Nome Aluno</h2>
        <input type="text" name="id" readonly hidden id="" value="<?= $id ?>">
        <input type="text" name="nomeAluno" id="" value="<?= $aluno['nome'] ?>">
        <input type="text" name="raAluno" id="" value="<?= $aluno['ra'] ?>" readonly>
        <select name="curso" id="">
            <?php foreach ($cursos as $curso): ?>
                <?php if ($curso['id'] == $aluno['curso_id']): ?>
                    <option selected value="<?= $curso['id']; ?>"><?= $curso['nome']; ?></option>
                <?php else: ?>
                    <option value="<?= $curso['id']; ?>"><?= $curso['nome']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <button type="submit">Salvar Atualizações</button>
    </form>
</body>
</html>