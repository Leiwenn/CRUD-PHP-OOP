<section class="card-deck postsContainer mx-auto">
    <h2 class="font-weight-bold p-3 text-center text-white ombre bg-dark rounded w-100"><i class="fas fa-feather-alt mr-2" aria-hidden="true"></i> <?= $h2 ?> </h2>
    <div class="posts">
        <?php
            while($data = $posts->fetch()){
        ?>
        <article class="shadow rounded">
            <img src="public/img/<?= $data['file_name'] ?>" class="img-fluid rounded img-thumbnail" alt="<?= $data['file_description'] ?>" />
            <div class="text-left m-3">
                <h3 class="text-center"> <?= $data['title'] ?> </h3>
                <p> <?= substr($data['content'], 0, 300) ?> ...</p>
                <a href="index.php?action=viewPost&id=<?= $data['id'] ?>" class="btn btn-info btn-sm" type="button"> <?= $linkReadMore ?> </a>
            </div>
        </article>
        <?php
            }
            $posts->closeCursor();
        ?>
    </div>
    <a id="backToTop" class="btn" role="btn"><i class="fas fa-arrow-circle-up"></i></a>
</section>

<!-- end div wrapper -->
</div>