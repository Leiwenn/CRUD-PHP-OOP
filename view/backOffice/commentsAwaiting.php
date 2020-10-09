    <header class="d-flex justify-content-around align-items-center bg-dark text-white">
        <h1 class="pt-2"><?= $h1 ?> </h1>
    </header>

    <section class="comments">
        <h2 class="p-2 text-center text-white ombre"> <?= $h2 ?> </h2>
        <?php
            while($data = $showCommentsAwaiting->fetch()){
                $id = $data['id'];
                $pseudo = $data['pseudo'];
                $commentTitle = $data['title'];
                $comment = $data['comment'];
                $comment_date = $data['comment_date_fr'];
                $post_id = $data['post_id'];
        ?>
        <div class="m-3 p-3 shadow rounded bg-light">
            <p><i class="far fa-comment-dots text-info m-2" aria-hidden="true"></i> <span class="font-weight-bold"> <?= $postNumber ?> </span> <?= $post_id ?></p>
            <p><span class="font-weight-bold"> <?= $theAuthor ?> </span> <?= $pseudo ?></p> 
            <p><span class="font-weight-bold"> <?= $theTitle ?> </span> <?= $commentTitle ?></p>
            <p><span class="font-weight-bold"> <?= $theComment ?> </span> <?= $comment ?></p>
            <p><span class="font-weight-bold"> <?= $theDate ?> </span> <?= $comment_date ?></p>
            <a class="btn btn-outline-info" role="button" href="index.php?action=publish_comment&id=<?= $id ?>"> <?= $publish ?> </a>
            <a class="btn btn-outline-danger" role="button" href="index.php?action=delete_comment_awaiting&id=<?= $id ?>"> <?= $delete ?> </a>
        </div>
        <?php
            }
            $showCommentsAwaiting->closeCursor();
        ?>
    </section>
<!-- end div container-fluid -->
</div>