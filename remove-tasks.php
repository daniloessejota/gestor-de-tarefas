<?php
    //Script PHP para Deletar as Tarefas Concluídas no Banco de Dados;

    require ("database.php");

    remover_tarefa($connection, $_GET['id']);

    header('Location: index.php');
?>