<section class="container d-flex flex-wrap p-4">
    <?php
        while($data = $posts->fetch()){
    ?>
        <article class="m-3 w-25">
            <img src="public/img/<?= $data['file_name'] ?>" class="img-fluid" alt="<?= $data['file_description'] ?>">
            <h3 class="text-center m-3"> <?= htmlspecialchars($data['title']) ?> </h3>
            <p class="m-3"> <?= substr(htmlspecialchars($data['content']), 0, 300) ?> </p>
            <a href="index.php?action=viewPost&id=<?= $data['id']; ?>" class="btn btn-info">Lire la suite</a>
        </article>
    <?php
        }
    ?>
    </div>

</section>