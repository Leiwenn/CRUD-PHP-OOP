<section class="editor p-4 order-2">
    <h2 class="ombre text-white text-center p-2"> <?= $h2 ?> </h2>
    <form action="index.php?action=create_new_post" method="post">
        <div class="form-group border rounded bg-white mt-4 p-2">
            <div class="row p-2">
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <label class="m-2 p-2 col shadow rounded text-info" for="img"><i class="far fa-file-image"></i> IMAGE
                    <input type="file" class="form-control-file pt-3" id="img" name="img">
                </label>
                <label class="m-2 p-2 col shadow rounded text-info" for="alt_text">Texte alternatif à l'image
                    <input type="text" class="form-control pt-3" id="alt_text" name="alt_text" aria-describedby="altHelp">
                </label>
            </div>
            <small id="altHelp" class="form-text text-muted m-2"> <?= $help ?> </small>
        </div>
        <div class="form-group border rounded bg-white mt-4 p-2">
            <label class="m-2 text-info" for="title"><i class="fas fa-paragraph"></i> TITRE</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="ex: 1 - Mon titre" required>
            <label class="m-2 text-info" for="tiny_post_content"><i class="fas fa-paragraph"></i> TEXTE</label>
            <textarea rows="20" class="form-control" name="content" id="tiny_post" placeholder="Mon texte" autocomplete="on" minlength="1"></textarea>
        </div>
        <input class="m-2 btn btn-success" type="submit" name="record" value="Enregistrer">
        <input class="m-2 btn btn-success" type="submit" name="publish" value="Publier">
    </form>
</section>           