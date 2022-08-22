<?php
    require ("database.php");
    require ("helpers.php");
    
    $exibe_tabela = false;

    $lista_de_tarefas = array();

    $tem_erros = false;
    $erros_validacao = [];

    if (tem_post()) {

        $lista_de_tarefas = array(
            'id' => $_POST['id'],
            'tarefas' => $_POST['tarefa'],
            'descricao' => '',
            'prazo' => $_POST['prazo'],
            'prioridade' => $_POST['prioridade'],
            'tarefa_concluida' => 0,
            );

        $hoje = date("Y-m-d"); 
        
        if ($lista_de_tarefas['prazo'] < $hoje) {
            $tem_erros = true;

            $erros_validacao['prazo'] = 'Não podemos voltar para o passado, digite uma data válida.';
        }

    /* -- Preenchendo os elementos do array acima que ficam em branco por padrão porque são opcionais: -- */

        if (array_key_exists ('descricao', $_POST)) {
             $lista_de_tarefas['descricao'] = $_POST['descricao'];
        }

        if (array_key_exists ('tarefa_finalizada', $_POST)) {
            $lista_de_tarefas['tarefa_concluida'] = 1;
        }

    if ($tem_erros == false) {
        editar_uma_tarefa($connection, $lista_de_tarefas);
    
        header('Location: index.php');
        die();
    }
    }

    $tarefa = buscar_uma_tarefa($connection, $_GET['id']);

    require ("form.php");
?>