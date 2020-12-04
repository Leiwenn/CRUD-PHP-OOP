<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
    <link rel="preload" href="public/font/cinzeldecorative-bold-webfont.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="public/font/cinzeldecorative-bold-webfont.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="public/font/roboto-regular-webfont.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="public/font/roboto-regular-webfont.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="stylesheet" type="text/css" href="public/css/styleError.css">
	<title>Erreur</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>

<body>

    <section class="row d-flex justify-content-center align-items-center">
        <div class="col-11 col-md-10 p-4 d-flex justify-content-center align-items-center flex-column rounded text-center">
            <h1>Oups !</h1>
            <p class="mt-4"> <?= '<span>' . 'Erreur : ' . '</span>' . '<br>' . $e->getMessage(); ?> </p>
            <p class="mt-2"> <?= '<span>' . 'Fichier : ' . '</span>' . '<br>' . $e->getFile(); ?> </p>
            <a href="index.php" class="btn btn-lg mt-4"><i class="fa fa-arrow-left"></i> Retour</a>
        </div>
    </section>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>