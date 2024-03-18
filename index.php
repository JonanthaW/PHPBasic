<?php
    include('credentials.php');

    class BD {
        private $pdo;
        public function __construct($user, $senha) {
            $this -> pdo = new PDO('mysql:host=localhost;dbname=test', $user, $senha);
        }

        public function getConnection() {
            return $this ->pdo;
        }
    }

    $bd = new BD(USER, SENHA);

    $SQL = $bd -> getConnection() -> prepare('INSERT INTO `clientes` VALUES (null,?,?)');

    for( $i = 0; $i < 10; $i++ ) {
        $SQL -> execute(array('Guilherme', 'gui@hotmail.com'));
    }

    $SQL = $bd -> getConnection() -> prepare('SELECT * from clientes');
    $SQL -> execute();

    $clientes = $SQL ->  fetchAll();

    foreach( $clientes as $key => $value ) {
        echo $value['nome'];
        echo $value['email'];
    }
?>