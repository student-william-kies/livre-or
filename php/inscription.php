<?php
/* Connexion à la base de données */
$db = mysqli_connect('localhost','root','','livreor');

    /* Condition if qui permet si le formulaire register est définie */
    if (isset($_POST['register'])){
        /* De créer la variable $login qui recupère l'info de l'input login référencer par l'utilisateur */
        $login = $_POST['login'];
        /* De même pour le mot de passe */
        $password = $_POST['password'];
        /* Et pour la confirmation du mot de passe */
        $confirm_password = $_POST['ConfirmPassword'];
        /* Création de la variable $error_log qui permet d'afficher une erreur en cas de mot de passe non indentique */
        $error_log = 'Veuillez réessayer ! Login ou mot de passe incorrect !';

        /* Condition if qui permet si le mot de passe est identique à sa vérification */
        if ($password === $confirm_password){
            /* De naviguer vers la page connexion.php */
            header('location:connexion.php');
        }
    }
    /* Condition if qui permet si le formulaire register est définie */
    if (isset($_POST['register'])){
        /* De rentrer dans la condition if qui elle permet de tester le mot de passe */
        if ($password === $confirm_password){
            /* Si celui-ci est identique, cela crer la variable $create_user qui stock la requête sql necessaire a l'enregistrement d'un utilisateur */
            $create_user = "INSERT INTO utilisateurs(login, password) VALUES('$login', '$password')";
            /* Permet d'envoyer la requête sql à la base de donnée à laquelle nous sommes connectée */
            mysqli_query($db, $create_user);
        }
        /* Si le mot de passe tester est négatif, cela renvoie vers l'affichage de la variable $error_log définie plus comme étant une variable d'erreur */
        else{
            echo '<section class="alert alert-danger text-center" role="alert">' . $error_log . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></section>';
        }
    }
    /* Création de la variable $controle_id qui permet de récupérer le nombre de lignes dans un résultat */
    $control_id = mysqli_num_rows(mysqli_query($db,"SELECT * FROM utilisateurs"));

    /* Condition if qui permet si c$control_id est identique à 0 (donc un formulaire non remplis) de réinitialisé la valeur de 'id est ainsi garder une certaine cohérence en vue du
    nombre d'utilisateur inscrit */
    if($control_id == 0){
        mysqli_query($db, "ALTER TABLE utilisateurs AUTO_INCREMENT = 1");
    }
?>

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
                </section>
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
                                            <label for="login"></label>
                                            <input type="text" name="login" id="login" class="form_input" placeholder="Login" required>
                                        </section>
                                        <!-- Password -->
                                        <section class="row">
                                            <label for="password"></label>
                                            <input type="password" name="password" id="password" class="form_input" placeholder="Password" required>
                                        </section>
                                        <!-- Confirm Password -->
                                        <section class="row">
                                            <label for="ConfirmPassword"></label>
                                            <input type="password" name="ConfirmPassword" id="ConfirmPassword" class="form_input" placeholder="Confirm Password" required>
                                        </section>
                                        <!-- Bouton Créer -->
                                        <section class="row">
                                            <label for="register"></label>
                                            <input type="submit" name="register" value="S'inscrire" class="btn">
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
