<?php
session_start();

    if (isset($_POST['logout'])){

        session_destroy();
        header('location: php/connexion.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Livre d'or</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <header>
            <section class="text-center container-fluid">
                <p>- 22 Janvier 2018, Marseille -</p>
                <?php if (isset($_SESSION['login'])){ echo 'Bonjour <i class="fas fa-user-circle"></i> ' . $_SESSION['login'] . '<br /><form method="POST" action="index.php"><input type="submit" name="logout" value="Déconnexion" class="btn btn-danger"></form>';} ?>
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
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="php/livre-or.php">Livre d'Or</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="php/commentaire.php">Commentaire</a>
                        </li>
                        <li class="nav-item nav_log">
                            <a class="nav-link" href="php/connexion.php">Connexion</a>
                        </li>
                        <li class="nav-item nav_log">
                            <a class="nav-link" href="php/inscription.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="php/profil.php">Profil</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Main de la page -->
        <main>
            <article>
                <section class="container-fluid text-center main-info-section">
                    <section class="container text-left text-info-left">
                        <h1><span class="main-title">Rose</span></h1>
                    </section>
                    <section class="container text-center">
                        <img src="images/rose&mathys-home.svg" class="img-fluid img-thumbnail img-rm" alt="Rose & Mathys">
                    </section>
                    <section class="container text-right text-info-right">
                        <h1><span class="main-title">Mathys</span></h1>
                    </section>
                </section>
            </article>
        </main>

        <!-- Section carousel images -->
        <section class="container-fluid text-center pictures-carousel">
            <section class="carousel-title">
                <h1>Le mariage, en images !</h1>
            </section>
            <section class="container">
                <section class="carousel slide" id="main-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#main-carousel" data-slide-to="1"></li>
                        <li data-target="#main-carousel" data-slide-to="2"></li>
                        <li data-target="#main-carousel" data-slide-to="3"></li>
                    </ol>

                    <section class="carousel-inner">
                        <section class="carousel-item active">
                            <img class="d-block img-fluid" src="images/carousel-acc.svg" alt="Image d'accueil du carousel">
                            <section class="carousel-caption d-none d-md-block">
                                <h1>Mariage de Rose & Mathys</h1>
                            </section>
                        </section>
                        <section class="carousel-item">
                            <img class="d-block img-fluid" src="images/carousel-p1.svg" alt="La cérémonie">
                            <section class="carousel-caption d-none d-md-block">
                                <h3>La Cérémonie</h3>
                                <p>Ce fût un moment fort pour les mariés comme pour les invités !</p>
                            </section>
                        </section>
                        <section class="carousel-item">
                            <img class="d-block img-fluid" src="images/carousel-p2.svg" alt="Nos belles invitées">
                            <section class="carousel-caption d-none d-md-block">
                                <h3>Nos belles invitées</h3>
                                <p>Evidemment, pas de jalousie ! Un bouquet pour tout le monde !</p>
                            </section>
                        </section>
                        <section class="carousel-item">
                            <img src="images/carousel-p3.svg" alt="Le petit blagueur" class="d-block img-fluid">
                            <section class="carousel-caption d-none d-md-block">
                                <h3>Le blagueur</h3>
                                <p>Il y a toujours un petit blagueur, aujourd'hui, c'était lui !</p>
                            </section>
                        </section>
                    </section>

                    <a href="#main-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only" aria-hidden="true">Prev</span>
                    </a>
                    <a href="#main-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only" aria-hidden="true">Next</span>
                    </a>
                </section>
            </section>
        </section>

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
