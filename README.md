# P4_BLOG
Projet étudiant_création d'un blog en PHP POO, BDD MySQL et éditeur de texte TinyMCE

ETAPE 1
- mise en place squelette MVC
- creation des classes: PostController/DbManager/PostManager
(création de Posts test en DB)
- creation des vues: template/postsView/postView/header/headerSingle
- début mise en forme CSS/BOOTSTRAP

ETAPE 2
- ajout de namespaces
- creation de CommentManager/CommentController
- affichage des commentaires/formulaire de leur ajout
(création de commentaire test en DB)
- installation de composer

ETAPE 3 MEMBERS
Etape 3-1
- nouvelle branche members
- Création des classes MemberManager/MemberController

Etape 3-2
- Ajout Modal pour inscription/connexion
- préparation index.php action=registration/action=login
- modification CSS/BOOTSTRAP

Etape 3-3
- update de index.php pour les actions login/registration/disconnect
- update de MemberController/MemberManager 
    (insertion correcte en DB vérifiée)
    (ajout des fonctions disconnect/unsuscribe)
- ajout de fonts/compression des images
- création de headerConnect/HeaderAdmin

Etape 3-4
- création du membre admin en DB
- ajout du dossier backOffice dans view avec dashboard.php
- création de DashboardController avec 1 widget 
(nombre de membres)
- update de index.php action=dashboard
- amélioration header/nav
- css styleDashboard.css

Etape 4-1 COMMENTS et backOffice gestion des reports
- nouvelle branche comments
- creation du midOffice
- update de index.php action=comment/report/member_area pour les membres
et action=show_reports/text_editor pour dashboard
- creation de FrontController/DashboardManager/update de DashboardController
- view/backOffice: création de template/reports/editor

Etape 4-2
- debut backOffice gestion des reports

Etape 4-3
- correction JOIN requete getReports du dashboardManager
- creation de "mes commentaires" dans member-area
- correction dashboard publish comment_awaiting
- correction JOIN requete getReportedComment du DashboardReportManager
- correction member-area unregistration
- correction dashboard exclude_member
- ajout .htacess rewrite url et gestion des erreurs
- creation de error.php à la racine => gestion de l'affichage des erreurs
- ajout d'un else dans index.php pour gestion 404

Etape 5 TinyMCE et optimisation DB
- intégration TinyMCE
- ajout input file pour img et text pour alt
- action=record_post (peuvent etre enregistrés sans file_description et sans file_name)
- action=editPostAwaiting avec Tiny / action=deletePostAwaiting / action=publishPostAwaiting
- creation dans viewPostDashboard action=editPost avec tiny
- optimisation DB -> suppression des tables posts_awaiting et comments_awaiting
- class dataBase passée en abstract
- update Dashboard = pouvoir lire les billets dans le dashboard + ajout date dans report + redirection apres report
- correction delete_comment & change_password

Etape 6 Refactoring

Etape 7 Security
- refactorisation routers et controllers
- protection -> faille XSS _ injections SQL
- ajout sleep(1) dans des functions d'envoi de formulaire
- installation tarteaucitron RGPD

Etape 8 tests/corrections
- test de chaque $_GET['action']
- correction requete setReport
- correction deletePost($id)
- correction deleteMember($pseudo)
- refactorisation
- création "mentions légales", "liste des membres"

Etape 8 CSS-JS
- css/responsive/Meta Tags
- accessibilité
- bouton backToTop

Etape 9 corrections
- correction deleteCommentRoute()
- correction TinyController()
- php pagination
- clean des require / include pour les templates
- vérification du cross browser

ETAPE 10 
- updateDate publish post awaiting
- ajout toogle dark mode pour la lecture d'un article
- upload img
- site ONLINE
- https
- mise à jour des URL du site dans le code
- creation et ajout du sitemap/google search console
