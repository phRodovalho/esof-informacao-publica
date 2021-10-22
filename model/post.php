<?php
//metodos de envio para o banco com PDO
require_once("banco.php");
class Post
{
    public $likes = 0;

    private $title;
    private $description;
    private $userId;
    private $categoryId;
    private $idPost;
    private $conexao;

    public function __construct($idPost = null)
    {
        //após instanciar os atributos, crio um obj PDO para conexão com banco 
        $banco = new Banco();
        $this->conexao = $banco->getConnection();
    
        if ($idPost != null) { //se instaciar a classe com idPost set as variaveis 
            $sql = "Select * from post where idPost = $idPost";

            foreach ($this->conexao->query($sql) as $value) {

                $this->title = $value['title'];
                $this->description = $value['description'];
                $this->userId = $value['user_idUser'];
                $this->categoryId = $value['category_idcategory'];
                $this->idPost = $value['idpost'];
                $this->likes = $value['likes'];
            }
        }
    }
    //increment like +1
    public function likePost(): int
    {
        if ($this->idPost != null) {
            $sql = 'UPDATE post SET likes = ? WHERE idPost = ?';
            $prepare = $this->conexao->prepare($sql);

            $this->likes = $this->likes + 1; //like+1 and save in database

            $prepare->bindParam(1, $this->likes);
            $prepare->bindParam(2, $this->idPost);


            if ($prepare->execute() == true) {
                return $this->likes; //se der certo então retorno a quantidade de likes
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    //set
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
    //get
    public function getTitle()
    {
        return $this->title;
    }
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }
    public function getPostId(): int
    {
        return $this->idPost;
    }
    public function getDescription()
    {
        return $this->description;
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

    public function list($limit, $offset): array
    {
        $sql = "select * from post order by date desc limit $limit offset $offset ";


        $posts = [];

        foreach ($this->conexao->query($sql) as $key => $value) {
            array_push($posts, $value);
        }

        return $posts;
    }

    public function listPopular()
    {
        $sql = "select idpost, title, likes from post order by likes desc limit 5; ";

        $posts = [];

        foreach ($this->conexao->query($sql) as $key => $value) {
            array_push($posts, $value);
        }

        return $posts;
    }

    public function listAllPost()
    {
        $sql = "SELECT p.idpost, p.title, p.description, p.date, p.likes, c.category, u.name FROM post p, category c, user u WHERE p.category_idcategory = c.idcategory and p.user_idUser = u.idUser";

        $posts = [];

        foreach ($this->conexao->query($sql) as $key => $value) {
            array_push($posts, $value);
        }

        return $posts;
    }

    public function listOnePost($idPost)
    {
        $sql = "select * from post where idpost = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$idPost]);
        $post = $stmt->fetch();

        return $post;
    }

    public function countPosts()
    {
        $sql = "SELECT COUNT(*) FROM post ";

        $prepare = $this->conexao->query($sql);
        return $prepare->fetchColumn();
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

    public function deletePost(int $idPost)
    {
        //para excluir um post antes preciso excluir os comentarios
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

class Category
{
    private $conexao;

    public function __construct()
    {
        $banco = new Banco();
        $this->conexao = $banco->getConnection();
    }
    

    public function listCategory(): array
    {
        $sql = 'select * from category';

        $cat = [];

        foreach ($this->conexao->query($sql) as $key => $value) {
            array_push($cat, $value);
        }

        return $cat;
    }
}

Class Comment{

    private $conexao;
    private $description;
    private $like;
    private $date;
    private $tag;
    private $postId;
    private $userId;

    public function __construct()
    {
        $banco = new Banco();
        $this->conexao = $banco->getConnection();
    }

    public function insert($description, $date, $tag, $postId, $userId)
    {
        $sql = 'INSERT into comment (description, date, tag, post_idpost, user_idUser) values (?,?,?,?,?)';
        
        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $description);
        $prepare->bindParam(2, $date);
        $prepare->bindParam(3, $tag);
        $prepare->bindParam(4, $postId);
        $prepare->bindParam(5, $userId);

        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function list($postId){
        $sql = "Select c.description, c.like, c.date, c.tag, c.post_idpost, u.name from comment c, user u where c.user_idUser = u.idUser  and c.post_idpost = $postId";
        $comment = [];

        foreach ($this->conexao->query($sql) as $value) {
            array_push($comment, $value);
        }
        return $comment;
    }

    public function countComment($postId)
    {
        $sql = "SELECT COUNT(*) FROM comment where post_idpost = $postId ";

        $prepare = $this->conexao->query($sql);
        return $prepare->fetchColumn();
    }

    public function deleteComment(int $idPost)
    {
        //para excluir um post antes preciso excluir os comentarios
        $sql = "delete from comment Where post_idpost = ?"; 
        
        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $idPost);
        
        if ($prepare->execute() == TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
