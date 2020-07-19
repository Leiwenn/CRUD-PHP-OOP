<header class="d-flex justify-content-around align-items-center bg-dark text-white">
    <h1 class="pt-2">Dashboard</h1>
    <h2>Commentaires</h2>
</header>

<section class="comments">
    <h3 class="p-3 bg-light p-2 rounded">En attente de publication:</h3>

    <?php
        while($data = $showCommentsAwaiting->fetch()){
            /*foreach($dataDb as $data => $value){
                $dataDb[$data] = htmlspecialchars($value);
            }*/
            if($data == null){
                echo 'Pas de nouveau commentaire en attente.';
            }else{
                $id = htmlspecialchars($data['id']);
                $post_id = htmlspecialchars($data['post_id']);
                $pseudo = htmlspecialchars($data['pseudo']);
                $title = htmlspecialchars($data['title']);
                $comment = htmlspecialchars($data['comment']);
                $comment_date = htmlspecialchars($data['comment_date_fr']);
    ?>

        <div class="m-3 p-3 shadow rounded bg-light">
            
                <p><i class="far fa-comment-dots text-info m-2"></i> <span class="font-weight-bold">Lié au billet n° </span> <?= $post_id ?></p>
                <p><span class="font-weight-bold">Auteur du commentaire:</span> <?= $pseudo ?></p> 
                <p><span class="font-weight-bold">Titre du commentaire:</span> <?= $title ?></p>
                <p><span class="font-weight-bold">Commentaire:</span> <?= $comment ?></p>
                <p><span class="font-weight-bold">Date du commentaire:</span> <?= $comment_date ?></p>

                <a class="btn btn-outline-info" role="button" href="index.php?action=publish_comment&id=<?= htmlspecialchars($id) ?>&pseudo=<?= $pseudo ?>&title=<?= htmlspecialchars($title) ?>&comment=<?= htmlspecialchars($comment) ?>&comment_date=<?= htmlspecialchars($comment_date) ?>&post_id=<?= htmlspecialchars($post_id) ?>">Publier</a>
                <a class="btn btn-outline-danger" role="button" href="index.php?action=delete_comment_awaiting&id=<?= htmlspecialchars($id) ?>">Supprimer</a>
        </div>

    <?php
        }
    }
    ?>
</section>