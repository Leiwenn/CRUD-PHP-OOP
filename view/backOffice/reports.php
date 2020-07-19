<header class="d-flex justify-content-around align-items-center bg-dark text-white">
    <h1 class="pt-2"> <?= $h1 ?> </h1>
    <h2> <?= $h2 ?> </h2>
</header>

<section class="reports pb-4">
    <h3 class="p-3 bg-light p-2 rounded"> <?= $h3 ?> </h3>
    <?php 
        while($data = $getAllReports->fetch()){
            if($data == null){
                echo 'Pas de nouveau commentaire à modérer.';
            }else{
                $rid = htmlspecialchars($data['rid']);
    ?>
                <div class="m-3 p-3 shadow rounded bg-light">
                    <p><i class="far fa-comment-dots text-warning m-2"></i> Demande de <span class="font-weight-bold"><?= htmlspecialchars($data['pseudo']) ?></span> à propos d'un commentaire du billet: <span class="font-weight-bold"><?= htmlspecialchars($data['title']) ?></span></p>
                    <a class="btn btn-info mr-2 mt-3" role="button" href="index.php?action=show_a_report&rid=<?= $rid ?>">Voir le commentaire</a>
                </div>
    <?php
            }
        }
    ?>
</section>