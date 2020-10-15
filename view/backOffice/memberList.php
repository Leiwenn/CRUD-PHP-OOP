    <header class="d-flex justify-content-around align-items-center bg-dark text-white">
        <h1 class="pt-2 text-center"> <?= $h1 ?> </h1>
    </header>
    
    <section class="container p-4 memberList">
        <h2 class="p-2 text-center text-dark"> <?= $h2 ?> </h2>
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
            <div class="table-responsive m-4 p-2 shadow mx-auto">
                <table class="table table-hover table-sm text-white">
                    <thead>
                        <tr class="bg-dark">
                            <th scope="col" class="w-25">Pseudo</th>
                            <th scope="col" class="w-25">Mail</th>
                            <th scope="col" class="w-25">Date d'inscription</th>
                            <th scope="col" class="w-25">Modération</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($data = $memberList->fetch()){
                    ?>
                        <tr class="bg-white text-dark">
                            <td class="font-weight-bold"><i class="far fa-user text-info" aria-hidden="true"></i> <?= $data['pseudo'] ?></td>
                            <td><?= $data['mail'] ?></td>
                            <td><?= $data['registration_date_fr'] ?></td>
                            <td><a class="btn btn-sm btn-danger" role="button" href="index.php?action=exclude_member&pseudo=<?= $data['pseudo'] ?>"><i class="fa fa-user-times" aria-hidden="true"></i> Exclure</a></td>
                        </tr>
                    <?php
                        }
                        $memberList->closeCursor();
                    ?>
                    </tbody>
                </table>
            </div>
            <a id="backToTop" title="retour en haut de page" class="btn"><i class="fas fa-arrow-circle-up"></i></a>
    </section>
<!-- end div container-fluid -->
</div>