<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("head.php") ?>
</head>

<body> 
    <?php include("navbar.php") ?>
    <div class="container panel panel-default" style="padding: 20px;">
        <div class=" title well text-center">
                <form action="login.php" method="POST"> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="input_pwd">
                    </div>
                   
                        <button type="submit" class="entrar" id="entrar" name="login">Submit</button>
            </form>
        </div>      
    </div>

<!-- Outro examplo para login
    <div class="container">
         <h2>Horizontal form</h2>
        <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

!-->
    <?php include("footer.php") ?>
</body>

</html>