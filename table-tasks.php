<!--  Tabela para exibição das Tarefas Cadastradas -->

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tarefas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- CCS BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS Local -->
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    
    <div class="container">
    <h1 class="titles fw-bold">Tarefas</h1>

    <div class="table-responsive">
        <table class="mt-3 table table-striped table-bordered align-middle" id="tabela">
            <thead class="text-center">
                <tr>
                    <th scope="col">Tarefas</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Prazo</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Concluída</th>
                    <th scope="col" colspan="2">Opções</th>
                </tr>
            </thead>
        <?php
            foreach ($tarefas as $key => $valor) : ?>
            <tr scope="row">
                <td class="fw-bold"> <?php echo $valor['tarefas']; ?> </td>
                <td> <?php echo $valor['descricao']; ?> </td>
                <td> <?php echo exibe_data($valor['prazo']); ?> </td>
                <td> <?php echo exibe_prioridade($valor['prioridade']); ?> </td>
                <td> <?php echo exibe_conclusao($valor['tarefa_concluida'])?> </td>

                <td class="text-center">
                    <a href="edit-tasks.php?id=<?php echo $valor['id'];?>" class="editar p-1"><i class="bi bi-pencil-square pe-2"></i>EDITAR</a>
                </td>
                
                <td class="text-center">
                    <a href="remove-tasks.php?id=<?php echo $valor['id'];?>" class="excluir p-1 fw-bold"><i class="bi bi-trash pe-2"></i> EXCLUIR</a>
                </td>

            </tr>
        <?php endforeach;?>
        </table>
    </div>