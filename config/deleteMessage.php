<?php
require "../config/db.php";

if($_SERVER["REQUEST_METHOD"]=== "GET")
{
$id = $_GET['id'];

$deleteMessage = $pdo->prepare("DELETE FROM messages WHERE id =:id");
$deleteMessage->bindValue(":id",$id);
$deleteMessage->execute();
}

header("Location: ../public/index.php");
