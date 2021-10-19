<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("helper/head.php");
    session_start(); ?>
</head>

<body>
    <?php include("helper/navbar.php") ?>
        <div class="container">
          <h3>Control User</h3>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">Create new User</a></li>
                    <li><a href="#">Edit User</a></li>
                    <li><a href="#">Find User</a></li>
                    <li><a href="#">Delete User</a></li>
                </ul>
        </div>  
        <?php include("helper/footer.php") ?>
</body>

</html>