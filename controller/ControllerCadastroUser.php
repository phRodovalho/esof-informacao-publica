<?php


/// testando conexão com o banco com script de outrs aulas, criando conexão cm o banco do 000webhost
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = filter_input(INPUT_POST , "inputEmail" , FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST , "input_name");
    $psw = filter_input(INPUT_POST , "input_pwd");
   // $data = filter_input(INPUT_POST , "input_date");
    //$usr_type = filter_input(INPUT_POST , "input_state_user");
    $conexao = mysqli_connect("localhost" , "id17668234_gessica" , "<j#3(=9)jm~FGzRN" , "id17668234_meusite" , 3306);
   // $conexao = mysqli_connect("localhost" , "root" , "" , "public_info" , 3306);
    //$conexao = mysqli_connect("localhost", "root", "", "meusite", 3306);

    if($conexao){
        $query = "INSERT INTO user (name , email , password) VALUES ('$name' , '$email' , '$psw' )";

        
        $insert = mysqli_query($conexao, $query);

        if($insert){
            echo "Inseriu";

        }
        
        else{

            echo "Erro na inserção";
        }
          
    }

    else{
        echo "-1";
    }


}





















/*
class registration_control{

    private $registration;

    public function __construct(){
        $this->registration = new Registration();
        $this->include();
    }


    /// incluindo informações do usuário
    private function include(){
        $this->registration->set_name($_POST['name']);
        $this->registration->set_email($_POST['email']);
        $this->registration->set_password($_POST['password']);
        $this->registration->set_type($_POST['user_type']);
        $this->registration->set_birth($_POST['birth_date']);
        $this->registration->set_last_acess(date('Y-m-d',strtotime($_POST['last_acess'])));
        $this->registration->set_state($_POST['state']);
        $this->registration->set_country($_POST['coutry']);
        $this->registration->set_city($_POST['city']);
        $this->registration->set_addres($_POST['addres']);
        $this->registration->set_district($_POST['district']);
       

        $result = $this->registration->include();
        if($result >= 1){
            echo "<script>alert('Registration Ok!');document.location='../view/cadastro.php'</script>";
        }else{
            echo "<script>alert('Error on save Registration!, please check the data');history.back()</script>";
        }
    }
}
        new registration_control();

        */
?>
