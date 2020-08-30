<?php

namespace p4\blog\config;
use Exception;

class MemberRouter{

    public function memberRouter(){
        try{
            if(isset($_GET['action'])){
                $admin = null;
                if($_GET['action'] == 'registration'){
                    if(isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['passwordConfirm']) AND isset($_POST['mail'])){
                        $memberController = new \p4\blog\controller\MemberController();
                        $pseudo = $_POST['pseudo'];
                        $memberController->getMember($pseudo);
                        $dataDb = $memberController->getMember($pseudo);
                        $data = $dataDb->fetch();
                        if($data != false){

                            if($_POST['pseudo'] === $data['pseudo']){
                                throw new Exception('Ce pseudo est déja utilisé, merci d\'en choisir un autre.');
                            }

                            if(!preg_match('#^[a-zA-Z0-9_]{3,16}$#', $_POST['pseudo'])){
                                throw new Exception('Le pseudo ne doit contenir que des lettres et des chiffres, et doit contenir entre 3 et 16 caractères.');
                            }

                            if($_POST['password'] == $_POST['passwordConfirm']){
                                if(preg_match('#^[a-zA-Z0-9]+$#', $_POST['password']) !== 1){
                                    throw new Exception('Le mot de passe ne peut contenir que des lettres minuscules, majuscules et des chiffres');
                                }
                            }else{
                                throw new Exception('Les deux mots de passe doivent être identiques !');
                            }

                            if($_POST['mail'] == $data['mail']){
                                throw new Exception('Cet EMAIL est déja utilisé, peut être êtes-vous déja membre !');
                            }
                            if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['mail'])){
                                throw new Exception('L\'adresse ' . $_POST['mail'] . ' n\'est pas valide');
                            }
                        }

                        $_SESSION['admin'] = false;

                        $memberController->newMember($_POST['pseudo'], $_POST['mail'], $_POST['password'], 2);
                        $_SESSION['pseudo'] = $_POST['pseudo'];
                        $frontController = new \p4\blog\controller\FrontController();
                        $frontController->showHome();

                    }else{
                        throw new Exception('Merci de remplir tous les champs !');
                    }

                }elseif($_GET['action'] == 'login'){
                    if(isset($_POST['pseudo']) && isset($_POST['password'])){
                        $memberController = new \p4\blog\controller\MemberController();
                        $pseudo = $_POST['pseudo'];
                        $memberController->getMember($pseudo);
                        $dataDb = $memberController->getMember($pseudo);
                        $data = $dataDb->fetch();
                        if($data != false){
                                if(password_verify($_POST['password'], $data['passwordHache'])){
                                    if(isset($_POST['pseudo'])){                             
                                        if($data['members_category'] == 1){
                                            $admin = true;
                                        }elseif($data['members_category'] == 2){
                                            $admin = false;
                                        }
                                    }
                                }else{
                                    throw new Exception('Mot de passe invalide');
                                }
                        }else{
                            throw new Exception('Utilisateur inconnu !');
                        }

                        if(isset($_POST['checkbox'])){
                            setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
                            setcookie('password', $_POST['password'], time() + 365*24*3600, null, null, false, true);
                        }

                        $_SESSION['pseudo'] = $_POST['pseudo'];
                        
                        if($admin == true){
                            $_SESSION['admin'] = true;
                            $frontController = new \p4\blog\controller\FrontController();
                            $frontController->showHome();
                        }elseif($admin == false){
                            $_SESSION['admin'] = false;
                            $frontController = new \p4\blog\controller\FrontController();
                            $frontController->showHome();
                        }elseif($admin == null){
                            throw new Exception('Vous n\'êtes pas inscrit');
                        }
                    }else{
                        throw new Exception('Merci de remplir tous les champs !');
                    }
                }elseif($_GET['action'] == 'member_area'){
                    if(isset($_SESSION['pseudo'])){
                        $pseudo = $_SESSION['pseudo'];
                        $midOfficeController = new \p4\blog\controller\MidOfficeController();
                        $midOfficeController->showMemberArea($pseudo);
                    }
                }elseif($_GET['action'] == 'change_pseudo'){
                    if(isset($_SESSION['pseudo'])){
                        $oldPseudo = $_SESSION['pseudo'];
                        $newPseudo = $_POST['newPseudo'];
                        $midOfficeController = new \p4\blog\controller\MidOfficeController();
                        $midOfficeController->updatePseudo($oldPseudo, $newPseudo);
                        $pseudo = $newPseudo;
                        $midOfficeController->showMemberArea($pseudo);
                    }
                }elseif($_GET['action'] == 'change_password'){
                    $passwordCorrect = false;
                    if(isset($_SESSION['pseudo']) && isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])){
                        $pseudo = $_SESSION['pseudo'];
                        $currentPassword = $_POST['currentPassword'];
                        $newPassword = $_POST['newPassword'];
                        $confirmPassword = $_POST['confirmPassword'];
                        $memberController = new \p4\blog\controller\MemberController();
                        $memberController->getMember($pseudo);
                        $dataDb = $memberController->getMember($pseudo);
                        while($data = $dataDb->fetch()){
                            if(password_verify($currentPassword, $data['passwordHache'])){
                                if($newPassword === $confirmPassword){
                                    if(preg_match('#^[a-zA-Z0-9]+$#', $newPassword) !== 1){
                                        throw new Exception('Le mot de passe ne peut contenir que des lettres minuscules, majuscules et des chiffres');
                                    }else{
                                        $passwordCorrect = true;
                                    }
                                }else{
                                    throw new Exception('Les deux mots de passe doivent être identiques !');
                                }
                            }else{
                                throw new Exception('Mot de passe invalide');
                            }
                        }
                        if($passwordCorrect = true){
                            $midOfficeController = new \p4\blog\controller\MidOfficeController();
                            $midOfficeController->changePassword($pseudo, $newPassword);
                            $memberController->disconnectMember($pseudo);
                            $frontController = new \p4\blog\controller\FrontController();
                            $frontController->showHome();
                        }  
                    }else{
                        throw new Exception('Merci de remplir tous les champs !');
                    }
                }elseif($_GET['action'] == 'disconnect'){
                    $memberController = new \p4\blog\controller\MemberController();
                    $memberController->disconnectMember();
                    $frontController = new \p4\blog\controller\FrontController();
                    $frontController->showHome();
                }elseif($_GET['action'] == 'unregistration'){
                    $pseudo = $_SESSION['pseudo'];
                    $memberController = new \p4\blog\controller\MemberController();
                    $memberController->deleteMember($pseudo);
                    $frontController = new \p4\blog\controller\FrontController();
                    $frontController->showHome();
                }elseif($_GET['action'] == 'exclude_member'){
                    if($_SESSION['admin'] = true){
                        $dashboardReportController = new \p4\blog\controller\DashboardReportController();
                        $pseudo = $_GET['pseudo'];
                        $id = $_GET['comment_id'];
                        $rid = $_GET['rid'];
                        $memberController = new \p4\blog\controller\MemberController();
                        $memberController->deleteMember($pseudo);
                        $dashboardReportController->deleteComment($id);
                        $dashboardReportController->deleteReport($rid);
                        $dashboardController = new \p4\blog\controller\DashboardController();
                        $dashboardController->showDashboard();
                    }
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }else{
                $frontController = new \p4\blog\controller\FrontController();
                $frontController->showHome();
            }
        }catch(Exception $e){
            echo 'erreur : ' . $e->getMessage();
            require 'error.php';
        }
    }
}