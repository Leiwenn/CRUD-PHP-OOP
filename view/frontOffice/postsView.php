    <section class="card-deck postsContainer mx-auto">
        <h2 class="mt-3 mb-5 w-100 mx-auto text-center">BILLET SIMPLE POUR L'ALASKA</h2>
        <div class="posts">
            <?php
                while($data = $posts->fetch()){
            ?>

                <article class="shadow rounded">
                    <img src="public/img/<?= htmlspecialchars($data['file_name']) ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($data['file_description']) ?>" />
                    <div class="overlay text-right">
                        <h3 class="text-center m-3"> <?= htmlspecialchars($data['title']) ?> </h3>
                        <p class="m-3"> <?= substr(htmlspecialchars($data['content']), 0, 200) ?> </p>
                        <a href="index.php?action=viewPost&id=<?= htmlspecialchars($data['id']) ?>" class="btn mr-3">Lire la suite</a>
                    </div>
                </article>

            <?php
                    $req->closeCursor();
                }
            ?>
        </div>
    </section>
<!-- fin de div wrapper -->
</div>