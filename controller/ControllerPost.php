<?php
session_start();
require_once("../model/post.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (filter_input(INPUT_POST, "postOp") == 1) { //insert
        $title = filter_input(INPUT_POST, "txtTitle");
        $description = filter_input(INPUT_POST, "txtBody");
        $userId = $_SESSION["userId"] = 4;
        $categoryId = filter_input(INPUT_POST, "category");

        $post = new Post();
        $post->setTitle($title);
        $post->setDescription($description);
        $post->setUserId($userId);
        $post->setCategoryId($categoryId);
        //classe do tipo Date para formatar data e hora que serão enviados para o banco
        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        $dt = $data->format('Y-m-d H:i:s');

        
        if ($post->insert($post->getTitle(), $post->getDescription(), $dt, 0, $post->getUserId(), $post->getCategoryId()) == true) {
            echo "<script type='text/javascript'>alert('Post saved successfully!');window.location.href = '../view/blog-home.php';</script>";
        } else echo "<script type='text/javascript'>alert('Something went wrong, try again');window.location.href = '../view/blog-new-post.php';</script>";
    
    } else if (filter_input(INPUT_POST, "postOp") == 2) { //like
        $idPost = filter_input(INPUT_POST, "idPost");
        $post = new Post($idPost);
        echo $post->likePost();

    } 
}
