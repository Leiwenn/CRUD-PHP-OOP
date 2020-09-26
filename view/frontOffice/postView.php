<section class="card-deck onePostContainer mx-auto">
    <?php
        while ($data = $post->fetch()){
    ?>
    <article class="card mt-4 w-100 p-md-5 shadow single">
        <img src="public/img/<?= $data['file_name'] ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= $data['file_description'] ?>" />
        <h2 class="card-title text-center m-3"> <?= $data['title'] ?> </h2>
        <p class="card-text m-3"> <?= '<i class="fas fa-quote-left fa-2x mr-2" aria-hidden="true"></i>' . ' ' . $data['content'] ?> </p>
        <p class="m-3 text-right"> <?= ' le ' . $data['creation_date_fr'] ?> </p>
        <?php
            $postId = $data['id'];
        ?>
        <div class="btn_group">
            <!-- data-href="https://www.your-domain.com/your-page.html" -->
            <div class="fb-like" data-layout="button_count" data-action="like" data-share="false" data-size="large"></div>
            <a href="index.php?action=viewPosts" class="btn btn-info btn-sm back"> <?= $linkBack ?> </a>
        </div>
    </article>
</section>

<section class="pt-4 d-flex justify-content-around row">
    <div class="order-2 bg-light rounded p-3 col-12 col-md-4 test">
        <form class="form_comment" action="index.php?action=comment&postId=<?= $postId ?>" method="post">
            <h3 class="text-center bg-dark text-white rounded"> <?= $h3 ?> </h3>
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
            <label class="mt-4" for="title">Titre du message</label><input class="form-control" type="text" name="title" id="title" placeholder="titre" required>
            <label class="mt-4" for="comment">Votre commentaire</label><textarea rows="5" id="comment" name="comment" placeholder="commentaire" class="form-control" required></textarea>
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
    <div class="order-1 bg-light rounded p-3 col-12 col-md-6">
        <div>
            <h4 class="text-center bg-dark text-white rounded"> <?= $h4 ?> </h4>
            <?php
                while ($data = $comments->fetch()){
                    $post_concerned_id = $data['post_id'];
                    $comment_id = $data['comment_id'];
            ?>

            <div class="shadow p-3 m-3">
                <p class="font-weight-bold"><i class="fas fa-user-circle" aria-hidden="true"></i> <?= $data['pseudo'] ?>, le <?= $data['comment_date_fr'] ?></p>
                <p><span class="text-info">Titre</span></br> <?= $data['title'] ?></p>
                <p><span class="text-info">Commentaire</span></br> <?= nl2br($data['comment']) ?></p>
                <?php
                    if(isset($_SESSION['pseudo'])){
                        $comment_author = $data['pseudo'];
                ?>
                <a href="index.php?action=report&post_concerned_id=<?= $post_concerned_id ?>&comment_id=<?= $comment_id ?>&comment_author=<?= $comment_author ?>"  class="mt-2 btn btn-danger"><i class="far fa-bell"></i></a>
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
    <a id="backToTop" class="btn" role="btn"><i class="fas fa-arrow-circle-up"></i></a>
</section>

<!-- end div wrapper -->
</div>