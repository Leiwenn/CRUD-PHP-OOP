<header class="d-flex justify-content-around align-items-center bg-dark text-white">
    <h1 class="pt-2"> <?= $h1 ?> </h1>
</header>

<section class="container postAwaiting">
    <h2 class="p-2 text-center text-dark"> <?= $h2 ?> </h2>
    <div class="card-columns">
    <?php
    while($data = $allMedia->fetch()){
    ?>
        <div class="card">
            <img class="card-img-top img-fluid" src="public/img/<?= $data['file_name'] ?>" alt="<?= $data['file_description'] ?>" />
            <div class="card-body">
                <p class="card-text"> <?= $data['file_name'] ?> </p>
                <a href="#" class="btn btn-info">Supprimer</a>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
    <?php
    $allMedia->closeCursor();
    ?>
</section>