<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("head.php") ?>
</head>


<body>
    <?php
    include("navbar.php");
    ?>

    <div class="container panel panel-default" style="color: Black;">
        <form method="post" id="id_form">

            <div class="mb-3">

                <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Text here your comment"></textarea>

            </div>

            <button type="submit" class="btn btn-dark">Send Comment</button>

        </form>
    </div>
    <?php include("footer.php") ?>
</body>

</html>