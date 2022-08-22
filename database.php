<?php

//Script PHP com as requisições feitas ao Banco de Dados;

//Informações sobre o Banco de Dados:
$dbServer = 'localhost';
$dbUser = 'useradmin';
$dbPass = 'Bluppus@2022';
$dbNameDatabase = 'task_manager';

$connection = mysqli_connect($dbServer, $dbUser, $dbPass, $dbNameDatabase);

//CHECANDO A CONEXÃO
if (!$connection) {
    echo 'Não foi possível conectar ao Banco de Dados. Erro: ' . mysqli_connect_errno(); //exibe o erro em caso de falha na conexão
    
    exit();
}


//LEITURA DOS DADOS
function buscar_tarefas ($connection) {

    $sql_buscar = "SELECT id, tarefas, descricao, prazo, prioridade, tarefa_concluida FROM tb_tarefas;";
    $resutado = mysqli_query($connection, $sql_buscar);

    $lista_de_tarefas = [];

    while ($tarefa = mysqli_fetch_assoc($resutado)) {
        $lista_de_tarefas[] = $tarefa;
    }

    return $lista_de_tarefas;
}


//CRIAÇÃO DOS DADOS
//METÓDO PROCEDURAL
function cadastrar_tarefas($connection, $lista_de_tarefas) {
    $tarefa = $lista_de_tarefas['tarefas'] ;
    $descricao = $lista_de_tarefas['descricao'] ;
    $prazo = $lista_de_tarefas['prazo'];
    $prioridade = $lista_de_tarefas['prioridade'];
    $conclusao = $lista_de_tarefas['tarefa_concluida'];

    $stmt = mysqli_prepare($connection, "INSERT INTO tb_tarefas (tarefas, descricao, prazo, prioridade, tarefa_concluida) VALUES (?, ?, ?, ?, ?)"); 

    mysqli_stmt_bind_param($stmt, 'sssii', $tarefa, $descricao, $prazo, $prioridade, $conclusao); //preparando o statement

    mysqli_stmt_execute($stmt); //executando o statement preparado

    mysqli_stmt_close($stmt); //fechando statement e conexão
}


//LEITURA
//METÓDO PROCEDURAL
function buscar_uma_tarefa ($connection, $id) {

    $stmt = mysqli_prepare ($connection, "SELECT * FROM tb_tarefas WHERE id = ? "); 

    mysqli_stmt_bind_param($stmt, 'i', $id); //preparando o statement

    mysqli_stmt_execute($stmt); //executando o statement preparado
    $varredura = mysqli_stmt_get_result($stmt); //recupera um conjunto de resultados de uma instrução preparada
    $resultado = mysqli_fetch_assoc($varredura); //traz o resultado para um array associativo

    return $resultado;
}


//EDIÇÃO
function editar_uma_tarefa ($connection, $lista_de_tarefas) {
    $id_de_tarefas = $lista_de_tarefas['id'] ;
    $tarefa = $lista_de_tarefas['tarefas'] ;
    $descricao = $lista_de_tarefas['descricao'] ;
    $prazo = $lista_de_tarefas['prazo'];
    $prioridade = $lista_de_tarefas['prioridade'];
    $conclusao = $lista_de_tarefas['tarefa_concluida'];

    $stmt = mysqli_prepare($connection, "UPDATE tb_tarefas SET tarefas = ?, descricao = ?, prazo = ?, prioridade = ?, tarefa_concluida = ? WHERE id = ?");

    mysqli_stmt_bind_param($stmt, 'sssiii', $tarefa, $descricao, $prazo, $prioridade, $conclusao, $id_de_tarefas); // or die( mysqli_error($connection)); para exibir o erro; //preparando o statement

    mysqli_stmt_execute($stmt); // or die( mysqli_stmt_error($connection)) para exibir o erro; //executando o statement preparado
    mysqli_stmt_close($stmt); //fechando statement e conexão
}

//APAGANDO TAREFAS CONCLUÍDAS
function remover_tarefa ($connection, $id) {

    $stmt = mysqli_prepare($connection, "DELETE FROM tb_tarefas WHERE id = ?"); 

    mysqli_stmt_bind_param($stmt, 'i', $id); //preparando o statement

    mysqli_stmt_execute($stmt); //executando o statement preparado
    mysqli_stmt_close($stmt); //fechando statement e conexão
}

?>