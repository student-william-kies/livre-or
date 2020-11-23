<?php
/* Connexion a la base de données */
$db = mysqli_connect('localhost', 'root', '', 'livreor');
/* Démarrage de la session */
session_start();

    /* Définie le fuseau horaire a utiliser par defaut */
    date_default_timezone_set('UTC');

    /* Condition if qui permet d'ajouter un nouveau commentaire */
    if (isset($_POST['new_comment'])){
        $comments = htmlspecialchars($_POST['comment'], ENT_QUOTES);
        $id_user = $_SESSION['id'];
        $date_comment = date("Y-m-j H:i:s");
        $create_comment = mysqli_query($db,"INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('" . $comments . "', '" . $id_user . "', '" . $date_comment . "')");
        echo mysqli_error($db);

        if ($create_comment){
            echo "<section class='alert alert-success text-center' role='alert'>Le commentaire à bien été envoyé, vous pouvez le visualisé dans l'onglet <i>livre d'or</i><button type='button'' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></section>!";
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Livre d'Or | Commentaires</title>
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
                    /* Condition if qui permet si la session est active de pouvoir afficher ou non le formulaire d'ajout de commentaire */
                    if (isset($_SESSION['id'])){
                        echo '
                        <section class="container-fluid">
                            <section class="row main-content bg-success text-center">
                                <section class="col-md-4 text-center company_info">
                                    <span class="company__logo"><i class="fas fa-address-book" style="font-size: 100px;"></i></span>
                                    <br />
                                </section>
                                <section class="col-md-8 col-xs-12 col-sm-12 login_form ">
                                    <section class="container-fluid">
                                        <section class="row">
                                            <h2>Commentaires</h2>
                                        </section>
                                        <section class="row">
                                            <form action="commentaire.php" class="form-group" method="POST">
                                                <!-- Comments -->
                                                <section class="row">
                                                    <label for="comment">Qu\'avez-vous pensez du mariage ?</label>
                                                    <textarea name="comment" id="comment" cols="32" rows="1.5" placeholder="Rédigez votre avis sans détour..." maxlength="150" required></textarea>
                                                    
                                                    <label for="new_comment"></label>
                                                    <input type="submit" name="new_comment" value="Envoyer" class="btn btn-warning">
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
                            <h1 class="display-4">Commentaires</h1>
                            <p class="lead">Veuillez vous connecter ou vous inscrire afin d\'accéder à la rédaction de commentaires !</p>
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
