<!DOCTYPE html>
<html lang="en">

<!-- exemplo de ex de sala que eu usei para testar problemas com o banco IGNORAR ESSA PÁG !-->

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style_login.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Bora buscar ? </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="input-group mb-3">
                    <input type="text" id="txtBusca" name="txtBusca" placeholder="Digite o nome a ser buscado" class="form-control">
                    <input type="button" id="botaoBuscar" value="Buscar" class="btn btn-primary">
                </div>
            </div>
        </div>
        <div class="row">
            <div id="mensagem" class="col-sm alert d-none" role="alert"></div>
            <div id="tabelaDiv" class="col-sm d-none">
                <table class="table">
                    <thead>
                        <tr>
                            <th scole="col">CPF</th>
                            <th scole="col">NOME</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function() {
        $("#botaoBuscar").click(function() {
            $.ajax({
                method: "POST",
                url: "ControllerList-User.php",
                data: $("#txtBusca").serialize(),
                dataType: "json",
                success: function(retorno) {
                    if (retorno.mensagem == "-1") {
                        var msg = "Erro ao conectar com banco de dados.";
                        $("#tabelaDiv").addClass("d-none");
                        $("#mensagem").addClass("alert-danger");
                        $("#mensagem").html(msg);
                        $("#mensagem").removeClass("d-none");
                    } else if (retorno.mensagem == "0") {
                        var msg = "Nenhum usuario encontrado com o nome informado";

                        $("#tabelaDiv").addClass("d-none");
                        $("#mensagem").addClass("alert-warning");
                        $("#mensagem").html(msg);
                        $("#mensagem").removeClass("d-none");
                    } else {
                        $("#mensagem").addClass("d-none");
                        $("#tabelaDiv").find("tbody").html(""); //limpando os dados da tabela

                        var tabela = $("#tabelaDiv").find("tbody");
                        $.each(retorno.usuarios, function(key, item) {
                            $("<tr>").append(
                                $("<td>").text(item.cpf),
                                $("<td>").text(item.nome)
                            ).appendTo($(tabela));
                        });

                        $("#tabelaDiv").removeClass("d-none");
                    }
                },
                error: function(retornoErro) {
                    var msg = "Error 404 no servidor.";

                    $("#tabelaDiv").addClass("d-none");
                    $("#mensagem").addClass("alert-danger");
                    $("#mensagem").html(msg);
                    $("#mensagem").removeClass("d-none");
                }

            });
        });
    });
</script>



</html>