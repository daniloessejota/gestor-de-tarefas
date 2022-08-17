<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tarefas</title>

    <!-- CCS BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS Local -->
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

</head>
<body>
    
    <div class="container">
        
        <div class="row">
            <div class="col-sm-12 mb-4 text-center">
                <h1>Gestor de Tarefas</h1>
            </div>
        </div>

    <table class="mt-3 table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Tarefas</th>
                <th scope="col">Descrição</th>
                <th scope="col">Prazo</th>
                <th scope="col">Prioridade</th>
                <th scope="col">Concluída</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>

    <?php

        foreach ($tarefas as $key => $valor) : ?>

        <tr scope="row">
            <td> <?php echo $valor['tarefas']; ?> </td>
            <td> <?php echo $valor['descricao']; ?> </td>
            <td> <?php echo exibe_data($valor['prazo']); ?> </td>
            <td> <?php echo exibe_prioridade($valor['prioridade']); ?> </td>
            <td> <?php echo exibe_conclusao($valor['tarefa_concluida'])?> </td>
            <td><a href="editar.php?id=<?php echo $valor['id']?>;">EDITAR</a></td>
        </tr>

    <?php endforeach;?>
    </table>