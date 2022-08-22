<?php
    //Script PHP para Editar e Cadastrar as Edições das Tarefas no Banco de Dados;

    require ("database.php");
    require ("helpers.php");
    
    $exibe_tabela = false; //condição para exibição da tabela com as tarefas cadastradas na página inicial

    //condições para fazer a validação dos dados escritos
    $tem_erros = false; 
    $erros_validacao = [];


    //Recebendo a requisição por metódo POST e transformando os valores recebidos em um array para consulta:
    if (tem_post()) {

        $lista_de_tarefas = array(
            'id' => $_POST['id'],
            'tarefas' => $_POST['tarefa'],
            'descricao' => '',
            'prazo' => $_POST['prazo'],
            'prioridade' => $_POST['prioridade'],
            'tarefa_concluida' => 0,
            );

        //validação da data digitada
        $hoje = date("Y-m-d"); 
        
        if ($lista_de_tarefas['prazo'] < $hoje) {
            $tem_erros = true;

            $erros_validacao['prazo'] = 'Não podemos voltar para o passado, digite uma data válida.';

        }

    //Preenchendo os elementos do array $lista_de_tarefas que ficam em branco por padrão porque são opcionais:
        if (array_key_exists ('descricao', $_POST)) {
             $lista_de_tarefas['descricao'] = $_POST['descricao'];
        }

        if (array_key_exists ('tarefa_finalizada', $_POST)) {
            $lista_de_tarefas['tarefa_concluida'] = 1;
        }

    //evitando que a edicao de uma tarefa com algum dado incorreto seja permitida
        if ($tem_erros == false) {
            editar_uma_tarefa($connection, $lista_de_tarefas);
        
            header('Location: index.php');
            die();
        }
    }

    $tarefa = buscar_uma_tarefa($connection, $_GET['id']);

    require ("form.php");
?>