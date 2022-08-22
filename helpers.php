<?php
    //Funções para Trabalhos Recorrentes

    //Formatando as prioridades para exibição ao usuário
    function exibe_prioridade ($valor) {

        switch ($valor) {
            case 1:
                echo 'Baixa';
                break;

            case 2:
                echo 'Média';
                break;

            case 3:
                echo 'Alta';
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
        echo ($valor == 0)  ? 'NÃO' : 'SIM'; 
    }

    //Confere se existe valores transmitidos via POST 
    function tem_post() {
        return count($_POST) > 0;
    }
?>