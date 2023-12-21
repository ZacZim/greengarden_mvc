<main>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 style="font-family: 'Poppins', sans-serif; " class="text-uppercase text-center mb-5 fw-bolder">Connexion</h2>
                            <form method="POST">
                                <div class="col-auto m-3">
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre Pseudonyme " required>
                                </div>
                                <div class="col-auto m-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre Mot de passe " required>
                                </div>
                                <div class=" d-flex justify-content-center mt-4">
                                    <button type="submit" name="button_login" class="boutonInsc btn btn btn-lg gradient-custom-4 text-body ">Se connecter</button>
                                </div>
                                <!-- Affichage des messages  -->
                                <div class="col-auto m-3 d-flex justify-content-center">
                                    <p><?php if(isset($error)){ print $error; } ?>
                                </div>
                                <p class="text-center text-muted mt-4 mb-0">Vous n'avez pas de compte ? <a href="?action=inscription" class="fw-bold text-body"><u>S'enregistrer</u></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>