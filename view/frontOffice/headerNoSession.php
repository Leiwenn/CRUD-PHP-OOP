<header class="text-center pt-4 mb-4">
    <button type="button" id="callToAction" data-toggle="modal" data-target="#registration" class="btn btn-lg btn-info mt-2">
        <i id="feather" class="fas fa-feather-alt mr-2" aria-hidden="true"></i> S'inscrire
    </button>
</header>

<!-- MODAL -->

    <!-- MODAL connexion -->
<section class="modal fade" id="connexion">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> Connection</h2>
			</div>
			<div class="modal-body">
				<form action="index.php?action=login" method="post">
                    <label class="pb-1" for="pseudo">Votre pseudo:</label>
                    <input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="pseudo" 
                    <?php
                    if(isset($_COOKIE['pseudo'])){
                    ?>
                        value="<?= $_COOKIE['pseudo'] ?>"
                    <?php
                    }
                    ?> 
                    required>
                    <label class="pb-1 pt-2" for="password">Mot de passe:</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="password"
                    <?php
                        if(isset($_COOKIE['password'])){
                        ?>
                            value="<?= $_COOKIE['password'] ?>"
                        <?php
                        }
                        ?> 
                    required>
                    <div class="form-group form-check">
					    <label class="pt-4 form-check-label" for="checkbox">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox"> 
                            se souvenir de moi
                        </label>
                        <small class="text-muted">(Enregistrement sous forme de cookies)</small>
                    </div>
					<input class="mt-4 btn btn-info btn-block" type="submit" value="se connecter">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</section>

    <!-- MODAL registration -->
<section class="modal fade" id="registration">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
			    <h3 class="modal-title mx-auto"><i class="fas fa-feather-alt" aria-hidden="true"></i> Inscription</h3>
            </div>
            <div class="modal-body">
                <form action="index.php?action=registration" method="post">
                    <label class="pb-1" for="registration_pseudo">Votre pseudo</label>
                    <button title="Le pseudo ne doit contenir que des lettres et des chiffres, et doit contenir entre 3 et 16 caractères" class="tips bg-secondary text-white">?</button>
                    <input class="form-control" type="text" name="registration_pseudo" id="registration_pseudo" placeholder="pseudo" required>
                    <label class="pb-1 pt-2" for="mail">Votre adresse mail</label>
                    <input class="form-control" type="email" name="mail" id="mail" placeholder="adresse@mail.fr" required>
                    <label class="pb-1 pt-2" for="registration_password">Mot de passe</label>
                    <button title="Le mot de passe ne peut contenir que des lettres minuscules, majuscules et des chiffres" class="tips bg-secondary text-white">?</button>
                    <input class="form-control" type="password" name="registration_password" id="registration_password" placeholder="password" required>
                    <label class="pt-2" for="passwordConfirm">Confirmer votre mot de passe</label>
                    <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="password" required>
                    <input class="mt-3 btn btn-info btn-block" type="submit" value="s'inscrire">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</section>