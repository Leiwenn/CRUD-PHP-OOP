<header class="d-flex justify-content-around align-items-center bg-dark text-white">
    <h1 class="pt-2">Dashboard</h1>
</header>
<section class="postAwaiting">
    <h2 class="ombre text-white text-center p-2"> <?= $h2 ?> </h2>
    <?php 
        while($data = $showPostAwaiting->fetch()){
            $postId = htmlspecialchars($data['id']);
            $title = $data['title'];
            $content = $data['content'];
            $file_name = htmlspecialchars($data['file_name']);
            $file_description = htmlspecialchars($data['file_description']);
            $creation_date = htmlspecialchars($data['creation_date_fr']);
    ?>
                <article class="card w-100 p-5 shadow">
                    <img src="public/img/<?= $file_name ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= $file_description ?>" />
                    <h2 class="card-title text-center m-3"> <?= $title ?></h2>
                    <p class="card-text m-3"> <?= $content ?> </p>
                    <p class="m-3"> <?= ' le ' . $creation_date ?> </p>
                    <div class="btn-group" role="group" aria-label="boutons d'actions">
                        <a href="index.php?action=publish_Post_Awaiting&postId=<?=$postId?>" class="btn btn-info">Publier</a>
                        <a href="index.php?action=edit_Post_Awaiting&postId=<?=$postId?>" class="btn btn-warning">Editer</a>
                        <a href="index.php?action=delete_Post_Awaiting&postId=<?=$postId?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </article>

    <?php
        }
        $showPostAwaiting->closeCursor();
    ?>

</section>