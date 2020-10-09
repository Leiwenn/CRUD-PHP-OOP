    <section class="container-fluid pt-5">
        <div class="card text-center bg-dark rounded shadow col-12 col-md-6 mx-auto">
            <div class="card-body">
                <h2 class="card-title text-center cinzeld h2 text-white"> <?= $h2 ?> </h2>
                <div class="bg-light rounded p-2">
                    <?php  
                        while($data = $getOneMember->fetch()){
                    ?>
                        <p><span>Pseudo:</span> <?= $data['pseudo'] ?> </p>
                        <p><span>Mail:</span> <?= $data['mail'] ?> </p>
                        <p><span>Date d'inscription:</span> <?= $data['registration_date'] ?> </p>
                    <?php
                        }
                        $getOneMember->closeCursor();
                    ?>
                </div>
                <a class="card-link btn btn-xs mt-2 btn-info mx-auto" role="button" data-toggle="modal" data-target="#changePseudo" href="#"> <?= $link2 ?> </a>
                <a class="card-link btn btn-xs mt-2 btn-warning mx-auto" role="button" data-toggle="modal" data-target="#changePassword" href="#"> <?= $link3 ?> </a>
                <a class="card-link btn btn-xs mt-2 btn-danger mx-auto" role="button" href="index.php?action=unregistration"> <?= $link4 ?> </a>
            </div>
        </div>

        <div class="card bg-dark rounded shadow col-12 col-md-8 mx-auto mt-4">
            <div class="card-body">
                <h3 class="card-title text-center cinzeld h2 text-white"> <?= $h3 ?> </h3>
                <?php
                    while($data = $getComments->fetch()){
                        $comment = $data['comment'];
                ?>
                    <div class="card mb-2">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="far fa-comment-dots text-info mr-2" aria-hidden="true"></i> <?= $data['title'] ?>
                            </li>
                            <li class="list-group-item">
                                <?= $data['comment'] ?> 
                            </li>
                            <li class="list-group-item">
                                le: <?= $data['comment_date'] ?> 
                            </li>
                        </ul>
                    </div>
                <?php
                    }
                    if(!isset($comment)){
                ?>
                        <div class="card mb-4 p-2">
                            <p><i class="far fa-comment-dots text-info mr-2" aria-hidden="true"></i> Pas de commentaires enregistrés</p>
                        </div>
                <?php
                    }
                $getComments->closeCursor();
                ?>
            </div>
        </div>
    </section>

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
				<h5 class="modal-title"><i class="fas fa-sign-in-alt"></i>  <?= $h5 ?> </h5>
			</div>
			<div class="modal-body">
				<form action="index.php?action=change_password" method="post">
                    <label for="currentPassword">Mot de passe actuel:</label>
                    <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="Mot de passe" required>
                    <label for="newPassword">Nouveau mot de passe:</label>
                    <input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="Nouveau mot de passe" required>
                    <label for="confirmPassword">Confirmer le nouveau mot de passe:</label>
                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Nouveau mot de passe" required>
					<input class="mt-4 btn btn-info btn-block" type="submit" value="Enregistrer">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <?= $button ?> </button>
			</div>
		</div>
	</div>
</section>