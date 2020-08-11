    <section class="container-fluid pt-5 pb-4">
        <div class="row col-11 col-md-5 p-4 mb-4 mx-auto d-flex flex-column bg-light rounded shadow">
            <h2 class="text-center cinzeld"> <?= $h2 ?> </h2>
            <?php  
                while($data = $getOneMember->fetch()){
            ?>
                <p><span>Pseudo:</span> <?= htmlspecialchars($data['pseudo']) ?> </p>
                <p><span>Mail:</span> <?= htmlspecialchars($data['mail']) ?> </p>
                <p><span>Date d'inscription:</span> <?= htmlspecialchars($data['registration_date']) ?> </p>
            <?php
                    $req->closeCursor();
                } 
            ?>
            <div class="btn-group shadow" role="group" aria-label="changer le pseudo, changer le mot de pass, se désinscrire">
                <a class="btn btn-info border" role="button" data-toggle="modal" data-target="#changePseudo" href="#"> <?= $link2 ?> </a>
                <a class="btn btn-info border" role="button" data-toggle="modal" data-target="#changePassword" href="#"> <?= $link3 ?> </a>
                <a class="btn btn-warning border" role="button" href="index.php?action=unregistration"> <?= $link4 ?> </a>
            </div>
        </div>

        <div class="row col-11 col-md-8 p-4 mx-auto d-flex flex-column bg-light rounded shadow">
            <h3 class="mx-auto cinzeld"> <?= $h3 ?> </h3>
            <?php  echo 'if($data == null) n\'inscrit pas mon echo NI les commentaires';
                while($data = $getComments->fetch()){
                    if($data == null){
                        echo 'Vous n\'avez pas écrit de commentaire.';
                    }else{
            ?>
                <div class="card p-2">
                    <p class="card-title font-weight-bold"><i class="far fa-comment-dots text-warning mr-2"></i> <?= htmlspecialchars($data['title']) ?> </p>
                    <p class="card-text"> <?= htmlspecialchars($data['comment']) ?> </p>
                    <p class="card-text">le: <?= htmlspecialchars($data['comment_date']) ?> </p>
                </div>
            <?php 
                    }
                    $req->closeCursor();
                } 
            ?>
        </div>
    </section>
<!-- fin DIV bloc_page -->
</div>

<!-- MODAL -->

<section class="modal fade" id="changePseudo">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-sign-in-alt"></i>  <?= $h4 ?> </h4>
			</div>
			<div class="modal-body">
				<form action="index.php?action=change_pseudo" method="post">
                    <label for="newPseudo">Nouveau pseudo</label>
                    <input class="form-control" type="text" name="newPseudo" id="newPseudo" placeholder="Nouveau pseudo" required>
					<input class="mt-4 btn btn-info btn-block" type="submit" value="Enregistrer">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <?= $button ?> </button>
			</div>
		</div>
	</div>
</section>

<section class="modal fade" id="changePassword">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-sign-in-alt"></i>  <?= $h5 ?> </h4>
			</div>
			<div class="modal-body">
				<form action="index.php?action=change_password" method="post">
                    <label for="currentPassword">Mot de passe actuel:</label><input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="Mot de passe" required>
                    <label for="newPassword">Nouveau mot de passe:</label><input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="Nouveau mot de passe" required>
                    <label for="confirmPassword">Confirmer le nouveau mot de passe:</label><input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Nouveau mot de passe" required>

					<input class="mt-4 btn btn-info btn-block" type="submit" value="Enregistrer">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <?= $button ?> </button>
			</div>
		</div>
	</div>
</section>