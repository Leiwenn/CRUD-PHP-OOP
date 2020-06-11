
<header class="h-50">

    <nav>
        <ul class="nav d-flex justify-content-between">
        <li class="nav-item m-4">
                <a href="index.php"><h1>JEAN FORTEROCHE</h1></a>
            </li>
            <li class="nav-item dropdown m-3">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MENU</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?action=dashboard"><i class="fas fa-pen-fancy"></i> Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?action=disconnect"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="heroConnect text-center">
        <p>Bonjour <?= $_SESSION['pseudo']; ?> !</p>
    </div>
</header>