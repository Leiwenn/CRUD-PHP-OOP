    <header class="d-flex justify-content-around align-items-center bg-dark text-white">
        <h1 class="pt-2"> <?= $h1 ?> </h1>
    </header>
    
    <section class="reports">
        <h2 class="p-2 text-center text-white ombre"> <?= $h2 ?> </h2>
        <?php
            while($data = $getReportedComment->fetch()){
                $comment_id = $data['comment_id'];
        ?>
            <div class="border bg-light rounded shadow m-3 p-2 mb-4">
                <p><i class="far fa-comment-dots text-warning" aria-hidden="true"></i> <span>Auteur du commentaire:</span> <?= $data['pseudo'] ?> </p>
                <p><span>Titre du commentaire:</span> <?= $data['title'] ?> </p>
                <p><span>Commentaire:</span> <?= $data['comment'] ?> </p>
                <p><span>Date du commentaire:</span> <?= $data['comment_date'] ?> </p>
                <div class="btn-group" role="group" aria-label="garder le commentaire ou le supprimer ou exclure le membre">
                    <a class="btn btn-info" role="button" href="index.php?action=keep_comment&rid=<?= $rid ?>">Le garder</a>
                    <a class="btn btn-warning" role="button" href="index.php?action=delete_comment&comment_id=<?= $comment_id ?>&rid=<?= $rid ?>">Le supprimer</a>
                    <a class="btn btn-danger" role="button" href="index.php?action=exclude_member&pseudo=<?= $data['pseudo'] ?>"><i class="fa fa-user-times" aria-hidden="true"></i> Supprimer le commentaire et exclure le membre</a>
                </div>
            </div>
        <?php
            }
            $getReportedComment->closeCursor();
        ?>
    </section>
<!-- end div container-fluid -->
</div>