<?php

/// teste de conexão usando outro script da internet 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = filter_input(INPUT_POST , "inputEmail" , FILTER_SANITIZE_STRING);
    $psw = filter_input(INPUT_POST , "input_pwd");
    $conexao = mysqli_connect("localhost" , "root" , "" , "public_inf" , 3306);


if (isset($entrar)) {

    $verifica = $query("SELECT * FROM user WHERE email =
    '$email' AND password = '$psw' ") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();

      }else{
        //setcookie("login",$login);
        //header("Location:index.php");

        echo "Logou";
      }
  }

}

?>