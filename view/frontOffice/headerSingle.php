 
<nav class="single">
    <ul class="nav d-flex justify-content-between">
        <li class="nav-item m-3">
            <a href="index.php"><h1>JEAN FORTEROCHE</h1></a>
        </li>
        <li class="nav-item m-3">
            <a class="nav-link btn btn-outline-light" data-toggle="modal" data-target="#connexion" href="#"><i class="fas fa-sign-in-alt"></i> Connexion</a>
        </li>
    </ul>
</nav>

<!-- MODAL -->

    <!-- MODAL connexion -->
<section class="modal fade" id="connexion">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Connection</h4>
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