<?php
    /*
    define("NOME","Jonantha");

    function printarNome($NOME) {
        echo "<h1>Meu nome é '$NOME'</h1>";
    }

    printarNome("Jonantha");

    $frase = "Isto é uma frase gigante";
    echo substr($frase,0,8);

    for( $i = 0; $i < 5; $i++ ) {
        echo NOME;
    }


    session_start();
    if (!isset($_SESSION["nome"])) {
        $_SESSION['nome'] = "Jonantha";
    }
    else {
        Echo "já existe";
    }
    echo $_SESSION['nome']."criado";
    */

    session_start();
    if(isset($_POST['acao'])) {
        // form enviado
        $tarefa = strip_tags($_POST['tarefa']);
        

        if(!isset($_SESSION['tarefas'])) {
            $_SESSION['tarefas'] = array();
            $_SESSION['tarefas'][] = $tarefa;
        }
        else {
            $_SESSION['tarefas'][] = $tarefa;
        }
    }
    if(isset($_POST['limpar'])) {
        unset( $_SESSION['tarefas'] );
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>
</head>
<body>
    <form method="post">
        <input type="text" name="tarefa" placeholder="Digite sua tarefa">
        <input type="submit" name="acao" value="Enviar">
        <input type="submit" name="limpar" value="limpar">
    </form>
    <br>
    <h3>Suas tarefas atuais</h3>
    <?php
        if(isset($_SESSION['tarefas'])) {
            foreach($_SESSION['tarefas'] as $key => $value) {
                echo "<p>$key = $value</p>";
            }
        }
    ?>

</body>
</html>