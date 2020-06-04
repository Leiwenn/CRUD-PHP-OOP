<section class="card-deck postsContainer w-75 pt-5 mx-auto">
    <h2 class="mt-1 mb-5 w-100 mx-auto title text-center">Liste des épisodes</h2>

    <?php
        while($data = $posts->fetch()){
    ?>

        <article class="shadow w-25 rounded mx-auto mb-4">
            <img src="public/img/<?= $data['file_name'] ?>" class="img-fluid rounded" alt="<?= $data['file_description'] ?>" />
            <h3 class="text-center m-3"> <?= htmlspecialchars($data['title']) ?> </h3>
            <p class="m-3"> <?= substr(htmlspecialchars($data['content']), 0, 300) ?> </p>
            <a href="index.php?action=viewPost&id=<?= $data['id']; ?>" class="btn btn-block">Lire la suite</a>
        </article>

    <?php
        }
    ?>

</section>