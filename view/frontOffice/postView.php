<section class="card-deck mx-auto">

        <?php
            while ($data = $post->fetch()){
        ?>

        <article class="card mt-3 shadow single">
            <img src="public/img/<?= $data['file_name'] ?>" class="card-img-top mx-auto img-fluid" alt="<?= $data['file_description'] ?>">
            <h2 class="card-title text-center m-3"> <?= htmlspecialchars($data['title']) ?> </h2>
            <p class="card-text m-3"> <?= htmlspecialchars($data['content']) ?> </p>
            <p class="m-3"> <?= ' le ' . htmlspecialchars($data['creation_date_fr']) ?> </p>

            <a href="index.php" class="btn btn-info">Retour à la liste</a>
        </article>

        <?php
            }
        ?>

</section>