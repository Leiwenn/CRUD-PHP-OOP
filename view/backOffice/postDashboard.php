    <header class="d-flex justify-content-around align-items-center bg-dark text-white">
        <h1 class="pt-2"> <?= $h1 ?> </h1>
    </header>

    <section class="container postAwaiting">
        <h2 class="p-2 text-center text-dark"> <?= $h2 ?> </h2>
        <?php 
            while($data = $showPostDashboard->fetch()){
        ?>

        <article class="card mt-4 w-100 p-5 shadow">
            <img src="public/img/<?= $data['file_name'] ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= $data['file_description'] ?>" />
            <h3 class="card-title text-center m-3"> <?= $data['title'] ?></h3>
            <p class="card-text m-3"> <?= html_entity_decode($data['content']) ?> </p>
            <p class="m-3"> <?= ' le ' . $data['creation_date_fr'] ?> </p>
            <?php 
                $id = $data['id'];
            ?>
            <div class="btn-group" role="group" aria-label="boutons d'actions">
                <?php
                    if($data['published'] == 0){
                ?>
                <a href="index.php?action=publish_post_awaiting&postId=<?= $id ?>" class="btn btn-info">Publier</a>
                <?php
                    }
                ?>
                <a href="index.php?action=edit_post&id=<?= $id ?>" class="btn btn-warning"> <?= $linkEdit ?> </a>
                <a href="index.php?action=delete_post&postId=<?= $id ?>" class="btn btn-danger"> <?= $linkDelete ?> </a>
            </div>
        </article>

        <?php
            }
            $showPostDashboard->closeCursor();
        ?>
        <a id="backToTop" title="retour en haut de page" class="btn"><i class="fas fa-arrow-circle-up"></i></a>
    </section>
<!-- end div container-fluid -->
</div>