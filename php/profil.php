<?php
/* Connexion à la base de données */
$db = mysqli_connect('localhost', 'root', '', 'livreor');
/* Démarrage de la session */
session_start();

    /* Condition if qui permet de se déconnecter */
    if (isset($_POST['logout'])){
        session_destroy();
        header('location:connexion.php');
    }

    /* Condition if qui permet si la session est définie et que le formulaire de modification est défini, de pouvoir update ses données */
    if (isset($_SESSION['id'])){
        if(isset($_POST['New_user'])){
            if (isset($_POST['NewLogin']) && $_POST['NewPassword'] === $_POST['ConfirmNewPassword']){

                /* Création de nouvelles variables */
                $new_login = $_POST['NewLogin'];
                $new_password = $_POST['NewPassword'];
                $confirm_newPassword = $_POST['ConfirmNewPassword'];
                $session_id = $_SESSION['id'];

                /* Variable qui stock la requête SQL ainsi que son envoie en BD  */
                $update_user = mysqli_query($db, "UPDATE utilisateurs SET login = '$new_login', password = '$new_password' WHERE id = '$session_id'");

                /* Attribution des nouveaux paramètres */
                $_SESSION['login'] = $new_login;
                $_SESSION['password'] = $new_password;

                /* Condition if qui permet si la variable = true, d'afficher un message */
                if ($update_user){
                    echo '<section class="alert alert-success text-center" role="alert">Modification effectuée !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></section>';
                }
                /* De même pour false */
                else{
                    echo '<section class="alert alert-danger text-center" role="alert">Echec de la modification, réessayer !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></section>';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Livre d'Or | Profil</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/profil.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <header>
            <section class="text-center container-fluid">
                <p>- 22 Janvier 2018, Marseille -</p>
                <?php if (isset($_SESSION['login'])){ echo 'Bonjour <i class="fas fa-user-circle"></i> ' . $_SESSION['login'] . '<br /><form method="POST" action="profil.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';} ?>
            </section>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-center navbar-light nav-home">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <section class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="navbar-brand" href="#"><span id="nav-title">Rose & Mathys</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="livre-or.php">Livre d'Or</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commentaire.php">Commentaire</a>
                        </li>
                        <?php
                            if (!isset($_SESSION['login'])){
                                echo '<li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>';
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php">Profil</a>
                        </li>
                    </ul>
                </section>
            </nav>
        </header>

        <!-- Main de la page -->
        <main>
            <article>
                <?php

                    /* Condition if qui permet si la session est active d'afficher le formulaire de modif ou non */
                    if (isset($_SESSION['id'])){
                        echo '
                        <section class="container-fluid">
                            <section class="row main-content bg-success text-center">
                                <section class="col-md-4 text-center company_info">
                                    <span class="company__logo"><i class="fas fa-address-book" style="font-size: 140px;"></i></span>
                                    <br />
                                </section>
                                <section class="col-md-8 col-xs-12 col-sm-12 login_form ">
                                    <section class="container-fluid">
                                        <section class="row">
                                            <h2>Gestion du compte</h2>
                                        </section>
                                        <section class="row">
                                            <form action="profil.php" class="form-group" method="POST">
                                                <!-- Login -->
                                                <section class="row">
                                                    <label for="NewLogin">Modifier votre login :</label>
                                                    <input type="text" name="NewLogin" id="Newlogin" class="form_input" placeholder="Nouveau login" required>
                                                </section>
                                                <!-- Password -->
                                                <section class="row">
                                                    <label for="NewPassword">Nouveau mot de passe :</label>
                                                    <input type="password" name="NewPassword" id="NewPassword" class="form_input" placeholder="Nouveau password" required>
                                                    
                                                    <label for="ConfirmNewPassword">Confirmer votre nouveau mot de passe :</label>
                                                    <input type="password" name="ConfirmNewPassword" id="ConfirmNewPassword" class="form_input" placeholder="Confirmer le nouveau password" required>
                                                    
                                                    <label for="New_user"></label>
                                                    <input type="submit" name="New_user" value="Modifier" class="btn btn-warning">
                                                    <p>(<i>Si vous souhaitez conserver vos paramètres, renseigner les champs requis par votre Login ou Mot de passe actuel.</i>)</p>
                                                </section>
                                            </form>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>';
                    }
                    else{
                        echo '
                        <section class="jumbotron jumbotron-fluid text-center">
                            <section class="container">
                            <h1 class="display-4">Profil</h1>
                            <p class="lead">Veuillez vous connecter ou vous inscrire afin d\'accéder à votre profil !</p>
                            </section>
                        </section>
                        <img src="../images/profile_bg.svg" alt="ErrorLog" style="width: 30%; margin-left: 36%; margin-top: 5%;">';
                    }
                ?>
            </article>
        </main>

        <!-- Footer de la page -->
        <footer>
            <section class="footer">
                <section id="button"></section>
                <section id="container">
                    <section id="cont">
                        <section class="footer_center">
                            <h3>Created by William Kies.</h3>
                        </section>
                    </section>
                </section>
            </section>
        </footer>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
