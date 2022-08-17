<?php
    require ("database.php");
    require ("helpers.php");
    
    $exibe_tabela = false;

    $lista_de_tarefas = array();

    if (array_key_exists ('tarefa', $_GET) and $_GET['tarefa'] != '') {
            $lista_de_tarefas = array(
            'id' => $_GET['id'],
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

    //editar_uma_tarefa($connection, $lista_de_tarefas);

    }

    $tarefa = buscar_uma_tarefa($connection, $_GET['id']);

    require ("form.php");
?>