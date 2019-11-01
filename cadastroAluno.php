<?php
    $nomeAluno = $_POST['nomeAluno'];
    $raAluno = $_POST['raAluno'];
    $cursoId = $_POST['curso'];

    $host = 'mysql:host=localhost;dbname=escola;port=3306';
    $user = 'root';
    $password = '';

    $db = new PDO($host,$user,$password);

    // $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) VALUES (?,?,?);');
    $query = $db->prepare('INSERT INTO alunos (nome, ra, curso_id) VALUES (:nome, :ra, :curso_id);');

    $query->execute([
            'nome'=>$nomeAluno,
            'ra'=>$raAluno,
            'curso_id'=>$cursoId
    ]);

    var_dump($query);

?>