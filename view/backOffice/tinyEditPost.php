<section class="editor p-4 order-2">
    <h2 class="p-3 bg-info text-white p-2 rounded"> <?= $h2 ?> </h2>
    <?php 
        while($data = $editPost->fetch()){
    ?>
    <form action="index.php?action=update_post&id=<?= $data['id'] ?>&title=<?= $data['title'] ?>&content=<?= $data['content'] ?>&file_name=<?= $data['file_name'] ?>&file_description=<?= $data['file_description'] ?>" method="post">
        <div class="form-group border rounded bg-white mt-4 p-2">
            <div class="row p-2">
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <label class="m-2 p-2 col shadow rounded text-info" for="img"><i class="far fa-file-image"></i> IMAGE
                    <input type="file" class="form-control-file pt-3" id="img" name="file_name">
                    <small id="imgHelp" class="form-text text-muted m-2"> <?= $imgHelp ?> </small>
                </label>
                <label class="m-2 p-2 col shadow rounded text-info" for="alt_text">Texte alternatif à l'image
                    <input value="<?= $data['file_description'] ?>" type="text" class="form-control pt-3" id="alt_text" name="file_description" aria-describedby="altHelp">
                    <small id="altHelp" class="form-text text-muted m-2"> <?= $altHelp ?> </small>
                </label>
            </div>
        </div>
        <div class="form-group border rounded bg-white mt-4 p-2">
            <label class="m-2 text-info" for="title"><i class="fas fa-paragraph"></i> TITRE</label>
            <input value="<?= $data['title'] ?>" type="text" class="form-control" id="title" name="title" placeholder="ex: 1 - Mon titre" required>
            <label class="m-2 text-info" for="tiny_post_content"><i class="fas fa-paragraph"></i> TEXTE</label>
            <textarea rows="20" class="form-control" name="content" id="tiny_post" autocomplete="on" minlength="1"> <?= $data['content'] ?> </textarea>
        </div>
        <div class="btn-group" role="group" aria-label="boutons d'actions">
            <input class="btn btn-info" type="submit" name="update" value="Enregistrer">
            <input class="btn btn-danger" type="submit" name="delete" value="Supprimer">
        </div>
    <?php
        }
        $editPost->closeCursor();
    ?>
        
    </form>
</section>