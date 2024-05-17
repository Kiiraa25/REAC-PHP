<?php
require_once "../config/db.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/login.css">
</head>


<body>
    <!-----------------------------------------------------------------------------Formulaire de connexion -->
    <form method="POST">

        <div class="formContent">
            <div>
                <h2>Log in</h2>
                <p>You do not have an account ? <a href="../security/createAcount.php">Create an account</a></p>
            </div>

            <div>
                <div class="inputs">
                    <label for="username"> Your email</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label for="password"> Your password</label>
                    <input type="password" name="password">
                </div>

                <button type="submit">Login</button>

                <div class="errorLogin">
                    <?php

                    /////////////////////////////////////////////////////////// verification username et password
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        // requête sql pour recuperer le username dans la variable $username.
                        $selectConnexionIds = $pdo->prepare("SELECT * FROM users WHERE email =:email AND `password`=:password");
                        $selectConnexionIds->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
                        $selectConnexionIds->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
                        $selectConnexionIds->execute();
                        $connexionIds = $selectConnexionIds->fetch();

                        if (!empty($connexionIds)) {
                            $_SESSION["isLoggedIn"] = true;

                            $_SESSION['connectedId'] = $connexionIds['id'];

                            header('Location: ../public/index.php');
                            exit;
                        } else {
                            echo "<br>" . "Wrong email or password";
                        }
                    }
                    ?>
                    <p class="forgottenPass"><a href="#">Forgot your password ?</a></p>
                </div>

            </div>




        </div>


    </form>




</body>

</html>