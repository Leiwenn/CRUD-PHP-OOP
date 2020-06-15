<header class="d-flex justify-content-around align-items-center">
    <h1>Dashboard</h1>
    <h2>Modération</h2>
</header>

<section class="reports">

    <h3 class="m-3">Demandes de modération:</h3>

    <?php while($data = $showReports->fetch()){ ?>

        <div class="m-3 p-3 shadow rounded">
            <p><i class="far fa-comment-dots text-warning m-2"></i> Demande de <span class="font-weight-bold"><?= $data['pseudo'] ?></span> à propos du billet: <span class="font-weight-bold"><?= $data['title'] ?></span></p>
            <button type="button" data-toggle="modal" data-target="#comment" class="btn mr-2 mt-3">Voir le commentaire</button>
        </div>

    <?php } ?>

</section>

<!-- MODAL -->

    <!-- MODAL comment -->
    <section class="modal fade" id="comment">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        

		<div class="modal-content">
			<div class="modal-header">
                <p>coucou</p>
			</div>
			<div class="modal-body">
                <?php while($data = $showComment->fetch()){ ?>
                <p>Auteur du commentaire: <?= $data['pseudo'] ?> </p>
                <p>Titre du commentaire: <?= $data['title'] ?> </p>
                <p>Commentaire: <?= $data['comment'] ?> </p>
                <p>Date du commentaire: <?= $data['comment_date'] ?> </p>
                <a class="btn btn-info p-2 mt-2" role="button" href="index.php?action=delete_comment">supprimer le commentaire</a>
                <?php } ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
			</div>
        </div>

        
	</div>
</section>