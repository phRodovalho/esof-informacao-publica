<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("helper/head.php");
    session_start(); ?>
</head>

<body>
    <?php include("helper/navbar.php") ?>
    <div class="container panel panel-default" style="padding: 20px;">


        <div class="container">
            <div class="jumbotron">
                <h2 class="display-3 text-center">Quem Somos</h2>
                <h6 class="text-monospace">
                    <br></br>
                    Este site foi desenvolvido entre os alunos da Universidade Federal de Uberlândia e a Middle Tennessee State University,
                    tem como objetivo ajudar a
                    resolver os 11 objetivos de desenvolvimento sustentável da ONU reunindo informações básicas sobre os direitos de todo cidadão.
                </h6>

            </div>
            <!-- 
                Criando seção dos parceiros com seus respectivos tamanhos de colunas    
            !-->
            <section id="parceiros">
                <div class="container-fluid text-center margin ">
                    <h3 class="margin">DEV's</h3>
                    <div class="container ">
                        <div class="row">
                            <!--  Coluna media mg, lg grande, sm smal-->
                            <div class="col-md-6">
                                <img src="img/gess.jpg" width="80%" class="img-circle">
                                <div class="btn-group but">
                                    <br>
                                    <p>Géssica Santos</p>
                                    <button type="button" class="btn btn-primary">
                                        <a href="https://github.com/GessicaS0" target="_blank">Github</a>
                                    </button>

                                    <button type="button" class="btn btn-primary">
                                        <a href="https://www.linkedin.com/in/g%C3%A9ssica-santos-47b7911b3/" target="_blank">Linkedin</a>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <img src="img/ph.jpg" width="80%" class="img-circle">
                                <div class="btn-group but">
                                    <br>
                                    <p>Phelipe Rodovalho</p>
                                    <button type="button" class="btn btn-primary">
                                        <a href="https://github.com/phRodovalho" target="_blank">Github</a>
                                    </button>

                                    <button type="button" class="btn btn-primary">
                                        <a href="https://www.linkedin.com/in/phelipe-rodovalho-ufu/" target="_blank">Linkedin</a>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
    <?php include("helper/footer.php") ?>


</body>

</html>