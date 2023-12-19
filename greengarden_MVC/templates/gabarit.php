<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./public/css/main.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-dark mb-5">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="">GreenGarde</a>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?php if (isset($_SESSION['pseudo']) && $_SESSION['user_type'] == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="admin.php">Admin</a>
                            </li>
                        <?php } ?>

                        <?php if (isset($_SESSION['pseudo']) == true) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="produits.php">produit</a>
                            </li>
                        <?php } ?>
                    </ul>

                    <?php if (isset($_SESSION['pseudo']) == false) { ?>
                        <a style="color:white;" href="inscription.php">Inscription</a>
                    <?php } else { ?>
                        <a style="color:red;" class="d-flex justify-content-center " title="Cliquez ici pour vous déconnecter" href='deco.php'>Déconnexion</a>

                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>

<main>


</main>





    <footer class=" text-center mt-auto py-3 ">
        <div class="text-center p-3">
            <a>Site réalisé par ... - afpa 2023</a>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>