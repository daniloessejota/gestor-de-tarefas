<?php session_start(); ?>

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
        
        <!-- Início do Formulário -->
        <div class="row">
            <div class="col-sm-12 border">
                <form action="" method="get">
                    <div class="row p-2">

                        <div class="mb-3 col-sm-4">
                            <label for="tarefa" class="form-label">Tarefa</label>
                            <input type="text" name="tarefa" id="tarefa"placeholder="escreva aqui o que você quer fazer" class="form-control">
                        </div>

                        <div class="mb-3 col-sm-3">
                            <label for="prazo" class="form-label">Prazo (opcional):</label>
                            <input type="date" name="prazo" id="prazo" class="form-control">
                        </div>

                        <div class="mb-3 col-sm-5">
                            <label for="prioridade" class="form-check-label mb-3">Prioridade:</label>
                            <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="prioridade" id="prioridade" value="1">
                                <label for="prioridade_baixa" class="form-check-label">Baixa</label>
                            </div>

                            <form-check-inline>
                                <input class="form-check-input" type="radio" name="prioridade" id="prioridade" value="2">
                                <label  for="prioridade_media"  class="form-check-label">Média</label>
                            </form-check-inline>
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"  type="radio" name="prioridade" id="prioridade" value="3">
                                <label  for="prioridade_alta"  class="form-check-label">Alta</label>
                            </div>
                        </div>

                    </div>

                    <div>
                        <label for="descricao" class="form-label">Descrição (opcional):</label>
                        <textarea name="descricao" id="descricao" maxlength="80" class="form-control" ></textarea>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="tarefa_finalizada" id="tarefa_finalizada" value="1">
                        <label class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>
                    </div>

                    <div class="row justify-content-end m-2">
                        <button type="submit" class="col-2 col-sm-2 btn btn-primary col-form-label">Cadastrar</button>
                    </div>
        
            <div class="col-sm-3"></div>
        </div>

        <!-- Apresentando as tarefas cadastradas em uma tabela  -->
        <table class="mt-3 table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Tarefas</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Prazo</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Concluída</th>
                </tr>
            </thead>

            <?php
                include ("tasks.php");  

                foreach ($tarefas as $key => $valor) : ?>
                    <tr scope="row">
                        <td> <?php echo $valor['tarefas']; ?> </td>
                        <td> <?php echo $valor['descricao']; ?> </td>
                        <td> <?php echo exibe_data($valor['prazo']); ?> </td>
                        <td> <?php echo exibe_prioridade($valor['prioridade']); ?> </td>
                        <td> <?php echo exibe_conclusao($valor['tarefa_concluida']); ?> </td>
                    </tr>
                
                <?php endforeach;?>

        </table>

        </form>
        </div>
    </div>

    <!-- Script JS BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>