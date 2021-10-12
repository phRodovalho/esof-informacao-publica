<?php
session_start();
require_once("../model/post.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filter_input(INPUT_POST, "txtTitle");
    $description = filter_input(INPUT_POST, "txtBody");
    $userId = $_SESSION["userId"];
    $categoryId = filter_input(INPUT_POST, "category");

    $post = new Post($title, $description, $userId, $categoryId);
    //classe do tipo Date para formatar data e hora que serão enviados para o banco
    $data = new DateTime();
    
    $dt = $data->format('Y-m-d H:i:s');

    //print for debug
    echo $data->format('Y-m-d H:i:s') . PHP_EOL;
    echo $post->getTitle();
    echo $post->getDescription();
    echo $post->getUserId() . PHP_EOL;
    echo $post->getCategoryId() . PHP_EOL;

    //inserindo, deu certo!
    if ($post->insert($post->getTitle(), $post->getDescription(), $dt, 0, $post->getUserId(), $post->getCategoryId()) == true) {
        echo "Deu certo inserção no banco";
    } else echo "ERROR :(";

    //erro
    if ($post->likePost($post->getPostId()) == true) {
        return true;
    } else return false;
}
