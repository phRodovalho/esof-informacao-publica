<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct()
    {
        $this->conexao();
    }
    
    private function conexao()
    {
        $this->mysqli = new mysqli(BD_SERVER, BD_USER , BD_PASSWORD, BD_DATABASE);
    }

    //crud of Post's
    public function setPost($title, $description,$userId,$categoryId){
        $stmt = $this->mysqli->prepare("INSERT into post ('title', 'description', 'date', 'user_idUser', category_idcategory) values ($title, $description , now(), $userId, $categoryId);");
        $stmt->bind_param("ss",$title, $description,$userId,$categoryId);    
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }

    public function getPost(){
        $result = $this->mysqli->query("SELECT * FROM post");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }
    public function getCategory(){
        $result = $this->mysqli->query("SELECT * FROM category");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }

    public function deletePost($idPost){
        if($this->mysqli->query("DELETE FROM `post` WHERE `id` = '$idPost';")== TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function updatePost(){

    }

    //crud user


}










?>