<?php
    require ("database.php");
    require ("helpers.php");
    
    $exibe_tabela = false;

    $lista_de_tarefas = array();

    if (array_key_exists ('tarefa', $_POST) and $_POST['tarefa'] != '') {
            $lista_de_tarefas = array(
            'id' => $_POST['id'],
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

    editar_uma_tarefa($connection, $lista_de_tarefas);

    header('Location: index.php');
    die();

    }

    $tarefa = buscar_uma_tarefa($connection, $_GET['id']);

    require ("form.php");
?>