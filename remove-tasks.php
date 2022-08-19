<?php

    require ("database.php");

    remover_tarefa($connection, $_GET['id']);

    header('Location: index.php');

?>