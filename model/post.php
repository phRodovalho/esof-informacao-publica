<?php
//metodos de envio para o banco com PDO
class Post
{
    public $likes;

    private $title;
    private $description;
    private $userId;
    private $categoryId;
    private $idPost;
    private $conexao;

    public function __construct($title, $description, $userId, $categoryId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->userId = $userId;
        $this->categoryId = $categoryId;
        $this->likes = 0;

        //após instanciar os atributos, crio um obj PDO para conexão com banco 
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=public_information', 'root', '****');
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    //get
    public function getTitle()
    {
        return $this->title;
    }
    public function getCategoryId() : int
    {
        return $this->categoryId;
    }
    public function getUserId() : int 
    {
        return $this->userId;
    }
    public function getPostId() : int
    {
        return $this->idPost;
    }
    public function getDescription()
    {
        return $this->description;
    }

    //increment like +1
    public function likePost(int $idPost)
    {
        $this->likes = $this->likes + 1; //like+1 and save in database

        $sql = 'UPDATE post SET likes = ? WHERE idPost = ?';
        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $this->likes);
        $prepare->bindParam(2, $idPost);

        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //CRUD of Post's
    public function insert(string $title, string $description, string $data, int $like, int $idUser, int $idCategory): int
    {
        $sql = 'INSERT INTO post (title, description, date, likes, user_idUser, category_idcategory) VALUES (?,?,?,?,?,?)';
        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $title);
        $prepare->bindParam(2, $description);
        $prepare->bindParam(3, $data);
        $prepare->bindParam(4, $like);
        $prepare->bindParam(5, $idUser);
        $prepare->bindParam(6, $idCategory);

        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function list(): array
    {
        $sql = 'select * from post';

        $posts = [];

        foreach ($this->conexao->query($sql) as $key => $value) {
            array_push($posts, $value);
        }

        return $posts;
    }


    public function update(string $title, string $description, string $data, int $idCategory, int $idPost): int
    {
        $sql = 'UPDATE post SET title = ?, description = ?, data = ?, category_Idcategory = ?, WHERE idPost = ?';
        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $title);
        $prepare->bindParam(2, $description);
        $prepare->bindParam(3, $data);
        $prepare->bindParam(4, $idCategory);
        $prepare->bindParam(5, $idPost);

        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(int $idPost): int
    {
        $sql = 'delete from post where idpost = ?';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $idPost);

        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
