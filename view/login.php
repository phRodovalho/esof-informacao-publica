<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include("head.php") ?>
  <link rel="stylesheet" type="text/css" href="css/style-login.css" />
</head>

<body>
  <?php include("navbar-login.php") ?>

  <div class="container">
    <div class="row thera">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h1 class="text-center login-title"><b>Sign in to your <br> Public Information account</b></h1>
        <div class="account-wall">
          <img class="profile-img" src="img/img_avatar.png" alt="">
          <form class="form-signin" method="post" action="../controller/ControllerLogin.php">
            <input type="text" class="form-control" name="email"placeholder="Email" required autofocus>
            <input type="password" class="form-control" name="password"placeholder="Password" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
        <h3 class="text-center login-title">Don't have an account?</h3>
        <a href="create-account.php" class="text-center new-account btn btn-lg btn-default btn-block">Create an account </a>
      </div>
    </div>
  </div>
  <?php include("footer.php") ?>
</body>

</html>