<?php
/* Connexion a la base de données */
$db = mysqli_connect('localhost', 'root', '', 'livreor');
/* Démarrage de la session */
session_start();

    /* Condition if qui permet de se deconnecter */
    if (isset($_POST['logout'])){
        session_destroy();
        header('location:connexion.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Livre d'Or | Livre d'Or</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/livre-or.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <header>
            <section class="text-center container-fluid">
                <p>- 22 Janvier 2018, Marseille -</p>
                <!-- Condition if qui affiche l'utilisateur connecté ainsi que le bouton deconnexion -->
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
                            /* Condition if qui permet de faire disparaitre connexion & inscription si la session est active */
                            if (!isset($_SESSION['id'])){
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
                <section class="container-fluid text-center">
                    <h1>Livre d'Or</h1>
                    <h2>Commentaires</h2>
                    <section class="container text-center" style="background-color: #f0f0f0;">
                        <?php
                            /* Variable qui permet de selectionner le login de utilisateur, la date de commentaires, et de joindre les tables commentaires et utilisateurs en triant du plus récent au plus vieux */
                            $check_comments = mysqli_query($db,"SELECT u.login, c.date, c.commentaire FROM utilisateurs AS u INNER JOIN commentaires AS c WHERE c.id_utilisateur = u.id ORDER BY c.date DESC");

                            /* Boucle while qui permet de fetch la variable ci dessus en affichant le resultat de celle-ci sous forme de tableau */
                            while($comments_list = mysqli_fetch_assoc($check_comments)){
                                echo '<table><tr><td><b>Posté le ' . htmlspecialchars($comments_list['date']) . ' par ' . htmlspecialchars($comments_list['login']) . '</b></td></tr><br /><tr><td>' . html_entity_decode($comments_list['commentaire']) . '</td></tr></table>';
                            }

                            /* Condition if qui permet si la session est active d'afficher une alerte permettant de rediriger l'utilisateur vers la page commentaire */
                            if (isset($_SESSION['id'])){
                                echo "<br /><br /><section class='alert alert-primary' role='alert'> Vous pouvez ajouter un ou plusieurs commentaires en <a href='commentaire.php' class='alert-link'>cliquant ici</a>. Cliquer sur le lien si vous le souhaitez !</section>";
                            }
                        ?>
                    </section>
                </section>
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
