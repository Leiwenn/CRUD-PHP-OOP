<header class="d-flex justify-content-around align-items-center bg-dark text-white">
    <h1 class="pt-2">Dashboard</h1>
    <h2> <?= $h2 ?> </h2>
</header>
<section class="postAwaiting">
    <h3 class="p-3 bg-light p-2 rounded"> <?= $h3 ?> </h3>
    <?php 
        while($data = $showPostsAwaiting->fetch()){
            if($data == null){
                echo 'Pas de nouveau billet à publier.';
            }else{
    ?>
                <article class="card mt-4 w-100 p-5 shadow">
                    <img src="public/img/<?= htmlspecialchars($data['file_name']) ?>" class="card-img-top mt-3 mx-auto img-fluid" alt="<?= htmlspecialchars($data['file_description']) ?>" />
                    <h2 class="card-title text-center m-3"> <?= htmlspecialchars($data['title']) ?></h2>
                    <p class="card-text m-3"> <?= htmlspecialchars($data['content']) ?> </p>
                    <p class="m-3"> <?= ' le ' . htmlspecialchars($data['creation_date_fr']) ?> </p>
                    <?php $postId = htmlspecialchars($data['id']) ?>
                    <div class="btn-group" role="group" aria-label="  ">
                        <a href="index.php?action=  " class="btn btn-info">Publier</a>
                        <a href="index.php?action=  " class="btn btn-warning">Editer</a>
                        <a href="index.php?action=  " class="btn btn-danger">Supprimer</a>
                    </div>
                </article>

    <?php
            }
        }
    ?>

</section>