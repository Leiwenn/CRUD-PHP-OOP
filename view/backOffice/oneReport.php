    <header class="d-flex justify-content-around align-items-center bg-dark text-white">
        <h1 class="pt-2"> <?= $h1 ?> </h1>
    </header>
    
    <section class="reports">
        <h2 class="p-2 text-center text-white ombre"> <?= $h2 ?> </h2>
        <?php
            while($data = $getReportedComment->fetch()){
                $comment_id = $data['comment_id'];
        ?>
            <div class="border bg-light rounded shadow m-3 p-2 mb-4 oneReport">
                <p><i class="far fa-comment-dots text-warning" aria-hidden="true"></i> <span>Auteur du commentaire:</span> <?= $data['pseudo'] ?> </p>
                <p><span>Titre du commentaire:</span> <?= $data['title'] ?> </p>
                <p><span>Commentaire:</span> <?= $data['comment'] ?> </p>
                <p><span>Date du commentaire:</span> <?= $data['comment_date'] ?> </p>
                <a class="btn btn-info mx-auto" role="button" href="index.php?action=keep_comment&rid=<?= $rid ?>">Garder</a>
                <a class="btn btn-warning mx-auto" role="button" href="index.php?action=delete_comment&comment_id=<?= $comment_id ?>&rid=<?= $rid ?>">Supprimer</a>
                <a class="btn btn-danger mx-auto" role="button" href="index.php?action=exclude_member&pseudo=<?= $data['pseudo'] ?>"><i class="fa fa-user-times" aria-hidden="true"></i> Supprimer et Exclure le membre</a>
            </div>
        <?php
            }
            $getReportedComment->closeCursor();
        ?>
    </section>
<!-- end div container-fluid -->
</div>