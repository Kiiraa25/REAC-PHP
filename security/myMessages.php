<?php
require "../config/db.php";

$selectUsers = 'SELECT * FROM users';
$querySelectUsers = $pdo->query($selectUsers);
$allUsers = $querySelectUsers->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
    
<div class="chat-container">
        <div class="chat-header">
            <h2>Utilisateurs</h2>
        </div>
        <div class="chat-messages" id="chat-messages">

            <?php
            foreach ($allUsers as $user) {
                echo "<div class='message'>
                    <span>" . $user['_name'] . "</span>
                    <a href='../public/index.php'><button class='delete-button'>Ecrire à ".$user['_name']." </button></a>
                </div>";
            }
            ?>
            <!-- End Message -->

            

        </div>
</body>
</html>