<section class="container d-flex p-4">
    <?php
        while($data = $posts->fetch()){
    ?>
        <article class="card shadow m-3 w-50">
            <img src="public/img/<?= $data['file_name'] ?>" class="card-img-top img-fluid" alt="<?= $data['file_description'] ?>">
            <h3 class="card-title text-center m-3"> <?= htmlspecialchars($data['title']) ?> </h3>
            <p class="card-text m-3"> <?= substr(htmlspecialchars($data['content']), 0, 300) ?> </p>
            <a href="index.php?action=viewPost&id=<?= $data['id']; ?>" class="btn btn-info">Lire la suite</a>
        </article>
    <?php
        }
    ?>
    </div>

</section>