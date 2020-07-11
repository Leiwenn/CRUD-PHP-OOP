<header class="d-flex justify-content-around align-items-center">
    <h1>Dashboard</h1>
    <h2>Commentaires</h2>
</header>

<section class="comments">
    <h3 class="m-3"><i class="far fa-comment-dots text-info m-2"></i> Commentaires en attente de publication</h3>

    <?php
        while($data = $showCommentsAwaiting->fetch()){
            if($data == null){
                echo 'Pas de nouveau commentaire en attente.';
            }else{
                $id = $data['id'];
                $post_id = $data['post_id'];
                $pseudo = $data['pseudo'];
                $title = $data['title'];
                $comment = $data['comment'];
                $comment_date = $data['comment_date_fr'];
    ?>

        <div class="m-3 p-3 shadow rounded bg-light">
            
                <p><span class="font-weight-bold">Lié au billet n° </span> <?= $post_id ?></p>
                <p><span class="font-weight-bold">Auteur du commentaire:</span> <?= $pseudo ?></p> 
                <p><span class="font-weight-bold">Titre du commentaire:</span> <?= $title ?></p>
                <p><span class="font-weight-bold">Commentaire:</span> <?= $comment ?></p>
                <p><span class="font-weight-bold">Date du commentaire:</span> <?= $comment_date ?></p>
        
                <form action="index.php?action=publish_comment&id=<?= $id ?>&pseudo=<?= $pseudo ?>&title=<?= $title ?>&comment=<?= $comment ?>&comment_date=<?= $comment_date ?>&post_id=<?= $post_id ?>" method="post">
                    <input class="btn btn-info p-2 mt-2" role="button" type="submit" value="Publier">
                </form>
                <form action="index.php?action=delete_comment_awaiting&id=<?= $id ?>" method="post">
                    <input class="btn btn-info p-2 mt-2" role="button" type="submit" value="Supprimer">
                </form>
        </div>

    <?php
        }
    }
    ?>
</section>