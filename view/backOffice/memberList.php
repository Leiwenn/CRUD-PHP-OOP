<header class="d-flex justify-content-around align-items-center bg-dark text-white">
    <h1 class="pt-2"> <?= $h1 ?> </h1>
</header>
 
<section class="memberList">
    <h2 class="p-2 text-center text-white ombre"> <?= $h2 ?> </h2>
    <?php
        while($data = $memberList->fetch()){
    ?>
        <div class="border bg-light rounded shadow m-3 p-2 mb-4">
            <p><i class="far fa-user" aria-hidden="true"></i> <span> <?= $data['pseudo'] ?> </span> </p>
            <p>Membre depuis le: <?= $data['registration_date_fr'] ?> </p>
            <a class="btn btn-danger" role="button" href="index.php?action=exclude_member&pseudo=<?= $data['pseudo'] ?>"><i class="fa fa-user-times" aria-hidden="true"></i> Exclure le membre</a>
            </div>
        </div>
    <?php
        }
        $memberList->closeCursor();
    ?>
</section>