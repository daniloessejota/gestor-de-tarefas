<?php
    require ("database.php");
    require ("helpers.php");

    $exibe_tabela = true;

    /* if (array_key_exists('tarefa', $_GET)) {
        $_SESSION['lista_de_tarefas'][] = $_GET['tarefa'];
    }

    $lista_de_tarefas = [];

    if (array_key_exists('lista_de_tarefas', $_SESSION)) {
        $lista_de_tarefas = $_SESSION['lista_de_tarefas'];
    } */

    
    /* -- Recebendo a requisição por metódo GET e transformando os valores recebidos em um array para consulta: -- */

    $lista_de_tarefas = array();

    if (array_key_exists ('tarefa', $_GET) and $_GET['tarefa'] != '') {
            $lista_de_tarefas = array(
            'tarefas' => $_GET['tarefa'],
            'descricao' => '',
            'prazo' => '',
            'prioridade' => $_GET['prioridade'],
            'tarefa_concluida' => 0,
            );

    /* -- Preenchendo os elementos do array acima que ficam em branco por padrão porque são opcionais: -- */

    if (array_key_exists ('descricao', $_GET)) {
         $lista_de_tarefas['descricao'] = $_GET['descricao'];
    }
    if (array_key_exists ('prazo', $_GET)) {
        $lista_de_tarefas['prazo'] = $_GET['prazo'];
    }
    if (array_key_exists ('tarefa_finalizada', $_GET)) {
        $lista_de_tarefas['finalizada'] = 1;
    }
;
    /* -- Mantendo os valores mesmo com a mudança das requisições: -- */

    //$_SESSION['lista_de_tarefas'][] = $lista_de_tarefas;
    
    cadastrar_tarefas($connection, $lista_de_tarefas);

    }

    /* if (isset($_SESSION['lista_de_tarefas'])) {
        $lista_de_tarefas = $_SESSION['lista_de_tarefas'];
    } else {
        $lista_de_tarefas = array();
    } */
    
    $tarefas = buscar_tarefas($connection);

?>