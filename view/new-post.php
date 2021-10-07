<!DOCTYPE html>
<html lang="en">

<head>    
    <link rel="stylesheet" type="text/css" href="style-blog.css" />
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
                <h4><small>CREATE POST</small></h4>
                <hr>
                <form class="form-horizontal" method="post" action="">
                    <label>Title</label>
                    <label>Body</label>
                    <label>Category</label>
                </form>

            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <p>Footer Text</p>
    </footer>

</body>

</html>
