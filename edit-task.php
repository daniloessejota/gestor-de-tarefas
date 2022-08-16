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
        
        <!-- Início do Formulário -->
        <div class="row">
            <div class="col-sm-12 border">

                <form action="" method="get">
                    <div class="row p-2">

                        <div>
                            <input type="hidden" name="id" value="<?php $value = $_GET['id']; ?>" >
                        </div>

                        <div class="mb-3 col-sm-4">
                            <label for="tarefa" class="form-label">Tarefa</label>
                            <input type="text" name="tarefa" id="tarefa" placeholder="escreva aqui o que você quer fazer"  class="form-control"
                            value = "<?php echo $value = $_GET['tarefas']; ?>" >
                        </div>

                        <div class="mb-3 col-sm-3">
                            <label for="prazo" class="form-label">Prazo:</label>
                            <input type="text" name="prazo" id="prazo" class="form-control"
                            value="<?php echo $value = $_GET['prazo']; ?>" >
                        </div>

                        <div class="mb-3 col-sm-5">
                            <label for="prioridade" class="form-check-label mb-3">Prioridade:</label>
                            <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="prioridade" id="prioridade" value="1" 
                                <?php echo $value = $_GET['prioridade'] == 'Baixa' ? 'checked' : ''; ?> >

                                <label for="prioridade_baixa" class="form-check-label">Baixa</label>
                            </div>

                            <form-check-inline>
                                <input class="form-check-input" type="radio" name="prioridade" id="prioridade" value="2" 
                                <?php echo $value = $_GET['prioridade'] == 'Média' ? 'checked' : ''; ?> >

                                <label  for="prioridade_media"  class="form-check-label">Média</label>
                            </form-check-inline>
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"  type="radio" name="prioridade" id="prioridade" value="3" 
                                <?php echo $value = $_GET['prioridade'] == 'Alta' ? 'checked' : ''; ?> >

                                <label  for="prioridade_alta"  class="form-check-label">Alta</label>
                            </div>
                        </div>

                    </div>

                    <div>
                        <label for="descricao" class="form-label">Descrição (opcional):</label>
                        <textarea name="descricao" id="descricao" maxlength="80" class="form-control" ><?php echo $value = $_GET['descricao']; ?></textarea>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="tarefa_finalizada" id="tarefa_finalizada" value="1" 
                        <?php echo $value = $_GET['concluida'] == 'SIM' ? 'checked' : ''; ?> >
                        <label class="form-check-label" for="tarefa_finalizada">tarefa finalizada</label>
                    </div>

                    <div class="row justify-content-end m-2">
                        <button type="submit" class="col-2 col-sm-2 btn btn-primary col-form-label">Atualizar</button>
                    </div>
        
            <div class="col-sm-3"></div>
        </div>
        </form>
        </div>
    </div>

    <!-- Script JS BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>