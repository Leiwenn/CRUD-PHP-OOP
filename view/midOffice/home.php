
<section class="container-fluid pt-5 pb-4">
    <div class="row col-11 col-md-5 p-4 mb-4 mx-auto d-flex flex-column bg-light rounded shadow">
        <h2 class="p-3 rounded cinzeld"> <?= $h2 ?> </h2>
        <?php  
            while($data = $getOneMember->fetch()){
        ?>
            <p><span>Pseudo:</span> <?= htmlspecialchars($data['pseudo']) ?> </p>
            <p><span>Mail:</span> <?= htmlspecialchars($data['mail']) ?> </p>
            <p><span>Date d'inscription:</span> <?= htmlspecialchars($data['registration_date']) ?> </p>
        <?php 
            } 
        ?>
        <a class="btn btn-info mb-3 shadow" role="button" data-toggle="modal" data-target="#changePassword" href="#">Changer mon mot de passe</a>
        <a class="btn btn-warning shadow" role="button" href="index.php?action=unregistration">Désinscription</a>
    </div>

    <div class="row col-11 col-md-8 p-4 mx-auto bg-light rounded shadow">
        <h3 class="p-3 rounded cinzeld"> <?= $h3 ?> </h3>
        <?php  
            while($data = $getComments->fetch()){
        ?>
            <div class="card p-2">
                <p class="card-title font-weight-bold"><i class="far fa-comment-dots text-warning mr-2"></i> <?= htmlspecialchars($data['title']) ?> </p>
                <p class="card-text"> <?= htmlspecialchars($data['comment']) ?> </p>
                <p class="card-text">le: <?= htmlspecialchars($data['comment_date']) ?> </p>
            </div>
        <?php 
            } 
        ?>
    </div>
</section>

<!-- MODAL -->

<section class="modal fade" id="changePassword">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-sign-in-alt"></i> Changer mon mot de passe</h4>
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
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</section>