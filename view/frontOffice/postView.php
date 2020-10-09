<section class="card-deck onePostContainer mx-auto">
    <?php
        while ($data = $post->fetch()){
    ?>
    <article class="card mt-4 w-100 p-md-5 shadow single">
        <img src="public/img/<?= $data['file_name'] ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= $data['file_description'] ?>" />
        <h2 class="card-title text-center m-3"> <?= $data['title'] ?> </h2>
        <p class="card-text m-3"> <?= '<i class="fas fa-quote-left fa-2x mr-2" aria-hidden="true"></i>' . ' ' . html_entity_decode($data['content']) ?> </p>
        <p class="m-3 text-right"> <?= ' le ' . $data['creation_date_fr'] ?> </p>
        <?php
            $postId = $data['id'];
        ?>
        <div class="btn_group d-flex justify-content-around">
            <!-- data-href="https://www.your-domain.com/your-page.html" -->
            <div class="fb-like" data-layout="button_count" data-action="like" data-share="false" data-size="large"></div>
            <a href="index.php?action=viewPosts" class="btn btn-info btn-sm back"> <?= $linkBack ?> </a>
        </div>
    </article>
</section>

<section class="pt-4 offset-md-2 col-md-8 col-12 offset-md-2">
    <div>
        <h3 class="text-center bg-dark text-white rounded"> <?= $h3 ?> </h3>
        <form class="form_comment" action="index.php?action=comment&postId=<?= $postId ?>" method="post">
            <fieldset class="bg-light shadow p-3 m-3 rounded">
                <p>Pseudo: 
                <?php
                    if(isset($_SESSION['pseudo'])){
                        echo '<span class="text-info">' . htmlspecialchars($_SESSION['pseudo']) . '</span>';
                    }else{
                        echo '<span class="text-info">' . 'Inscrivez-vous pour commenter' . '</span>';
                    }
                ?>
                </p>
                <?php
                    if(isset($_SESSION['pseudo'])){
                ?>
                <label class="mt-2" for="title">Titre du message</label><input class="form-control" type="text" name="title" id="title" placeholder="titre" required>
                <label class="mt-2" for="comment">Votre commentaire</label><textarea rows="5" id="comment" name="comment" placeholder="commentaire" class="form-control" required></textarea>
                <input class="mt-2 btn btn-success" type="submit" value="Valider">
                <small id="altHelp" class="form-text text-muted m-2"> <?= $help ?> </small>
            </fieldset>
            <?php
                }
            ?>
        </form>
        <?php 
            }
            $post->closeCursor();
        ?>
    </div>
    <div class="mt-4 pb-5">
        <div>
            <h4 class="text-center bg-dark text-white rounded"> <?= $h4 ?> </h4>
            <?php
                if(($comments->fetch()) == false){
            ?>
                <div class="bg-light shadow p-3 m-3 rounded">
                    <p class="font-weight-bold">Cet article n'a pas encore été commenté.</p>
                    <p>Soyez le/la premier/e !</p>
                </div>
            <?php
                }else{
                    while ($data = $comments->fetch()){
                        $post_concerned_id = $data['post_id'];
                        $comment_id = $data['comment_id'];
            ?>
                <div class="bg-light shadow p-3 m-3 rounded">
                    <p class="font-weight-bold"><i class="fas fa-user-circle" aria-hidden="true"></i> <?= $data['pseudo'] ?>, le <?= $data['comment_date_fr'] ?></p>
                    <p><span class="text-info">Titre</span></br> <?= $data['title'] ?></p>
                    <p><span class="text-info">Commentaire</span></br> <?= nl2br($data['comment']) ?></p>
                    <?php
                        if(isset($_SESSION['pseudo'])){
                            $comment_author = $data['pseudo'];
                    ?>
                    <a href="index.php?action=report&post_concerned_id=<?= $post_concerned_id ?>&comment_id=<?= $comment_id ?>&comment_author=<?= $comment_author ?>"  class="mt-2 btn btn-danger"><i class="far fa-bell"></i></a>
                </div>
                <?php
                        }
                    }
                }
                $comments->closeCursor();
            ?>
        </div>
    </div>
    <a id="backToTop" class="btn" role="btn"><i class="fas fa-arrow-circle-up"></i></a>
</section>

<!-- end div wrapper -->
</div>