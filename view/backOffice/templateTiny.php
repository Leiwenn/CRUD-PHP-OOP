<!DOCTYPE html>
<html lang="fr">
    <head>
        <script type="text/javascript" src="public/tarteaucitron/tarteaucitron.js"></script>
        <script type="text/javascript">
            tarteaucitron.init({
                "privacyUrl": "", /* Privacy policy url => A REDIGER cf .txt */

                "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
                "cookieName": "tarteaucitron", /* Cookie name */

                "orientation": "middle", /* Banner position (top - bottom) */
                "showAlertSmall": true, /* Show the small banner on bottom right */
                "cookieslist": true, /* Show the cookie list */

                "adblocker": false, /* Show a Warning if an adblocker is detected */
                "DenyAllCta" : true, /* Show the deny all button */
                "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
                "highPrivacy": true, /* Disable auto consent is forbiden in UE */
                "handleBrowserDNTRequest": false, /* If Do Not Track set in browser == 1, disallow all */

                "removeCredit": false, /* Remove credit link if true */
                "moreInfoLink": true, /* Show more info link */
                "useExternalCss": false, /* If false, the tarteaucitron.css (css line 514 and after) file will be loaded else{my css file} */

                //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for subdomain website */

                "readmoreLink": "/cookiespolicy", /* Change the default readmore link pointing to tarteaucitron.io */
        
                "mandatory": false /* Show a message about mandatory cookies */
            });
            (tarteaucitron.job = tarteaucitron.job || []).push('facebook');
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f2c3a49501.js"></script>
        <script src="https://cdn.tiny.cloud/1/vkynfbl0e4j0pe67n3ojtw45zkgdm178hn2rt3t0707a2mu8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" type="text/css" href="public/css/styleTiny.css">
        <title> <?= $title ?> </title>
    </head>

    <body>
        <div class="bloc_page">
            
            <?= $header ?>

            <?= $content ?>
            
        </div>

        <script src="public/tinymce/tiny.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>