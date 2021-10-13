<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include("head.php") ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        </head>
    <body>
    <?php include("navbar.php") ?>

            <div class="container panel panel-default" style="padding: 20px;">
                <div class=" title well text-center">
                     <nav class="navbar navbar-inverse">
                     <div class="container-fluid">
                     <div class="navbar-header">
                </div>
            </nav>

            <form action="ControllerCadastroUser" method="POST">
                    <div class="form-row">
                        <h1>Sing Up</h1>
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail">
                    </div>

                     <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="input_pwd">
                            <small id="passwordHelpInline" class="text-muted">
                            Must be 8-20 characters long.
                            </small>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="inputAddress">Nome</label>
                        <input type="text" class="form-control" id="input_name" placeholder="Mark Zuck ">
                    </div>
 
                   
                    <div class="form-group">
                        <label for="inputAddress2">State</label>
                        <input type="text" class="form-control" id="input_state" placeholder="Minas Gerais">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">Coutry</label>
                        <input type="text" class="form-control" id="input_coutry">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="input_city">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">Adress</label>
                        <input type="text" class="form-control" id="input_adress">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">District</label>
                        <input type="text" class="form-control" id="input_district">
                    </div>
                  
                    
                    <div class="form-group col-md-4">
                        <label for="input_state_user">User Type</label>
                        <select id="input_state_user" class="form-control">
                            <option selected>N</option>
                            <option>A</option>
                            <option>E</option>
                        </select>
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="inputdate">Date Birth</label>
                        <input type="date" class="form-control" id="input_date">
                    </div>
    <br>
    <br>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    <br>
                </form>

    <?php include("footer.php") ?>
</body>


</html>