<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
        <script src="https://cdn.tiny.cloud/1/vkynfbl0e4j0pe67n3ojtw45zkgdm178hn2rt3t0707a2mu8/tinymce/5/tinymce.min.js"></script>
        <link rel="stylesheet" type="text/css" href="public/css/styleTiny.css">
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
 
        <?php include "view/backOffice/tinyHeader.php"; ?>

        <?php 
            if(isset($_GET['action'])){
                if($_GET['action'] == 'text_editor'){
                    include "view/backOffice/tinyContent.php";
                }elseif($_GET['action'] == 'edit_post'){
                    include "view/backOffice/tinyEditPost.php";
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }
        ?>

        <script src="public/tinymce/tiny.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>