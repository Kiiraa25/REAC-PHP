<?php
require_once "../config/db.php";

$selectMessages = 'SELECT * FROM messages';
$querySelectMessages = $pdo->query($selectMessages);
$messages = $querySelectMessages->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php
    require "../_partials/_header.php"
    ?>
    <div class="chat-container">
        <div class="chat-header">
            <h2>Chat Room</h2>
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Les messages apparaîtront ici -->

            <!-- Start Message -->
            <?php
            foreach ($messages as $message) {
                echo "<div class='message'>
                    <span>" . $message['message'] . "</span>
                    <a href='../config/deleteMessage.php?id=$message[id]'><button class='delete-button'>Delete</button></a>
                </div>";
            }
            ?>
            <!-- End Message -->

            

        </div>
        <div class="chat-input">
            <form method="post">
                <label for="message"></label>
                <input type="text" name="message" placeholder="Isérez votre message ici...">
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>

    <script>
        element = document.querySelector('.chat-messages');
        element.scrollTop = element.scrollHeight;
    </script>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];

    if (!empty($message)) {
        $insertMessage = $pdo->prepare("INSERT INTO messages(message) VALUES(:message)");
        $insertMessage->bindValue(":message", $message, PDO::PARAM_STR);

        $insertMessage->execute();

        header("Location: index.php");
    }
}

?>

