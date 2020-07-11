<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--icones fontawesome-->
    <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
    <link rel="preload" href="public/font/cinzeldecorative-bold-webfont.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="public/font/cinzeldecorative-bold-webfont.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="public/font/roboto-regular-webfont.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="public/font/roboto-regular-webfont.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="stylesheet" type="text/css" href="public/css/styleMidOffice.css">
	<title>Mon profil</title>
</head>

<body>
    <div class="bloc_page">

            <nav class="navbar navbar-expand-lg bg-dark d-flex justify-content-around">
                <h1 class="ml-3"><i class="fas fa-user mr-2" aria-hidden="true"></i> Mon profil</h1>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link btn btn-outline-light" role="button" href="index.php">Retour au blog</a></li>
                </ul>
            </nav>

        <section class="p-5 d-flex justify-content-around">
            <div class="bg-light rounded p-3 shadow">
                <h2 class="p-2 pb-3">Mes informations</h2>
                <?php 
                    
                    while($data = $showOneMember->fetch()){
                ?>
                    <p>Pseudo: <?= $data['pseudo'] ?> </p>
                    <p>Mail <?= $data['mail'] ?> </p>
                    <p>Date d'inscription: <?= $data['registration_date'] ?> </p>
                <?php 
                    } 
                ?>
            </div>

            <div class="p-3 d-flex flex-column">
                <a class="btn btn-info p-2 mt-3 shadow" role="button" href="index.php?action=change_password">Changer mon mot de passe</a>
                <a class="btn btn-info p-2 mt-3 shadow" role="button" href="index.php?action=unregistration">Désinscription</a>
            </div>
        </section>

    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>