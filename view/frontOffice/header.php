<div class="text-center bg-dark text-white p-3">
    <h1>JEAN FORTEROCHE</h1>
    <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler mx-auto text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav row col-12">
                <li class="nav-item col-12 col-md-4">
                    <a class="nav-link text-white" href="index.php">Accueil</a>
                </li>
                <li class="nav-item col-12 col-md-4">
                    <a class="nav-link text-white" href="index.php?action=viewPosts">Liste des épisodes</a>
                </li>
                <li class="nav-item col-12 col-md-4">
                    <a class="nav-link text-white" type="button" data-toggle="modal" data-target="#connexion" href="#">Connection</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="wrapper">
    <header class="d-flex flex-column flex-sm-row justify-content-around pt-5">
        <div class="w-50 text-center mx-auto pt-4">
            <img class="img-fluid" src="public/img/book_cover.png" alt="" />
        </div>
        <div class="w-50 text-center d-flex flex-column justify-content-center align-items-center pt-5 p-3 hero">
            <p class="h3">Inscrivez vous pour commenter les épisodes</br>et être informé de chaque publication</p>
            <button type="button" id="callToAction" data-toggle="modal" data-target="#registration" class="btn btn-lg mr-2 mt-5"><i class="fas fa-feather-alt mr-2"></i> S'inscrire</button>
        </div>
    </header>


<!-- MODAL -->

    <!-- MODAL connexion -->
<section class="modal fade" id="connexion">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-sign-in-alt"></i> Connection</h4>
			</div>
			<div class="modal-body">
				<form action="index.php?action=login" method="post">
                    <label class="pb-1" for="pseudo">Votre pseudo:</label><input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="pseudo" <?php echo htmlspecialchars('pseudo'); ?> required>
                    
                    <label class="pb-1 pt-2" for="password">Mot de passe:</label><input class="form-control" type="password" name="password" id="password" placeholder="password" <?php echo htmlspecialchars('password'); ?> required>

                    <div class="form-group form-check">
					    <label class="pt-4 form-check-label" for="checkbox"><input class="form-check-input" type="checkbox" name="checkbox"> se souvenir de moi</label>
                    </div>
					<input class="mt-4 btn btn-info btn-block" type="submit" value="se connecter">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</section>

    <!-- MODAL registration -->
<section class="modal fade" id="registration">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
			    <h4 class="modal-title"><i class="fas fa-feather-alt"></i> Inscription</h4>
            </div>
            <div class="modal-body">
                <form action="index.php?action=registration" method="post">
                    <label class="pb-1" for="pseudo">Votre pseudo</label><input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="pseudo" <?php echo htmlspecialchars('pseudo'); ?> required>

                    <label class="pb-1 pt-2" for="mail">Votre adresse mail</label><input class="form-control" type="mail" name="mail" id="mail" placeholder="adresse@mail.fr" <?php echo htmlspecialchars('mail'); ?> required>

                    <label class="pb-1 pt-2" for="password">Mot de passe</label><input class="form-control" type="password" name="password" id="password" placeholder="password" <?php echo htmlspecialchars('password'); ?> required>

                    <label class="pt-2" for="passwordConfirm">Confirmer votre mot de passe</label><input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="password" <?php echo htmlspecialchars('passwordConfirm'); ?> required>

                    <input class="mt-4 btn btn-info btn-block" type="submit" value="s'inscrire">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</section>