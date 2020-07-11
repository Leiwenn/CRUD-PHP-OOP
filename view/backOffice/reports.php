<header class="d-flex justify-content-around align-items-center">
    <h1> <?= $h1 ?> </h1>
    <h2> <?= $h2 ?> </h2>
</header>

<section class="reports">

    <h3 class="m-3"> <?= $h3 ?> </h3>

    <?php 
        while($data = $getAllReports->fetch()){
            var_dump($data);
            if($data == null){
                echo 'Pas de nouveau commentaire à modérer.';
            }else{
                
    ?>

        <div class="m-3 p-3 shadow rounded">
            <p><i class="far fa-comment-dots text-warning m-2"></i> Demande de <span class="font-weight-bold"><?= $data['pseudo'] ?></span> à propos du billet: <span class="font-weight-bold"><?= $data['title'] ?></span></p>
            <a class="btn btn-info mr-2 mt-3" role="button" href="index.php?action=show_a_report&rid=<?= $data['rid'] ?>">Voir le commentaire</a>
        </div>

    <?php 
            }
        }
    ?>

</section>