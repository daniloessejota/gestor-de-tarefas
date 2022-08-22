<!--  Formulário para Cadastro das Tarefas -->

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

        <!-- Título da página -->
        <div class="row">
            <div class="col-sm-12 mb-4 text-center">
                <?php echo ($tarefa['id'] > 0) ? '<h1>Edição</h1>' : '<h1>Gestor de Tarefas</h1>'; ?>
            </div>
        </div>
        
        <!-- Início do Formulário -->
        <div class="row">
            <div class="col-sm-12 border">

                <form action="" method="post">
                    
                    <div class="row p-2">
                        
                        <!-- Input ID  - não deve ser visualizado -->
                         <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

                        <!-- Input Tarefa  -->
                        <div class="mb-3 col-sm-4">
                            <label for="tarefa" class="form-label">Tarefa</label>
                            <input type="text" name="tarefa" id="tarefa" placeholder="escreva aqui o que você quer fazer" value="<?php echo $tarefa['tarefas']; ?>"
                            class="form-control">
                        </div>

                        <div class="mb-3 col-sm-3">
                            
                            <!-- Input Prazo -->
                            <label for="prazo" class="form-label">Prazo (opcional):
                                <?php if ($tem_erros and array_key_exists('prazo', $erros_validacao)) : ?>
                                    <span><?php echo $erros_validacao['prazo']; ?></span>
                                <?php endif; ?>

                            <input type="date" name="prazo" id="prazo" value="<?php echo $tarefa['prazo']; ?>"
                            class="form-control">
                            </label>

                        </div>

                        <div class="mb-3 col-sm-5">

                            <!-- Input Prioridade -->      
                            <label for="prioridade" class="form-check-label mb-3">Prioridade:</label>
                            <br>

                            <!-- Baixa -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="prioridade" id="prioridade_baixa" value= 1 <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : ''; ?> >

                                <label for="prioridade_baixa" class="form-check-label">Baixa</label>
                            </div>

                            <!-- Média -->
                            <form-check-inline>
                                <input class="form-check-input" type="radio" name="prioridade" id="prioridade_media" value= 2 <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : ''; ?> >
                                <label  for="prioridade_media" class="form-check-label">Média</label>
                            </form-check-inline>
                            
                            <!-- Alta -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"  type="radio" name="prioridade" id="prioridade_alta" value= 3 <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : ''; ?> >
                                <label  for="prioridade_alta" class="form-check-label">Alta</label>
                            </div>

                        </div>

                    </div>

                    <!-- Descrição -->
                    <div>
                        <label for="descricao" class="form-label">Descrição (opcional):</label>
                        <textarea name="descricao" id="descricao" maxlength="80" class="form-control" ><?php echo $tarefa['descricao']; ?></textarea>
                    </div>

                    <!-- Conclusão Check -->
                    <div class="form-check mt-3">

                        <?php echo ($tarefa['tarefa_concluida'] == 1)  ?
                        '<input class="form-check-input" type="checkbox" name="tarefa_finalizada" id="tarefa_finalizada" value = 1 checked>' : '<input class="form-check-input" type="checkbox" name="tarefa_finalizada" id="tarefa_finalizada" value = 1>' ; ?>

                        <?php echo ($tarefa['tarefa_concluida'] == 1)  ? '<label for="tarefa_finalizada" class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>'  : '<label for="tarefa_finalizada" class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>'; ?>

                    </div>

                    <!-- Botão de Envio -->
                    <div class="row justify-content-end m-2">

                        <?php echo ($tarefa['id'] > 0) ?
                        '<button class="col-2 col-sm-2 btn btn-primary col-form-label"><a href="index.php">Cancelar</a></button>' : ''; ?>

                        <input type="submit" value= "<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" class="col-2 col-sm-2 btn btn-primary col-form-label">
                    </div>
                
                </form>
        
            </div>
        </div>
    </div>

    <!-- Script JS BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>