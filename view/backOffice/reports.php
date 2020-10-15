    <header class="d-flex justify-content-around align-items-center bg-dark text-white">
        <h1 class="pt-2"> <?= $h1 ?> </h1>
    </header>

    <section class="container reports p-4">
        <h2 class="text-dark text-center p-2"> <?= $h2 ?> </h2>
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
            while($data = $getAllReports->fetch()){
                $rid = $data['rid'];
        ?>
                <div class="m-3 p-3 shadow rounded bg-white">
                    <p><i class="far fa-comment-dots text-warning m-2" aria-hidden="true"></i> Demande de <span class="font-weight-bold"><?= $data['pseudo'] ?></span> le <?= $data['report_date_fr'] ?> à propos d'un commentaire du billet: <span class="font-weight-bold"><?= $data['title'] ?></span></p>
                    <a class="btn btn-info mr-2 mt-3" role="button" href="index.php?action=show_a_report&rid=<?= $rid ?>"> <?= $link ?> </a>
                </div>
        <?php
            }
            $getAllReports->closeCursor();
        ?>
    </section>
<!-- end div container-fluid -->
</div>