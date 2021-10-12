<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php") ?>
    <script src="https://cdn.tiny.cloud/1/yurkwx6m9mhihtylqvdycmktq2zl3kh9tq8eied6qhuzetqd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
</head>

<?php
session_start();
$_SESSION["userId"] = '4';
$conexao = mysqli_connect("localhost", "root", "santos1809", "public_information", 3306);
if ($conexao) {
    $query = "SELECT * FROM category";
    $select = mysqli_query($conexao, $query);
}
?>

<body>
    <?php include("navbar.php") ?>

    <div class="container panel panel-default">
        <div class="row">
            <div class="col-md card">
                <div class="text-center">
                    <h2>CREATE POST</h2>
                    <hr style="height:2px;background-color:gray">
                </div>

                <form class="form-horizontal" method="post" action="../controller/ControllerPost.php">

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input id="focusedInput" class="form-control input-lg" type="text" name="txtTitle" placeholder="Insert Post Title" required />

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea id="edit-post" class="form-control" name="txtBody" required style="height: 500px;">Write your Post body here</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-sm-1" for="category">Category:</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="category" required>
                                <option>Select category</option>
                                <?php while ($line = mysqli_fetch_array($select)) { ?>
                                    <option value="<?php echo $line['idcategory'] ?>"><?php echo $line['category'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <button class="btn btn-lg btn-success btn-block" type="submit">Finish and Save Post</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include("footer.php") ?>

    <script>
        tinymce.init({
            selector: '#edit-post'
        });
    </script>
</body>

</html>