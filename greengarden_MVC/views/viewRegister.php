<main>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 style="font-family: 'Poppins', sans-serif; " class="text-uppercase text-center mb-5 fw-bolder">Inscription</h2>
                            <!-- Formulaire d'inscription -->
                            <form method="POST">
                                <div class="col-auto m-3 ">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom " required>
                                </div>
                                <div class="col-auto m-3">
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
                                </div>
                                <div class="col-auto m-3">
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre Pseudonyme " required>
                                </div>
                                <div class="col-auto m-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre Email" required>
                                </div>
                                <div class="col-auto m-3">
                                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Entrez votre Numéro de téléphone" required>
                                </div>
                                <div class="col-auto m-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre Mot de passe " required>
                                </div>
                                <div class="col-auto m-3 ">
                                    <input type="password" class="form-control" id="verif_mdp" name="verif_mdp" placeholder="Vérification du Mot de passe" required>
                                </div>
                                <div class="col-auto m-3 d-flex justify-content-center">
                                    <input type="submit" value="S'inscrire" name="btn_add_user" class="boutonInsc btn btn btn-lg gradient-custom-4 text-body">
                                </div>
                                <!-- Affichage des messages d'inscription -->
                                <div class="col-auto m-3 d-flex justify-content-center">
                                    <p><?php if(isset($error)){ print $error; } ?>
                                </div>
                                <p class="text-center text-muted mt-4 mb-0">Vous avez déjà un compte ? <a href="?action=login" class="fw-bold text-body"><u>Se connecter</u></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>