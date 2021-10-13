<?php


/// tentando criar conexão para fazer uma busca utilizando exemplos antigos
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $pesquisa = filter_input(INPUT_GET, "txtBusca", FILTER_SANITIZE_STRING);

        //$conexao = mysqli_connect("localhost", "root", "", "meusite", 3306);
        $conexao = mysqli_connect("localhost" , "id17668234_gessica" , "<j#3(=9)jm~FGzRN" , "id17668234_meusite" , 3306);
        $resultado = new stdClass(); // criando um objeto generico (vazio)


        if($conexao){
            $query = "SELECT cpf, nome FROM usuarios WHERE nome LIKE  '%$pesquisa%'";
            $usuarios = mysqli_query($conexao, $query);

            if($usuarios){ /// se consulta der certo 
                $resultado->mensagem = mysqli_num_rows($usuarios); ///mostrar numero de linhas retornadas
//instacia um objeto na memoria, por isso uso a seta // crio o atributo mensagem // para indicar que não retornou nenguma linha

                while($linha = mysqli_fetch_assoc($usuarios)){ // percorre cada linha do rowset ($usuarios) e joga dentro 
                                                                                  // da variavel linha
                    $resultado->usuarios[] = $linha;
                }

            }else{   //consulta deu errado
                $resultado->mensagem = "0"; // indica que nao retornou nenhuma linha

            }
            mysqli_close($conexao);

        }else { 
            $resultado->mensagem = "-1"; // erro na conexão se entrar -1
        }

        header("Content-type: application/json");
        echo json_encode($resultado);// retorna o objeto $resultado como um json
    
    }


?>