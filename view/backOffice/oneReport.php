<header class="d-flex justify-content-around align-items-center">
    <h1 class="pt-2"> <?= $h1 ?> </h1>
    <h2> <?= $h2 ?> </h2>
</header>

<section class="reports">
    <h3 class="p-3 bg-light p-2 rounded"> <?= $h3 ?> </h3>
    <?php
        while($data = $getReportedComment->fetch()){
            $comment_id = htmlspecialchars($data['comment_id']);
    ?>
            <div class="border bg-light rounded shadow m-3 p-2 mb-4">
                <p><i class="far fa-comment-dots text-warning" aria-hidden="true"></i> <span>Auteur du commentaire:</span> <?= htmlspecialchars($data['pseudo']) ?> </p>
                <p><span>Titre du commentaire:</span> <?= htmlspecialchars($data['title']) ?> </p>
                <p><span>Commentaire:</span> <?= htmlspecialchars($data['comment']) ?> </p>
                <p><span>Date du commentaire:</span> <?= htmlspecialchars($data['comment_date']) ?> </p>
                <div class="btn-group" role="group" aria-label="garder le commentaire ou le supprimer ou exclure le membre">
                    <a class="btn btn-info" role="button" href="index.php?action=keep_comment&comment_id=<?= $comment_id ?>">Le garder</a>
                    <a class="btn btn-warning" role="button" href="index.php?action=delete_comment&comment_id=<?= $comment_id ?>">Le supprimer</a>
                    <a class="btn btn-outline-danger" role="button" href="index.php?action=exclude_member&pseudo=<?= htmlspecialchars($data['pseudo']) ?>&comment_id=<?= htmlspecialchars($data['comment_id']) ?>&id=<?= htmlspecialchars($data['id']) ?>"><i class="fa fa-user-times" aria-hidden="true"></i> Supprimer et exclure le membre</a>
                </div>
            </div>

    <?php } ?>

</section>