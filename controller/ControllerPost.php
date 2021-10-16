<?php
session_start();
require_once("../model/post.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION["postOp"] == 1) { //PostOp = 1 então insere
    $title = filter_input(INPUT_POST, "txtTitle");
    $description = filter_input(INPUT_POST, "txtBody");
    $userId = $_SESSION["userId"];
    $categoryId = filter_input(INPUT_POST, "category");

    $post = new Post();
    $post->setTitle($title);
    $post->setDescription($description);
    $post->setUserId($userId);
    $post->setCategoryId($categoryId);
    //classe do tipo Date para formatar data e hora que serão enviados para o banco
    $data = new DateTime();
    
    $dt = $data->format('Y-m-d H:i:s');

    /*print for debug
    echo $data->format('Y-m-d H:i:s') . PHP_EOL;
    echo $post->getTitle();
    echo $post->getDescription();
    echo $post->getUserId() . PHP_EOL;
    echo $post->getCategoryId() . PHP_EOL;
    var_dump()
    */

    //insert
    if ($post->insert($post->getTitle(), $post->getDescription(), $dt, 0, $post->getUserId(),
     $post->getCategoryId()) == true) {
        echo "<script type='text/javascript'>alert('Post saved successfully!');window.location.href = '../view/blog-home.php';</script>";   
    } else echo "<script type='text/javascript'>alert('Something went wrong, try again');window.location.href = '../view/blog-new-post.php';</script>";
}
