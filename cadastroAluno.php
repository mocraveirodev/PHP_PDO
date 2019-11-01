<?php
    include_once("config/conexao.php");

    $nomeAluno = $_POST['nomeAluno'];
    $raAluno = $_POST['raAluno'];
    $cursoId = $_POST['curso'];

    $db = conectarBanco();

    // $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) VALUES (?,?,?);');
    $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) VALUES (:nome, :ra, :curso_id);');

    $query->execute([
        'nome'=>$nomeAluno,
        'ra'=>$raAluno,
        'curso_id'=>$cursoId
    ]);

    var_dump($query);

?>