<?php
    // $host = 'mysql:host=localhost;dbname=escola;port=3306';
    // $user = 'root';
    // $password = '';

    // $db = new PDO($host,$user,$password);

    function conectarBanco(){
        $host = 'mysql:host=localhost;dbname=escola;port=3306';
        $user = 'root';
        $password = '';

        return $db = new PDO($host,$user,$password);
    }
?>