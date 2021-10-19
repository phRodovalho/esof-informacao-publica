<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("helper/head.php");
    session_start(); ?>
</head>


<body>
    <?php include("helper/narbar.php"); ?>

    <div class="container panel panel-default" style="color: black;">
        <form method="POST" id="id_form">

            <div class="mb-3">

                <label for="exampleFormControlTextarea1" class="form-label">Sugestion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Text here your sugestion"></textarea>
                <!--
                            pt-br: habilitando o campo de sugestão
                            en : enabling the sugestion field
                            !-->
            </div>

            <!--
                     pt-br: botão do tipo subbmit com estilo bootstrap
                     en : Subbmit button with bootstrap style
                     !-->
            <button type="submit" class="btn btn-dark" id="send_botton">Send Sugestion</button>

        </form>
    </div>
    <?php include("helper/footer.php") ?>
</body>

</html>