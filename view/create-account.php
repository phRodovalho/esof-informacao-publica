<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("head.php") ?>
</head>

<?php
    session_start();
    require_once("../model/user.php");


?>

<body>
    <?php include("navbar-login.php") ?>
    <div class="container panel panel-default" style=" margin-top: 70px;">
        <div class="panel-body">
            <div class="text-center">
                <h2>CREATE YOUR ACCOUNT</h2>
                <hr style="height:1px;background-color:gray">
            </div>
            <form action="../controller/ControllerCadastroUser.php" method="post">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Name</label>
                        <input type="text" class="form-control" id="input_name" name="name" placeholder="First and Last name">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputdate">Birth Date</label>
                        <input type="date" class="form-control" id="input_date" name="date">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="input-type-user">User Type</label>
                        <select id="input-type-user" name="type-user" class="form-control" required>
                            <option>Select your type user</option>
                            <option value="P">Pattern User</option>
                            <option value="A">Administrator</option>
                            <option value="W">Blog Writer</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Confirm your Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="emailC" placeholder="name@example.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword">
                        <small id="passwordHelpInline" class="text-muted">
                            Must be 8-20 characters.
                        </small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword"> Confirm your Password</label>
                        <input type="password" class="form-control" name="passwordC" id="inputPassword">
                        <small id="passwordHelpInline" class="text-muted">
                            Must be 8-20 characters.
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <h3 class="text-center">INSERT YOUR ADRESS</h3>
                        <hr>
                        <div class="form-group col-md-4">
                            <label for="input_country">Coutry</label>
                            <input type="text" class="form-control" name="country" id="input_coutry" placeholder="Country">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input_state">State</label>
                            <input type="text" class="form-control" name="state" id="input_state" placeholder="State">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input_city">City</label>
                            <input type="text" class="form-control" name="city" id="input_city" placeholder="City">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="input_adress">Adress</label>
                            <input type="text" class="form-control" id="input_adress" name="adress" placeholder="Adress complete and number">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input_district">District</label>
                            <input type="text" class="form-control" id="input_district" name="district" placeholder="District">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-offset-5 ">
                        <button class="btn btn-md btn-primary" type="submit">Create account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>

</html>