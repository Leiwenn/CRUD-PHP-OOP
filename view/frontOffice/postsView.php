<section class="card-deck postsContainer mx-auto">
    <h2 class="mt-3 mb-5 w-100 mx-auto text-center"> <?= $h2 ?> </h2>
    <div class="posts">
    <?php
        while($data = $posts->fetch()){
    ?>
    <article class="shadow rounded">
        <img src="public/img/<?= $data['file_name'] ?>" class="img-fluid rounded" alt="<?= $data['file_description'] ?>" />
        <div class="overlay text-right">
            <h3 class="text-center m-3"> <?= $data['title'] ?> </h3>
            <p class="m-3"> <?= substr($data['content'], 0, 200) ?> </p>
            <a href="index.php?action=viewPost&id=<?= $data['id'] ?>" class="btn mr-3"> <?= $linkReadMore ?> </a>
        </div>
    </article>
    <?php
        }
        $posts->closeCursor();
    ?>
    </div>
</section>

<!-- end div wrapper -->
</div>