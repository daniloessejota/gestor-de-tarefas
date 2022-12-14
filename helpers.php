<?php
    //Funções para Trabalhos Recorrentes

    //Formatando as prioridades para exibição ao usuário
    function exibe_prioridade ($valor) {

        switch ($valor) {
            case 1:
                echo '<span class="baixa fw-bold">BAIXA</span>';
                break;

            case 2:
                echo '<span class="media fw-bold">MÉDIA</span>';
                break;

            case 3:
                echo '<span class="alta fw-bold">ALTA</span>';
                break;
        }

    }

    //Formatando as datas para exibição do usuário
    //Por meio de um objeto
    function exibe_data ($data) {
        if ($data == "" or $data == "0000-00-00") {
            return "";
        } 

        $objeto_data = DateTime::createFromFormat('Y-m-d', $data);

        return $objeto_data -> format('d/m/Y');
    }

    //Formatando o a conclusão para leitura do usuário
    function exibe_conclusao($valor) {
        echo ($valor == 0)  ? '<span class="alta fw-bold">NÃO</span>' : '<span class="tarefa-concluida fw-bold">SIM</span>'; 
    }

    //Confere se existe valores transmitidos via POST 
    function tem_post() {
        return count($_POST) > 0;
    }
?>