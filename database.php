<?php

$dbServer = 'localhost';
$dbUser = 'useradmin';
$dbPass = 'Bluppus@2022';
$dbNameDatabase = 'task_manager';

$connection = mysqli_connect($dbServer, $dbUser, $dbPass, $dbNameDatabase);

if (!$connection) {
    echo 'Não foi possível conectar ao Banco de Dados. Erro: ' . mysqli_connect_errno();
    die();
}

function buscar_tarefas ($connection) {

    $sql_buscar = "SELECT tarefas, descricao, prazo, prioridade, tarefa_concluida FROM tb_tarefas;";
    $resutado = mysqli_query($connection, $sql_buscar);

    $lista_de_tarefas = [];

    while ($tarefa = mysqli_fetch_assoc($resutado)) {
        $lista_de_tarefas[] = $tarefa;
    }

    return $lista_de_tarefas;
}

function cadastrar_tarefas($connection, $lista_de_tarefas) { 
    $sql_gravar = "INSERT INTO tb_tarefas (tarefas, descricao, prazo, prioridade, tarefa_concluida)
    VALUES ('{$lista_de_tarefas['tarefas']}',
            '{$lista_de_tarefas['descricao']}',
            '{$lista_de_tarefas['prazo']}',
            '{$lista_de_tarefas['prioridade']}',
            '{$lista_de_tarefas['tarefa_concluida']}')";

    mysqli_query($connection, $sql_gravar);
}

?>