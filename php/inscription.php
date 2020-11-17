<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Livre d'Or | Inscription</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/inscription.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <header>
            <section class="text-center container-fluid">
                <p>- 22 Janvier 2018, Marseille -</p>
            </section>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-center navbar-light nav-home">
                <a class="navbar-brand" href="#"><span id="nav-title">Rose & Mathys</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="livre-or.php">Livre d'Or</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commentaire.php">Commentaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php">Profil</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Main de la page -->
        <main>
            <article>
                <section class="container-fluid">
                    <section class="row main-content bg-success text-center">
                        <section class="col-md-4 text-center company_info">
                            <span class="company__logo"><i class="fas fa-address-book" style="font-size: 100px;"></i></span>
                        </section>
                        <section class="col-md-8 col-xs-12 col-sm-12 login_form ">
                            <section class="container-fluid">
                                <section class="row">
                                    <h2>S'inscrire</h2>
                                </section>
                                <section class="row">
                                    <form action="inscription.php" class="form-group" method="POST">
                                        <!-- Login -->
                                        <section class="row">
                                            <input type="text" name="login" id="login" class="form_input" placeholder="Login" required>
                                        </section>
                                        <!-- Password -->
                                        <section class="row">
                                            <input type="password" name="password" id="password" class="form_input" placeholder="Password" required>
                                        </section>
                                        <!-- Confirm Password -->
                                        <section class="row">
                                            <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="form_input" placeholder="Confirm Password" required>
                                        </section>
                                        <!-- Bouton Créer -->
                                        <section class="row">
                                            <input type="submit" name="register" value="Créer" class="btn">
                                        </section>
                                    </form>
                                </section>
                                <section class="row">
                                    <p>Déjà membre? <a href="connexion.php">Connecte toi ici !</a></p>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </article>
            <section>
                <?php
                $db = mysqli_connect('localhost','root','','livreor');

                if (isset($_POST['register'])){
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['ConfirmPassword'];
                    $error_log = 'Veuillez réessayer ! Login ou mot de passe incorrect.';

                    if (isset($_POST['login'])){
                        if (isset($_POST['password'])){
                            if ($_POST['password'] === $_POST['ConfirmPassword']){
                                $create_user = "INSERT INTO utilisateurs(login, password) VALUES('$login', '$password')";
                                mysqli_query($db, $create_user);
                                echo '<section class="alert alert-success text-center" role="alert">
                            <h4 class="alert-heading">Création réussie !</h4>
                            <p>Merci de ton implication, tu as maintennant accès à toutes les pages du sites !</p>
                            <hr>
                            <p>N\' hésite pas à allez jeter un oeil aux commentaires, tu peux également en ajouter un  !</p></section>';
                            }
                            else{
                                echo '<section class="alert alert-danger text-center" role="alert">' . $error_log . '</section>';
                            }
                        }
                    }
                }
                $nbr_ligne = mysqli_num_rows(mysqli_query($db,"SELECT * FROM utilisateurs"));

                if($nbr_ligne == 0) {
                    mysqli_query($db, "ALTER TABLE utilisateurs AUTO_INCREMENT = 1");
                    echo("null");
                }
                ?>
            </section>
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
