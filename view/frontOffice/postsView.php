<section class="postsContainer mx-auto">
    <h2 class="font-weight-bold p-3 text-center text-white ombre bg-dark rounded w-100"><i class="fas fa-feather-alt mr-2" aria-hidden="true"></i> <?= $h2 ?> </h2>
    <div class="posts card-columns pb-4">
        <?php
            while($data = $postsPagination->fetch()){
        ?>
        <article class="shadow rounded card bg-white">
            <img src="public/img/<?= $data['file_name'] ?>" class="img-fluid rounded card-img-top" alt="<?= $data['file_description'] ?>" />
            <div class="card-body">
                <h3 class="card-title text-center"> <?= $data['title'] ?> </h3>
                <p class="card-text"> <?= substr(html_entity_decode($data['content']), 0, 300) ?> ...</p>
                <a href="index.php?action=viewPost&id=<?= $data['id'] ?>" class="btn btn-info"> <?= $linkReadMore ?> </a>
            </div>
        </article>
        <?php
            }
            $postsPagination->closeCursor();
        ?>
    </div>
    <nav aria-label="Page navigation pb-4">
        <ul class="pagination justify-content-center pb-4">
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a class="page-link" href="index.php?action=viewPosts&page=<?= $currentPage - 1 ?>" aria-label="Précédente">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Précédente</span>
                </a>
            </li>
            <?php 
                for($page = 1; $page <= $nbrPages; $page++):
            ?>
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="index.php?action=viewPosts&page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
            <?php 
                endfor 
            ?>
            <li class="page-item <?= ($currentPage == $nbrPages) ? "disabled" : "" ?>">
                <a class="page-link" href="index.php?action=viewPosts&page=<?= $currentPage + 1 ?>" aria-label="Suivante">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Suivante</span>
                </a>
            </li>
        </ul>
    </nav>
</section>

<!-- end div wrapper -->
</div>