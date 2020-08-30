<section class="card-deck onePostContainer mx-auto">
    <?php
        while ($data = $post->fetch()){
    ?>
    <article class="card mt-4 w-100 p-5 shadow single">
        <img src="public/img/<?= htmlspecialchars($data['file_name']) ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= htmlspecialchars($data['file_description']) ?>" />
        <h2 class="card-title text-center m-3"> <?= htmlspecialchars($data['title']) ?> </h2>
        <p class="card-text m-3"> <?= '<i class="fas fa-quote-left fa-2x mr-2"></i>' . ' ' . htmlspecialchars($data['content']) ?> </p>
        <p class="m-3"> <?= ' le ' . htmlspecialchars($data['creation_date_fr']) ?> </p>
        <?php
            $postId = htmlspecialchars($data['id'])
        ?>
        <a href="index.php?action=viewPosts" class="btn btn-info"> <?= $linkBack ?> </a>
    </article>
</section>

<section class="pt-4 d-flex flex-wrap justify-content-around">
    <div class="order-2 w-25 bg-light rounded p-2">
        <form action="index.php?action=comment&postId=<?= $postId ?>" method="post">
            <h3> <?= $h3 ?> </h3>
            <p>Pseudo: 
            <?php
                if(isset($_SESSION['pseudo'])){
                    echo '<span class="text-info">' . htmlspecialchars($_SESSION['pseudo']) . '</span>';
                }else{
                    echo '<span class="text-info">' . 'Inscrivez-vous pour pouvoir commenter' . '</span>';
                }
            ?>
            </p>
            <?php
                if(isset($_SESSION['pseudo'])){
            ?>
            <label class="mt-4" for="title">Titre du message</label><input class="form-control" type="text" name="title" id="title" placeholder="titre" <?= htmlspecialchars('title'); ?> required>
            <label class="mt-4" for="comment">Votre commentaire</label><textarea rows="5" id="comment" name="comment" placeholder="commentaire" class="form-control" <?= htmlspecialchars('comment'); ?> required></textarea>
            <input class="mt-4 btn btn-success" type="submit" value="Valider">
            <?php
                }
            ?>
        </form>
        <?php 
            }
            $post->closeCursor();
        ?>
    </div>
    <div class="order-1 w-50 bg-light rounded p-2">
        <div>
            <h4> <?= $h4 ?> </h4>
            <?php
                while ($data = $comments->fetch()){
                    $post_concerned_id = $data['post_id'];
                    $comment_id = $data['comment_id'];
            ?>

            <div class="shadow p-3 m-3">
                <p class="font-weight-bold"> <?= htmlspecialchars($data['pseudo']) ?>, le <?= htmlspecialchars($data['comment_date_fr']) ?></p>
                <h5><span class="text-info">Titre</span></br> <?= htmlspecialchars($data['title']) ?></h5>
                <p><span class="text-info">Commentaire</span></br> <?= nl2br(htmlspecialchars($data['comment'])) ?></p>
                <?php
                    if(isset($_SESSION['pseudo'])){
                ?>
                <a href="index.php?action=report&post_concerned_id=<?= $post_concerned_id ?>&comment_id=<?= $comment_id ?>"  class="mt-2 btn btn-danger"><i class="far fa-bell"></i></a>
                <?php
                    }
                ?>
            </div>
            <?php
                }
                $comments->closeCursor();
            ?>
        </div>
    </div>
</section>

<!-- end div wrapper -->
</div>