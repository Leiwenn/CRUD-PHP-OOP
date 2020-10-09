<!DOCTYPE html>
<html lang="fr">
    <head>
        <script type="text/javascript" src="public/tarteaucitron/tarteaucitron.js"></script>
        <script type="text/javascript">
            tarteaucitron.init({
                "privacyUrl": "http://localhost/P4_GOUAULT_EMELINE/index.php?action=legalNotice",                           
                "hashtag": "#tarteaucitron",
                "cookieName": "tarteaucitron",
                "orientation": "middle",
                "showAlertSmall": false,
                "cookieslist": true,
                "adblocker": false,
                "DenyAllCta" : true,
                "AcceptAllCta" : true,
                "highPrivacy": true,
                "handleBrowserDNTRequest": false,
                "removeCredit": false,
                "moreInfoLink": true,
                "useExternalCss": false,
                "readmoreLink": "http://localhost/P4_GOUAULT_EMELINE/index.php?action=legalNotice", /* URL A CHANGER */
                "mandatory": false
            });
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
        <link rel="stylesheet" type="text/css" href="public/css/styleMidOffice.css">
        	<!-- Primary Meta Tags -->
        <title> <?= $title ?> </title>
        <meta name="title" content="Espace membre du Blog de Jean Forteroche">
        <meta name="description" content="Blog de l'auteur Jean Forteroche, publication inédite de son dernier roman directement en ligne">
            <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://p3velo.emeline-gouault.com/"><!-- URL A CHANGER -->
        <meta property="og:title" content="Blog de Jean Forteroche">
        <meta property="og:description" content="Blog de l'auteur Jean Forteroche, publication inédite de son dernier roman directement en ligne">
        <meta property="og:image" content="public/img/book_cover.png">
            <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://p3velo.emeline-gouault.com/"><!-- URL A CHANGER -->
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
        <div class="container-fluid">

            <?php include 'view/midOffice/nav.php'; ?>    

            <?php include 'view/midOffice/home.php'; ?>

        </div>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript">
            tarteaucitron.user.gtagUa = 'UA-XXXXXXXX-X';
            tarteaucitron.user.gtagMore = function () { };
            (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
            (tarteaucitron.job = tarteaucitron.job || []).push('facebook');
        </script>
    </body>
</html>