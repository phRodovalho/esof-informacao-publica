<?php
require_once("banco.php");

Class Access_Point
{
    private $title;
    private $description;
    private $interAcces;
    private $idTypes;
    private $idLocation;

    //insert into access_point (title, description, internet_access, types_idtypes, location_idlocation) values ("Biblioteca SESI", "Biblioteca SESI Indústria do Conhecimento Telefone: (34) 3238-5168","Y", 4, 6);

    public function __construct()
    {
        //pt-br criando o objeto para conexão com o banco
        $banco = new Banco();
        $this->conexao = $banco->getConnection();
    }

    //set
    public function setTitle($title){
        $this->title = $title;
    }
    
    public function setDescription($description){
        $this->description = $description;
    }
    
    public function setInternetAcess($internA){
        $this->interAcces = $internA;
    }

    public function setIdTypes($idTypes){
        $this->idTypes = $idTypes;
    }

    public function setIdLocation($idLocation){
        $this->idLocation = $idLocation;
    }

    //get
    public function getTitle(){
        return  $this->title;
    }
    public function getDescription(){
        return  $this->description;
    }
    public function getInternetAccess(){
        return  $this->interAcces;
    }
    public function getIdTypes(){
        return  $this->idTypes;
    }
    public function getLocation(){
        return  $this->idLocation;
    }

    //CRUD
    //insert
    public function insertPoint($title, $description, $interAcces, $idTypes, $idLocation){
        $sql = 'INSERT INTO access_point (title, description, internet_access, types_idtypes, location_idlocation) VALUES (?, ?, ?, ?, ?)';
        
        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $title);
        $prepare->bindParam(2, $description);
        $prepare->bindParam(3, $interAcces);
        $prepare->bindParam(4, $idTypes);
        $prepare->bindParam(5, $idLocation);

        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }

    }
    //list
    public function listPoint(){
        $sql = 'select a.title, a.description, a.internet_access, t.type, l.adress, l.district, l.city, l.state, l.country from access_point a, types t, location l where a.types_idtypes = t.idtypes and a.location_idlocation = l.idlocation;'; 
        
        $point = [];

        foreach ($this->conexao->query($sql) as $value) {
            array_push($point, $value);
        }
        return $point;
    }

}

class Location
{
    private $state;
    private $country;
    private $city;
    private $adress;
    private $district;

    private $conex;

    public function __construct()
    {
        $banco = new Banco();
        $this->conex = $banco->getConnection();
    }

    public function set_state($state)
    {
        $this->state = $state;
    }

    public function set_country($country)
    {
        $this->country = $country;
    }

    public function set_city($city)
    {
        $this->city = $city;
    }

    public function set_adress($adress)
    {
        $this->adress = $adress;
    }

    public function set_district($district)
    {
        $this->district = $district;
    }

    public function set_latitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function set_longitude($longitude)
    {
        $this->longitude = $longitude;
    }

    //pt-br pegando os dados com get

    public function getstate()
    {
        return $this->state;
    }

    public function getcountry()
    {
        return $this->country;
    }

    public function getcity()
    {
        return $this->city;
    }

    public function getadress()
    {
        return $this->adress;
    }

    public function getdistrict()
    {
        return $this->district;
    }

    public function getlatitude()
    {
        return $this->latitude;
    }

    public function getlongitude()
    {
        return $this->longitude;
    }

    public function insert_location($state, $country, $city, $adress, $district)
    {

        $sql = 'INSERT INTO location (state , country , city , adress , district) VALUES (?,?,?,?,?)';
        
        $prepare = $this->conex->prepare($sql);

        $prepare->bindParam(1, $state);
        $prepare->bindParam(2, $country);
        $prepare->bindParam(3, $city);
        $prepare->bindParam(4, $adress);
        $prepare->bindParam(5, $district);

        if ($prepare->execute() == TRUE) {
            $last_id = $this->conex->lastInsertId();
            return $last_id;
        } else {
            return false;
        }
    }
}