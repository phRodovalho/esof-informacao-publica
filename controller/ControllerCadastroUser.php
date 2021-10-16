<?php
session_start();

require_once("../model/user.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //pt-br relacionando as váriaveis input do formulário com as váriaveis do php - User

    $name_usr = filter_input(INPUT_POST , "name");
    $email_usr = filter_input(INPUT_POST , "email" , FILTER_SANITIZE_STRING);
    $psw = filter_input(INPUT_POST , "password");
    $psw_confirm = filter_input(INPUT_POST, "passwordC");
    $date_birth = filter_input(INPUT_POST , "date");
    $usr_type = filter_input(INPUT_POST , "type-user");
    
    if($psw <> $psw_confirm){
        echo "<script type='text/javascript'>alert('The passwords are not the same!')
        ;window.location.href = '../view/create-account.php';</script>";
    }
    else if($email_usr <> $email_usr){
        // falta finalizar 
    }
    else{

    //pt-br inserindo valores do formulário para o banco
    $user = new User();
    $user->set_name($name_usr);
    $user->set_email($email_usr);
    $user->set_password($psw);
    $user->set_usertype($usr_type);
    $user->set_birthdate($date_birth);

    // pt-br pegando o dia e hora automaticamente da sessão
    $last_acess = new DateTime();
    $last_a = $last_acess->format('Y-m-d H:i:s');

    //pt-br relacionando as váriaveis input do formulário com as váriaveis do php - Location
    $state_usr = filter_input(INPUT_POST , "state");
    $country_usr = filter_input(INPUT_POST , "country" , FILTER_SANITIZE_STRING);
    $city_usr = filter_input(INPUT_POST , "city");
    $adress_usr = filter_input(INPUT_POST , "adress");
    $district_usr = filter_input(INPUT_POST , "district");
     
    
    //pt-br inserindo valores do endereço do formulário para o banco
    $loc = new Location();
    $loc->set_state($state_usr);
    $loc->set_country($country_usr);
    $loc->set_city($city_usr);
    $loc->set_adress($adress_usr);
    $loc->set_district($district_usr);

    
    //pt-br Chamando as funções de inseir usuário e location, passando os parâmetros da função
    if( $user->insert_user( $user->getname() , $user->getemail() , 
    $user->getpassword() , $user->getuser_type() , $user->getbirth_date() ,
    $last_a , 3)  == true && $loc->insert_location($loc->getstate(), $loc->getcountry(), $loc->getcity(), 
    $loc->getadress(), $loc->getdistrict(), 
    "latitude" , "longitude")  == true  )
    {
        echo "<script type='text/javascript'>alert('Account created successfully!')
        ;window.location.href = '../view/home.php';</script>"; 
    }

    else{
        echo "<script type='text/javascript'>alert('Error registering, please try again');window.location.href = '../view/create-account.php';</script>";
    }

   

    
}



}

else{
    echo "<script type='text/javascript'>alert('Error 404!')
        ;window.location.href = '../view/home.php';</script>"; 
}







?>
