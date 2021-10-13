<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php") ?>
</head>

<body>
    <?php
    include("navbar.php");
    require_once("../model/post.php");

    $post = new Post();
    $all = $post->list();


    ?>

    <div class="container">
        <div class="row">
            <div class="leftcolumn">
                <?php
                foreach ($all as $key => $value) {
                    $dt = date_create($value['date']); //criando obj tipo data para formatar 
                    /*$descr = strip_tags($value['description']);

                    if(strlen($value['description']) > 500){
                        $descr =  substr($value['description'], 0, 500);
                    }else $descr = $value['description'];
                    */
                    echo '<div class="card">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="text-center">' . strtoupper($value['title']) . '</h2>
                                <hr>
                                <h5>
                                    <div class="row">
                                        <div class="col-sm-11 text-left"><b>' . date_format($dt, 'l, d-m-Y') . '</b></div>
                                        <div class="col-sm-1">
                                            <span class="glyphicon glyphicon-heart"></span> ' . $value['likes'] . '
                                        </div>
                                    </div>
                                </h5>
                            </div>
                            <div class="panel-body">
                                <p>
                                ' . $value['description'] . '
                                </p>
                            </div>
                            <div class="panel-footer">
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-info btn-sm">
                                        <span class="glyphicon glyphicon-comment"></span> Comment
                                    </a>
                                    <a href="#" class="btn btn-info btn-sm">Like
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                ?>
                
            </div>
            <div class="rightcolumn">
                <div class="card">
                    <h2>About Us</h2>
                    <div class="fakeimg" style="height:100px;">Image</div>
                    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
                </div>
                <div class="card">
                    <h3>Popular Post</h3>
                    <div class="fakeimg">Image</div><br>
                    <div class="fakeimg">Image</div><br>
                    <div class="fakeimg">Image</div>
                </div>
                <div class="card">
                    <h3>Follow Me</h3>
                    <p>Some text..</p>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>

</body>

</html>