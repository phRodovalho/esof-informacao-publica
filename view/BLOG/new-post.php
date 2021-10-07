<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php") ?>
    <script src="https://cdn.tiny.cloud/1/yurkwx6m9mhihtylqvdycmktq2zl3kh9tq8eied6qhuzetqd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" type="text/css" href="style-blog.css" />
</head>

<?php
$conexao = mysqli_connect("localhost", "root", "santos1809", "public_information", 3306);
if ($conexao) {
    $query = "SELECT * FROM category";
    $select = mysqli_query($conexao, $query);
}
?>

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

    <div class="container panel panel-default">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4>Blog</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Home</a></li>
                    <li><a href="#section2">Rights and Duties</a></li>
                    <li><a href="#section3">Free Courses</a></li>
                    <li><a href="#section3">Others</a></li>
                    <li>
                        <button onclick="document.location='new-post.php'" type="button" class="btn btn-default" href="">
                            <span class="glyphicon glyphicon-text-size"></span> Create new post
                        </button>
                    </li>
                </ul><br>

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Blog..">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>

            </div>

            <div class="col-sm-9">
                <h4>CREATE POST</h4>
                <hr>
                <form class="form-horizontal" method="post" action="insere-post.php">
                    <div class="form-group row">
                        <label class=" col-sm-2 float-left">Title:</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="txtTitle" placeholder="Insert Post Title" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea id="edit-post" class="form-control" name="txtTitle">Write your Post body here</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-1">Category: </label>
                        <div class="col-sm-5">
                            <select class="form-control" name="category" id="categ" required>
                                <option>Select category</option>
                                <?php while ($line = mysqli_fetch_array($select)) { ?>
                                    <option value="<?php echo $line['id'] ?>"><?php echo $line['category'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1">
                            <input class="btn btn-success" type="submit" value="Finish and Save Post">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <p>Footer Text</p>
    </footer>
    <script>
        tinymce.init({
            selector: '#edit-post'
        });
    </script>
</body>

</html>