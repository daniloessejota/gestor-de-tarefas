<?php
    require ("database.php");
    require ("helpers.php");

    $exibe_tabela = true;

    /* if (array_key_exists('tarefa', $_POST)) {
        $_SESSION['lista_de_tarefas'][] = $_POST['tarefa'];
    }

    $lista_de_tarefas = [];

    if (array_key_exists('lista_de_tarefas', $_SESSION)) {
        $lista_de_tarefas = $_SESSION['lista_de_tarefas'];
    } */

    
    /* -- Recebendo a requisição por metódo GET e transformando os valores recebidos em um array para consulta: -- */

    $lista_de_tarefas = array();

    if (array_key_exists ('tarefa', $_POST) and $_POST['tarefa'] != '') {
            $lista_de_tarefas = array(
            'tarefas' => $_POST['tarefa'],
            'descricao' => '',
            'prazo' => '',
            'prioridade' => $_POST['prioridade'],
            'tarefa_concluida' => 0,
            );

    /* -- Preenchendo os elementos do array acima que ficam em branco por padrão porque são opcionais: -- */

    if (array_key_exists ('descricao', $_POST)) {
         $lista_de_tarefas['descricao'] = $_POST['descricao'];
    }
    if (array_key_exists ('prazo', $_POST)) {
        $lista_de_tarefas['prazo'] = $_POST['prazo'];
    }
    if (array_key_exists ('tarefa_finalizada', $_POST)) {
        $lista_de_tarefas['tarefa_concluida'] = 1;
    }
;
    /* -- Mantendo os valores mesmo com a mudança das requisições: -- */

    //$_SESSION['lista_de_tarefas'][] = $lista_de_tarefas;
    
    cadastrar_tarefas($connection, $lista_de_tarefas);
    
    header('Location: index.php');
    die();

    }

    /* if (isset($_SESSION['lista_de_tarefas'])) {
        $lista_de_tarefas = $_SESSION['lista_de_tarefas'];
    } else {
        $lista_de_tarefas = array();
    } */

    $tarefas = buscar_tarefas($connection);

    $tarefa = ['id' => 0, 'tarefas' => '', 'descricao' => '', 'prazo' => '','prioridade' => 0, 'tarefa_concluida' => ''];
    
    require 'form.php';

?>