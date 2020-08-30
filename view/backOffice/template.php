<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
    <link rel="preload" href="public/font/cinzeldecorative-bold-webfont.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="public/font/cinzeldecorative-bold-webfont.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="public/font/cinzel-bold-webfont.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="public/font/cinzel-bold-webfont.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="public/font/roboto-regular-webfont.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="public/font/roboto-regular-webfont.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="stylesheet" type="text/css" href="public/css/styleDashboard.css">
	<title> <?= $title ?> </title>
</head>

<body>
    <div class="bloc_page">
        <nav class="navbar bg-dark d-flex flex-column justify-content-around fixed-top h-100">
            <img class="navbar-brand img-fluid rounded-circle" src="public/img/jeanAdmin.jpg" alt="photo de Jean Forteroche" />
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-info p-2" role="button" href="index.php?action=dashboard"> <?= $linkHomeDashboard ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light  p-2 mt-3" role="button" href="index.php?action=text_editor"> <?= $linkTiny ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-warning  p-2 mt-3" role="button" href="index.php?action=comments_awaiting"> <?= $linkComments ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger p-2 mt-3" role="button" href="index.php?action=show_reports"> <?= $linkReports ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-info p-2 mt-3" role="button" href="index.php"> <?= $linkHome ?> </a>
                </li>
            </ul>
        </nav>

        <?= $content ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>