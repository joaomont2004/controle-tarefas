<?php 

    function carregarTarefas($arquivo){
        if(!file_exists($arquivo)){
            return[];
        }
        $conteudo = file_get_contents($arquivo);
        return json_decode($conteudo, true);
    }

    function salvarTarefas($arquivo, $lista){
        $conteudo = json_encode($lista, JSON_PRETTY_PRINT);
        file_put_contents($arquivo, $conteudo);
    }

    function concluirTarefa(&$lista, $indice){
        if (isset($lista[$indice])) {
            $lista[$indice]["feita"]= true;
            return true;
        }
        return false;
    }

    function listarTarefasComIndice($lista){
        echo "Minhas Tarefas:\n";
        foreach ($lista as $indice => $tarefa) {
            $status = $tarefa["feita"] ? "[x]" : "[ ]";
            echo $indice . ". " . $status . " " . $tarefa["nome"] . "\n";
        }
    }

    function listarTarefas($lista){
        echo "Minhas Tarefas:\n";
        foreach ($lista as $tarefa) {
            $status = $tarefa["feita"] ? "[x]" : "[ ]";
            echo $status . " " . $tarefa["nome"] . "\n";
        }
    }
    
    function adicionarTarefa(&$lista, $nome){
        $lista[] = ["nome" => $nome, "feita" => false];
    }

    $arquivo = "tarefas.json";
    $tarefas = carregarTarefas($arquivo);
    $continuar = true;
 
    while($continuar){
    echo"\n --- MENU ---\n";
    echo"1. - Listar tarefas\n";
    echo"2. - Adicionar tarefas\n";
    echo"3. - Concluir tarfa\n";
    echo"4 - Sair\n";
    echo"Escolha uma opção: ";

    $opcao = trim(fgets(STDIN));

    if($opcao == 1){
        listarTarefas($tarefas);
    } elseif($opcao == 2){
        echo "Digite o nome da tarefa: ";
        $nomeTarefa = trim(fgets(STDIN));
        adicionarTarefa($tarefas, $nomeTarefa);
        salvarTarefas($arquivo, $tarefas);
        echo "Tarefa adicionada com sucesso!\n";
        listarTarefasComIndice($tarefas);
    } elseif($opcao == 3){
        listarTarefasComIndice($tarefas);
        echo "Digite o número da tarefa a concluir: ";
        $indice = (int) trim(fgets(STDIN));
        if (concluirTarefa($tarefas, $indice)) {
            salvarTarefas($arquivo, $tarefas);
            echo "Tarefa concluída!\n";
    } else {
        echo "Índice inválido.\n";
    }
    } elseif($opcao ==4 ){
        $continuar = false;
        echo "Saindo do programa...\n";
    } else {
        echo "Opção inválida. Tente novamente.\n";
    }
 }

