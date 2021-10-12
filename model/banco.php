<?php
//Esta classe precisa ser alterada para conexão via PDO
include("../init.php");
class Banco{

    private $mysqli;

    public function __construct()
    {
        $this->conexao();
    }
   
    private function conexao()
    {
        $this->mysqli = new mysqli(BD_SERVER, BD_USER , BD_PASSWORD, BD_DATABASE);
    }

    public function setPost($title, $description, $date, $likes,$userId,$categoryId){
        $stmt = $this->mysqli->prepare("INSERT INTO post ('title', 'description', 'date','likes', 'user_idUser', 'category_idcategory') VALUES (?,?,?,?,?,?)");
        //insert into post (title, description, date, likes, user_idUser, category_idcategory) values ("Um exemplo de titulo", "Um exemplo de corpo de publicação", now(),0,3,6);
        $stmt->bind_param("ssssss",$title, $description, $date,$likes, $userId, $categoryId);    
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }
}










?>