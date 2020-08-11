<header class="d-flex justify-content-around align-items-center bg-dark text-white">
    <h1 class="pt-2">Dashboard</h1>
</header>
<section class="postAwaiting">
    <h2 class="p-2 text-center text-white ombre"> <?= $h2 ?> </h2>
    <?php 
        while($data = $showPostDashboard->fetch()){
    ?>
                <article class="card mt-4 w-100 p-5 shadow">
                    <img src="public/img/<?= htmlspecialchars($data['file_name']) ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= htmlspecialchars($data['file_description']) ?>" />
                    <h2 class="card-title text-center m-3"> <?= htmlspecialchars($data['title']) ?></h2>
                    <p class="card-text m-3"> <?= htmlspecialchars($data['content']) ?> </p>
                    <p class="m-3"> <?= ' le ' . htmlspecialchars($data['creation_date_fr']) ?> </p>
                    <?php $postId = htmlspecialchars($data['id']) ?>
                    <a href="index.php?action=edit_Post&id=<?= $data['id'] ?>" class="btn btn-warning">Editer</a>
                    <a href="index.php?action=delete_Post&id=<?= $data['id'] ?>" class="btn btn-danger">Supprimer</a>
                </article>

    <?php
        }
        $showPostDashboard->closeCursor();
    ?>

</section>