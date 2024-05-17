<?php
$pdo = new \PDO('mysql:host=localhost;port=3308;dbname=chat_app', 'root', 'h2p.fr/',
[
    PDO::ATTR_ERRMODE => pdo::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);