<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <title>Sugestion Comment</title>
    </head>


    <body>
            <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="home.php">Public Information</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="access-point.php">Access Point</a></li>
                            <li class="active"><a href="blog.php">Blog</a></li>
                            <li><a href="about.php">About us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                    </div>
            </nav>
            <div class= "container panel panel-default" style= "color: black;" >
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
                    <button type="submit" class="btn btn-dark" id = "send_botton">Send Sugestion</button>
                    
                </form>
            </div>
    </body>





</html>