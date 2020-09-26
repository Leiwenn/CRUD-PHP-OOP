<div class="container-fluid">
    <div class="text-center bg-dark text-white p-3">
        <h1 class="ombre"> <?= $h1 ?> </h1>
        <nav class="navbar navbar-expand-md">
            <button class="navbar-toggler mx-auto text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span></button>
            <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
                <ul class="navbar-nav row col-12 mx-auto">
                    <li class="nav-item col-12 col-md-3">
                        <a class="nav-link text-white" href="index.php"> <?= $linkHome ?> </a>
                    </li>
                    <li class="nav-item col-12 col-md-3">
                        <a class="nav-link text-white" href="index.php?action=viewPosts"> <?= $linkPostsList ?> </a>
                    </li>
                    <li class="nav-item col-12 col-md-3">
                        <?= $linkArea ?> 
                    </li>
                    <li class="nav-item col-12 col-md-3">
                        <a class="nav-link text-white" href="index.php?action=disconnect"> <?= $linkDisconnect ?> </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="wrapper pt-5 pb-5">
        <header class="text-center headerConnect">
            <p class="cinzel ombre text-white"> <?= $hello ?> </p>
            <p class="ombre text-white"> <?= $message ?> </p>
        </header>