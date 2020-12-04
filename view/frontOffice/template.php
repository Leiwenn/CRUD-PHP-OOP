<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <script src="public/tarteaucitron/tarteaucitron.js"></script>
        <script>
            tarteaucitron.init({
                "privacyUrl": "https://p4blog.emeline-gouault.com/index.php?action=legalNotice",
                "hashtag": "#tarteaucitron",
                "cookieName": "tarteaucitron",
                "orientation": "middle",
                "showAlertSmall": true,
                "cookieslist": true,
                "adblocker": false,
                "DenyAllCta" : true,
                "AcceptAllCta" : true,
                "highPrivacy": true,
                "handleBrowserDNTRequest": false,
                "removeCredit": false,
                "moreInfoLink": true,
                "useExternalCss": false,
                "readmoreLink": "https://p4blog.emeline-gouault.com/index.php?action=legalNotice",
                "mandatory": false
            });
            tarteaucitron.user.gtagUa = 'UA-XXXXXXXX-X';
            tarteaucitron.user.gtagMore = function () { };
            (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
            (tarteaucitron.job = tarteaucitron.job || []).push('facebook');
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
        <link rel="stylesheet" type="text/css" href="public/css/styleFrontOffice.css">
        	<!-- Primary Meta Tags -->
        <title> <?= $title ?> </title>
        <meta name="title" content="Blog de Jean Forteroche">
        <meta name="description" content="Blog de l'auteur Jean Forteroche, publication inédite de son dernier roman directement en ligne">
            <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://p4blog.emeline-gouault.com/">
        <meta property="og:title" content="Blog de Jean Forteroche">
        <meta property="og:description" content="Blog de l'auteur Jean Forteroche, publication inédite de son dernier roman directement en ligne">
        <meta property="og:image" content="public/img/book_cover.png">
            <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://p4blog.emeline-gouault.com/">
        <meta property="twitter:title" content="Blog de Jean Forteroche">
        <meta property="twitter:description" content="Blog de l'auteur Jean Forteroche, publication inédite de son dernier roman directement en ligne">
        <meta property="twitter:image" content="public/img/book_cover.png">
            <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
    </head>

    <body>
        <div class="container-fluid bg-dark">
            <div class="text-center bg-dark text-white p-3">
                <h1 class="ombre"> <?= $h1 ?> </h1>
                <nav class="navbar navbar-expand-md">
                    <button class="navbar-toggler mx-auto text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="fa fa-bars text-white" aria-hidden="true"></i></span></button>
                    <div class="collapse navbar-collapse ml-3" id="navbarSupportedContent">
                        <ul class="navbar-nav row col-12 justify-content-around mx-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php"> <?= $linkHome ?> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?action=viewPosts"> <?= $linkPostsList ?> </a>
                            </li>
                            <?php 
                                if(!is_null($linkArea)){
                            ?>
                            <li class="nav-item">
                                <?= $linkArea ?> 
                            </li>
                            <?php 
                                }
                            ?>
                            <li class="nav-item">
                                <?= $linkLog ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="wrapper">
                <?php
                    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['admin'])){
                        if(isset($_GET['action'])){
                            if(($_GET['action'] == 'viewPosts') || ($_GET['action'] == 'viewPost') || ($_GET['action'] == 'legalNotice')){
                                include 'view/frontOffice/headerNoSession.php';
                            }else{
                                include 'view/frontOffice/header.php';
                            }
                        }else{
                            include 'view/frontOffice/header.php';
                        }
                    }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == true){
                        include 'view/frontOffice/headerConnect.php';
                    }elseif(isset($_SESSION['pseudo']) && $_SESSION['admin'] == false){
                        include 'view/frontOffice/headerConnect.php';
                    }
                ?>
        
                <?php
                    if(isset($_GET['action'])){
                        if($_GET['action'] == 'viewPosts'){
                            include 'view/frontOffice/postsView.php';
                        }elseif(($_GET['action'] == 'viewPost') || ($_GET['action'] == 'comment') || ($_GET['action'] == 'report')){
                            include 'view/frontOffice/postView.php';
                        }elseif($_GET['action'] == 'legalNotice'){
                            include 'view/frontOffice/legalNotice.php';
                        }else{
                            include 'view/frontOffice/home.php';
                        }
                    }else{
                        include 'view/frontOffice/home.php';
                    }
                ?>
            <!-- end div wrapper -->
            </div>
            <footer class="bg-dark text-white">
                <?php include 'view/frontOffice/footer.php'; ?>
            </footer>
        <!-- end div container-fluid -->
        </div>
            
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="public/js/animation.js"></script>
        <script src="public/js/darkMode.js"></script>
    </body>
</html>