<div class="text-center bg-dark text-white p-3">
    <h1>JEAN FORTEROCHE</h1>
    <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler mx-auto text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav row col-12">
                <li class="nav-item col-12 col-md-3">
                    <a class="nav-link text-white" href="index.php">Accueil</a>
                </li>
                <li class="nav-item col-12 col-md-3">
                    <a class="nav-link text-white" href="index.php?action=viewPosts">Liste des épisodes</a>
                </li>
                <li class="nav-item col-12 col-md-3">
                    <a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>
                </li>
                <li class="nav-item col-12 col-md-3">
                    <a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="wrapper pb-5">
    <header class="pt-5 mb-5">
        <div class="text-center rounded shadow w-25 p-3 mx-auto bg-white">
            <p class="cinzel">Bonjour <?= htmlspecialchars($_SESSION['pseudo']) ?> </p>
            <p>Qu'allez vous faire aujourd'hui ?</p>
        </div>
    </header>
