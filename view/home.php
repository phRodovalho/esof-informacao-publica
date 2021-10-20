<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("helper/head.php");
    session_start(); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <?php include("helper/navbar.php");
    require_once("../model/access_point.php"); ?>
    <div class="container panel panel-default" style="padding: 20px;">
        <div class=" title well text-center">
            <h1>
                <span> Access Point
            </h1>
        </div>

        <div class="panel-body row p-2">

            <table id="accessPoint" class="display" style="width:98%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Internet Acess</th>
                        <th>Type</th>
                        <th>Adress</th>
                        <th>District</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $accessPoint = new Access_Point();

                    $point = $accessPoint->listPoint();

                    foreach ($point as $key => $value) {
                        $title = $value['title'];
                        $description = $value['description'];
                        $internetAcess = $value['internet_access'];
                        $type = $value['type'];
                        $adress = $value['adress'];
                        $district = $value['district'];
                        $city = $value['city'];
                        $state = $value['state'];
                        $country = $value['country'];

                        echo "
                        <tr>
                            <td>$title</td>
                            <td>$description</td>
                            <td>$internetAcess</td>
                            <td>$type</td>
                            <td>$adress</td>
                            <td>$district</td>
                            <td>$city</td>
                            <td>$state</td>
                            <td>$country</td>
                         </tr>";
                    }


                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Internet Acess</th>
                        <th>Type</th>
                        <th>Adress</th>
                        <th>District</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <?php
        if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'A'){
        echo '<div class="panel-body row">
            <h3>Admin Space</h3>
            <div class="btn-group btn-group-justified">
                <a href="accessPoint-insert" class="btn btn-primary">Insert new Access Point</a>
                <a href="accessPoint-update" class="btn btn-primary">Update Access Point</a>
                <a href="accessPoint-delete" class="btn btn-primary">Delete Access Point</a>
            </div>
        </div>';
        }
        ?>
    </div>
    <?php include("helper/footer.php") ?>
    <script>
        $(document).ready(function() {
            $('#accessPoint').DataTable();
        });
    </script>
</body>

</html>