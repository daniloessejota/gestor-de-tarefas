<!--  Formulário para Cadastro das Tarefas -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tarefas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- CCS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- CSS Local -->
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
    
    <div class="container-fluid">

        <!-- Cabeçalho da Página -->
        <header>
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-6 mb-2 text-center">
                <h1 class="fw-bold pt-3"><?php echo ($tarefa['id'] > 0) ? 'Edição' : ''; ?></h1>

                <p class="fs-4"><?php echo ($tarefa['id'] > 0) ? '' : '<span class="fs-3 fw-bolder">Olá, Seja Bem-Vindo!</span> <br> Eu sou o <span class="fst-italic fw-bolder">Alfred</span>, seu gestor de tarefas. Digite as tarefas que você quer fazer e vou anotar elas para você!'; ?></p>
                </div>
            </div>
        </header>
        
        <!-- Início do Formulário -->
        <div class="row justify-content-center">
            <div class="col-sm-4 col-md-6 form mb-5">

                <form action="" method="post">

                    <!-- Imagem do ínicio do Formulário -->
                    <div class="row justify-content-center">
                        <div class="col-sm-4 col-md-4 pt-3 pb-2"><img src="assets/img/to-do.svg" alt="ilustração de homem segurando um lápis gigante olhando para um calendário em suas costas"></div>
                    </div>

                    <div class="row pt-3">

                        <!-- Input ID  - não deve ser visualizado -->
                        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

                        <!-- Input Tarefa  -->
                        <div class="col-sm-8 col-md-8">
                            <label for="tarefa" class="form-label fw-bold">Tarefa:</label>
                            <input type="text" name="tarefa" id="tarefa" placeholder="escreva aqui o que você quer fazer" required value="<?php echo $tarefa['tarefas']; ?>" class="form-control">
                        </div>

                        <div class="col-sm-4 col-md-4">

                        <!-- Input Prazo -->
                        <label for="prazo" class="form-label fw-bold">Prazo: </label>

                        <input type="date" name="prazo" id="prazo" required value="<?php echo $tarefa['prazo']; ?>" class="form-control">

                        <?php if ($tem_erros and array_key_exists('prazo', $erros_validacao)) : ?>
                            <span class="fw-light fs-6 text-danger"><?php echo $erros_validacao['prazo']; ?></span>
                        <?php endif; ?>

                        </div>
                    </div> 
                               
                    <div class="row pt-3">
                        <div class="col-12">
                            <!-- Input Prioridade -->
                                <label for="prioridade" class="form-check-label fw-bold">Prioridade:</label>
                                
                                <div class="row pt-2">

                                    <!-- Baixa -->
                                    <div class="form-check-inline col-sm-3">
                                        <input class="form-check-input" type="radio" name="prioridade" id="prioridade_baixa" required value= 1 <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : ''; ?> >
                                        <label for="prioridade_baixa" class="form-check-label">baixa</label>
                                    </div>

                                    <!-- Média -->
                                    <div class="form-check-inline col-sm-3">
                                        <input class="form-check-input" type="radio" name="prioridade" id="prioridade_media" required value= 2 <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : ''; ?> >
                                        <label  for="prioridade_media" class="form-check-label">média</label>
                                    </div>
                                    
                                    <!-- Alta -->
                                    <div class="form-check-inline col-sm-3">
                                        <input class="form-check-input"  type="radio" name="prioridade" id="prioridade_alta" required value= 3 <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : ''; ?> >
                                        <label  for="prioridade_alta" class="form-check-label">alta</label>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <!-- Descrição -->
                    <div class="row pt-3">
                        <div class="col">
                            <label for="descricao" class="form-label fw-bold">Descrição: <span class="fw-light fs-6">(opcional)</span></label>

                            <textarea name="descricao" id="descricao" maxlength="80" placeholder="escreva os detalhes de sua tarefa" class="form-control" ><?php echo $tarefa['descricao']; ?>
                            </textarea>
                        </div>
                    </div>

                    <!-- Conclusão Check -->
                    <div class="row pt-3 pb-3">

                        <div class="col-sm-12 col-md-4">
                            <?php echo ($tarefa['tarefa_concluida'] == 1)  ?
                            '<input class="form-check-input" type="checkbox" name="tarefa_finalizada" id="tarefa_finalizada" value = 1 checked>' : '<input class="form-check-input" type="checkbox" name="concluida" id="tarefa_finalizada" value = 1>' ; ?>

                            <?php echo ($tarefa['tarefa_concluida'] == 1)  ? '<label for="tarefa_finalizada" class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>'  : '<label for="tarefa_finalizada" class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>'; ?>
                        </div>
                    </div>

                    <!-- Botão de Envio -->
                    <div class="row pt-3 pb-3 justify-content-end">
                        <div class="col-auto">
                            <?php echo ($tarefa['id'] > 0) ?
                            '<button type="button" class="btn btn-outline-primary fw-bold link"><a href="index.php">Cancelar</a></button>' : ''; ?>
                        </div>

                        <div class="col-auto">
                            <a><input type="submit" id="tabela_resultado" class="btn btn-primary fw-bold" value= "<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" ></a>
                        </div>
                    </div>
                    
                </form>
        
            </div>  
        </div>
            
    </div>

    <!-- Script JS BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha386-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>