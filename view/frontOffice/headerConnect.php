<nav class="text-center bg-dark text-white p-3">
    <h1>JEAN FORTEROCHE</h1>
    <ul class="nav d-flex justify-content-between">
        <li class="nav-item">
            <a class="nav-link text-white" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="index.php?action=viewPosts">Liste des épisodes</a>
        </li>
        <li>
            <a class="nav-link text-white" href="index.php?action=member_area">Mon profil</a>
        </li>
        <li>
            <a class="nav-link text-white" href="index.php?action=disconnect">Déconnexion</a>
        </li>
        <li>
            <a class="nav-link text-white" href="index.php?action=unregistration">Désinscription</a>
        </li>
    </ul>
</nav>

<div class="wrapper">
    <header class="h-50 p-5">
        <div class="text-center h3 mt-5">
            <p>Bonjour <?= $_SESSION['pseudo']; ?> !</p>
        </div>
    </header>