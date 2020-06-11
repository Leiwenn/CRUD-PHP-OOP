<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--icones fontawesome-->
    <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
	<link rel="stylesheet" type="text/css" href="public/css/styleDashboard.css">
	<title>Blog de Jean FORTEROCHE</title>
</head>

<body>
    <div class="bloc_page">
        
        <nav class="navbar d-flex flex-column justify-content-around fixed-top h-100">
            <img class="navbar-brand img-fluid rounded-circle" src="public/img/jeanAdmin.jpg" alt="photo de Jean Forteroche" />
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link btn btn-info" role="button" href="#">Link 1</a></li>
                <li class="nav-item"><a class="nav-link btn btn-info mt-3" role="button" href="#">Link 2</a></li>
                <li class="nav-item"><a class="nav-link btn btn-info p-2 mt-3" role="button" href="index.php">Voir le site</a></li>
            </ul>
        </nav>

        <header class=" h-25">
            <h1 class="ml-3">Dashboard</h1>
            <div class="d-flex justify-content-around">

                <div class="d-flex carte">
                    <div class="autre d-flex align-items-center justify-content-around">
                        <i class="far fa-thumbs-up"></i>
                    </div>
                    <div class="ml-3">
                        <p>une autre carte</p>
                        <p> un autre echo ? </p>
                    </div>
                </div>

                <div class="d-flex carte">
                    <div class="users d-flex align-items-center justify-content-around">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="ml-3">
                        <p>Membres du blog</p>
                        <?php while($data = $totalMembers->fetch()){ ?>
                        <p class="text-center"> <?= $data['nbre_members'] ?> </p>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </header>

        <section>
            <h2>TINY MCE ICI</h2>
        </section>

    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>