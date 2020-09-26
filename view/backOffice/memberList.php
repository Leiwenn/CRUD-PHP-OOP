    <header class="d-flex justify-content-around align-items-center bg-dark text-white">
        <h1 class="pt-2 text-center"> <?= $h1 ?> </h1>
    </header>
    
    <section class="memberList">
        <h2 class="p-2 text-center text-white ombre"> <?= $h2 ?> </h2>
        
            <div class="table-responsive p-3">
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
                        <tr class="bg-light text-dark">
                            <td><i class="far fa-user" aria-hidden="true"></i> <?= $data['pseudo'] ?></td>
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
    </section>
<!-- end div container-fluid -->
</div>