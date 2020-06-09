<section class="card-deck onePostContainer mx-auto">

        <?php
            while ($data = $post->fetch()){
        ?>

        <article class="card mt-4 w-100 shadow single">
            <img src="public/img/<?= $data['file_name'] ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= $data['file_description'] ?>" />
            <h2 class="card-title text-center m-3"> <?= htmlspecialchars($data['title']) ?> </h2>
            <p class="card-text m-3"> <?= htmlspecialchars($data['content']) ?> </p>
            <p class="m-3"> <?= ' le ' . htmlspecialchars($data['creation_date_fr']) ?> </p>

            <a href="index.php" class="btn btn-info">Retour à la liste</a>
        </article>

</section>

<section class="pt-4 d-flex flex-wrap justify-content-around">

    <div class="order-2 w-25 bg-light rounded p-2">
        <form action="index.php?action=comment<?= $data['id']; ?>" method="post">
            <h3>Ajouter un commentaire</h3>
            <label class="mt-4" for="pseudo">Pseudo</label><input class="form-control" type="text" name="pseudo" id="pseudo" placeholder="pseudo" <?= htmlspecialchars('pseudo'); ?> required>
                        
            <label class="mt-4" for="title">Titre du message</label><input class="form-control" type="text" name="title" id="title" placeholder="titre" <?= htmlspecialchars('title'); ?> required>

            <label class="mt-4" for="comment">Votre commentaire</label><textarea rows="5" id="comment" name="comment" class="form-control" <?= htmlspecialchars('comment'); ?> required></textarea>

            <input class="mt-4 btn btn-success" type="submit" value="Valider">
        </form>

        <?php
            }
        ?>
    </div>

    <div class="order-1 w-50 bg-light rounded p-2">
        <div>
            <h4>Commentaires</h4>
            <?php
                while ($comment = $comments->fetch()){
            ?>
            
            <p> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <a href="index.php?action=report" data-toggle="tooltip" title="Modération" class="mt-2 btn btn-danger"><i class="far fa-bell"></i></a>
            <!--<form action="index.php?action=report" method="POST">
                <input class="mt-2 btn btn-danger" type="report" name="report" id="report" value="Modération" >
            </form>-->
                
            <?php
                }
            ?>
        </div>
    </div>

</section>