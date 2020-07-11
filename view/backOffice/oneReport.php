<header class="d-flex justify-content-around align-items-center">
    <h1> <?= $h1 ?> </h1>
    <h2> <?= $h2 ?> </h2>
</header>

<section class="reports">
    <h3 class="m-3"> <?= $h3 ?> </h3>
    <?php
        while($data = $getAReport->fetch()){
    ?>
        <p>Auteur du commentaire: <?= $data['pseudo'] ?> </p>
        <p>Titre du commentaire: <?= $data['title'] ?> </p>
        <p>Commentaire: <?= $data['comment'] ?> </p>
        <p>Date du commentaire: <?= $data['comment_date'] ?> </p>
        <a class="btn btn-info p-2 mt-2" role="button" href="index.php?action=keep_comment&commentId=<?= $data['id'] ?>">Le garder</a>
        <a class="btn btn-info p-2 mt-2" role="button" href="index.php?action=delete_comment&commentId=<?= $data['id'] ?>">Le supprimer</a>

    <?php } ?>

</section>