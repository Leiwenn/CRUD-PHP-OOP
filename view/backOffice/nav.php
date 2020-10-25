<div class="container-fluid">
    <nav class="navbar bg-dark fixed-top navbar-expand-lg">
        <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="fas fa-bars text-white"></i></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-justified flex-column">
                <i class="far fa-bookmark navbar-brand mx-auto" aria-hidden="true"></i>
                <li class="nav-item">
                    <a class="nav-link text-white" role="button" href="index.php?action=dashboard">
                        <?= $linkHomeDashboard ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" role="button" href="index.php?action=text_editor">
                        <?= $linkTiny ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" role="button" href="index.php?action=media">
                        <?= $linkMedia ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" role="button" href="index.php">
                        <?= $linkHome ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" role="button" href="index.php?action=disconnect">
                        <?= $linkDisconnect ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>