<?php

session_start();

require_once("../model/user.php");

/// teste de conexão usando outro script da internet 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = filter_input(INPUT_POST , "email" , FILTER_SANITIZE_STRING);
    $psw = filter_input(INPUT_POST , "password");


    $user_login = new User();
    
    
    $array = $user_login->listar_users();
    ///var_dump($array);
    foreach ($array as $key => $value) {
      echo "($email)";
      echo $array['email'];
      $aux1 = strcmp($array['email'] , $email);

      $aux2 = strcmp($array['password'] , $psw);

      echo $aux1;
      echo $aux2;

      if($aux1 == 0 && $aux2 ==0){
        $_SESSION['idUser'] = $array['idUser'];
        $_SESSION['nameUser'] = $array['name'];
        $_SESSION['emailUser'] = $array['email'];
        $_SESSION['passwordUser'] = $array['password'];
        $_SESSION['userTypeUser'] = $array['usertype'];
        $_SESSION['birth_dateUser'] = $array['birth_date'];
        $_SESSION['lastAcessUser'] = $array['lastacess'] ;
        // pt-br setando o ultimo acesso e relacionando com usuario da sessão
        $user_login->set_lastacess($array['lastacess'] , $array['idUser']);
        $_SESSION['idLocationUser'] = $array['location_idlocation'] ;

        echo "<script type='text/javascript'>alert('Loading....!')
        ;window.location.href = '../view/home.php';</script>"; 
      }
      else {
        echo "<script type='text/javascript'>alert('Access not allowed, check your data!')
        ;window.location.href = '../view/login.php';</script>";

      }

    }
  
 
}
/*
if (isset($entrar)) {

    $verifica = $query("SELECT * FROM user WHERE email =
    '$email' AND password = '$psw' ") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();

      }else{
        echo "Logou";
      }
  }

}
*/

?>
