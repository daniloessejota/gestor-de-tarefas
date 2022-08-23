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
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    
    <div class="container">

        <!-- Título da página -->
        <div class="row">
            <div class="col-sm-12 mb-4 text-center">
            <h1 class="fw-bold pt-3"><?php echo ($tarefa['id'] > 0) ? 'Edição' : ''; ?></h1>
            </div>
        </div>
        
        <!-- Início do Formulário -->
        <div class="row">
            <div class="col-sm-6 col-md-7 img">
                <p>
                    Olá seja bem-Vindo! Eu sou o Alfred, seu gestor de tarefas, ao seu dispor! <br> Digite ao lado as tarefas que você quer fazer e vou anotar elas para você.
                </p>
                <img src="./assets/img/to-do-medio.png" class="img-fluid" alt="">
            </div> 

            <div class="col-sm-4 col-md-5 form">

                <form action="" method="post">
                    
                    <div class="row pt-3">

                        <!-- Input ID  - não deve ser visualizado -->
                        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

                        <!-- Input Tarefa  -->
                        <div class="">
                            <label for="tarefa" class="form-label fw-bold fs-4">Tarefa:</label>
                            <input type="text" name="tarefa" id="tarefa" placeholder="escreva aqui o que você quer fazer" value="<?php echo $tarefa['tarefas']; ?>"
                            class="form-control">
                        </div>

                    </div>

                    <div class="row pt-3">

                        <div class="col">
                        <!-- Input Prazo -->
                        <label for="prazo" class="form-label fw-bold fs-4">Prazo: <br>
                            <?php if ($tem_erros and array_key_exists('prazo', $erros_validacao)) : ?>
                                <span class="fw-light fs-6 text-danger"><?php echo $erros_validacao['prazo']; ?></span>
                            <?php endif; ?>
                        </label>

                        <input type="date" name="prazo" id="prazo" value="<?php echo $tarefa['prazo']; ?>"
                        class="form-control">
                        </div>

                    </div>

                    <div class="row pt-3">
                        <div class="col">
                            <!-- Input Prioridade -->
                            <fieldset>
                                <label for="prioridade" class="form-check-label fw-bold fs-4">Prioridade:</label>
                                
                                <div class="row justify-content-start pt-1">
                                    <!-- Baixa -->
                                    <div class="form-check-inline col-3">
                                        <input class="form-check-input" type="radio" name="prioridade" id="prioridade_baixa" value= 1 <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : ''; ?> >
                                        <label for="prioridade_baixa" class="form-check-label">baixa</label>
                                    </div>
                                    <!-- Média -->
                                    <div class="form-check-inline col-3">
                                        <input class="form-check-input" type="radio" name="prioridade" id="prioridade_media" value= 2 <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : ''; ?> >
                                        <label  for="prioridade_media" class="form-check-label">média</label>
                                    </div>
                                    
                                    <!-- Alta -->
                                    <div class="form-check-inline col-3">
                                        <input class="form-check-input"  type="radio" name="prioridade" id="prioridade_alta" value= 3 <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : ''; ?> >
                                        <label  for="prioridade_alta" class="form-check-label">alta</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Descrição -->
                    <div class="row pt-3">
                        <div class="col">
                            <label for="descricao" class="form-label fw-bold fs-4">Descrição: <span class="fw-light fs-6">(opcional)</span></label>
                            <textarea name="descricao" id="descricao" maxlength="80" placeholder="escreva os detalhes de sua tarefa" class="form-control" ><?php echo $tarefa['descricao']; ?></textarea>
                        </div>
                    </div>

                    <!-- Conclusão Check -->
                    <div class="row pt-3">

                        <div class="col">
                            <?php echo ($tarefa['tarefa_concluida'] == 1)  ?
                            '<input class="form-check-input" type="checkbox" name="tarefa_finalizada" id="tarefa_finalizada" value = 1 checked>' : '<input class="form-check-input" type="checkbox" name="tarefa_finalizada" id="tarefa_finalizada" value = 1>' ; ?>

                            <?php echo ($tarefa['tarefa_concluida'] == 1)  ? '<label for="tarefa_finalizada" class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>'  : '<label for="tarefa_finalizada" class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>'; ?>
                        </div>

                    </div>

                    <!-- Botão de Envio -->
                    <div class="row pt-3 pb-3">

                        <div class="col-9">
                            <?php echo ($tarefa['id'] > 0) ?
                            '<button class="btn col-form-label"><a href="index.php">Cancelar</a></button>' : ''; ?>
                        </div>
                        <div class="col-3">
                            <a href="#tabela"><input type="submit" id="tabela_resultado" class="btn btn-primary" value= "<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" ></a>
                        </div>
                        
                    </div>
                </form>
        
            </div>  
        </div>
            
    </div>

    <!-- Script JS BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>