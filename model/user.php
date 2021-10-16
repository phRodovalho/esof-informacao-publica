<?php

Class User 
{

    ///pt-br criando os atributos privados
    /// en-us creating the private atributes
    private $name;
    private $email;
    private $password;
    private $user_type;
    private $birth_date;
    private $last_acess;
    private $location_idlocation;
    private $conexao;

  

    public function __construct()
    {
        //pt-br criando o objeto para conexão com o banco

        try{
            $this->conexao = new PDO('mysql:host=localhost;dbname=public_info','root',''); 
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    // pt-br atribuindo os valores com set 

    public function set_name($name){
        $this->name = $name;
    }

    public function set_email($email){
        $this->email = $email;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_usertype($user_type){
        $this->user_type = $user_type;
    }

    public function set_birthdate($birth_date){
        $this->birth_date = $birth_date;
    }

    public function set_lastacess($last_acess , $idUser){
        $this->last_acess = $last_acess;

        $sql = 'UPDATE user SET last_acess = ? WHERE idUser = ?';
        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $last_acess);
        $prepare->bindParam(2, $idUser);
        
        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function set_idlocation($location_idlocation){
        $this->location_idlocation = $location_idlocation;
    }

    //pt-br pegando os dados com get

    public function getname(){
        return $this->name;
    }

    public function getemail(){
        return $this->email;
    }

    public function getpassword(){
        return $this->password;
    }

    public function getuser_type(){
        return $this->user_type;
    }

    public function getbirth_date(){
        return $this->birth_date;
    }

    public function getlast_acess(){
        return $this->last_acess;
    }

    public function getid_location(){
        return $this->location_idlocation;
    }

    public function insert_user ( $name ,  $email ,  $password , 
     $user_type ,  $birth_date ,  $last_acess ,  $location_idlocation) {

    $sql = 'INSERT INTO user (name , email , password , user_type , birth_date , last_acess , location_idlocation) VALUES (?,?,?,?,?,?,?)';
    $prepare = $this->conexao->prepare($sql);

    $prepare->bindParam(1 , $name);
    $prepare->bindParam(2 , $email);
    $prepare->bindParam(3 , $password);
    $prepare->bindParam(4 , $user_type);
    $prepare->bindParam(5 , $birth_date);
    $prepare->bindParam(6 , $last_acess);
    $prepare->bindParam(7 , $location_idlocation);

    if($prepare->execute() == TRUE){
        return true;
    }
    else{
        return false;
    }
    

    }

    
    public function listar_users ()
    {

        $sql = 'SELECT * from user ';


        $users = [];

        //pt-br query executa a conexão e percorre o select e coloca no array
        foreach ($this->conexao->query($sql) as $key => $value) {
                        array_push($users, $value);
        }
     
        return $users;

    }

    

}

class Location{

    private $state;
    private $country;
    private $city;
    private $adress;
    private $district;
    private $latitude;
    private $longitude;

    private $conex;

    public function __construct()
    {
        try{
            $this->conex = new PDO('mysql:host=localhost;dbname=public_info','root','');
        }

        catch(Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function set_state($state){
        $this->state = $state;
    }

    public function set_country($country){
        $this->country = $country;
    }

    public function set_city($city){
        $this->city = $city;
    }

    public function set_adress($adress){
        $this->adress= $adress;
    }

    public function set_district($district){
        $this->district = $district;
    }

    public function set_latitude($latitude){
        $this->latitude = $latitude;
    }

    public function set_longitude($longitude){
        $this->longitude = $longitude;
    }

    //pt-br pegando os dados com get

    public function getstate(){
        return $this->state;
    }

    public function getcountry(){
        return $this->country;
    }

    public function getcity(){
        return $this->city;
    }

    public function getadress(){
        return $this->adress;
    }

    public function getdistrict(){
        return $this->district;
    }

    public function getlatitude(){
        return $this->latitude;
    }

    public function getlongitude(){
        return $this->longitude;
    }




    public function insert_location (string $state , string $country ,
    string $city, string $adress , string $district , string $latitude , string $longitude): int
    {

        $sql = 'INSERT INTO location (state , country , city , adress , district, 
        latitude ,  longitude) VALUES (?,?,?,?,?,?,?)';

        $prepare = $this->conex->prepare($sql);

        $prepare->bindParam(1 , $state);
        $prepare->bindParam(2 , $country);
        $prepare->bindParam(3 , $city);
        $prepare->bindParam(4 , $adress);
        $prepare->bindParam(5 , $district);
        $prepare->bindParam(6 , $latitude);
        $prepare->bindParam(7 , $longitude);


        if($prepare->execute() == TRUE){
            return true;
        }

        else{
            return false;
        }





    }


}
