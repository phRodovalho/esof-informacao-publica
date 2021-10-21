<?php
session_start();
require_once("../model/access_point.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (filter_input(INPUT_POST, "pointOp") == 1) { //insert
        echo $title = filter_input(INPUT_POST, "txttitle");
        echo $internetA = filter_input(INPUT_POST, "internetA");
        echo $type = filter_input(INPUT_POST, "type");
        echo $descrip = filter_input(INPUT_POST, "descrip");
        
        echo $country = filter_input(INPUT_POST, "txtCountry");
        echo $state = filter_input(INPUT_POST, "txtState");
        echo $city = filter_input(INPUT_POST, "txtCity");
        echo $adress = filter_input(INPUT_POST, "txtAdress");
        echo $district = filter_input(INPUT_POST, "txtDistrict");

        //primeiro passo é inserir a localização pois para inserir o accessPoint é necessario o id da localização
        $location = new Location();
        $idlocation = $location->insert_location($state, $country, $city, $adress, $district);

        $accessPoint = new Access_Point();
        if($accessPoint->insertPoint($title, $descrip, $internetA, $type, $idlocation) == true){
            echo "<script type='text/javascript'>alert('Access Point saved successfully!');window.location.href = '../view/home.php';</script>";
        }echo "<script type='text/javascript'>alert('AccessPoint error, try again!');window.location.href = '../view/home.php';</script>";

    }else if (filter_input(INPUT_POST, "pointOp") == 2) { //delete
        //delete

    }
}