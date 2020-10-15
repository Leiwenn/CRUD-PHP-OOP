<?php

namespace p4\blog\config;
use Exception;

class MemberRouter{

    public function memberRouter(){
        
            if(isset($_GET['action'])){
                if($_GET['action'] == 'registration'){
                    $this->registrationRoute();
                }elseif($_GET['action'] == 'login'){
                    $this->loginRoute();
                }elseif($_GET['action'] == 'member_area'){
                    $this->memberAreaRoute();
                }elseif($_GET['action'] == 'change_pseudo'){
                    $this->changePseudoRoute();
                }elseif($_GET['action'] == 'change_password'){
                    $this->changePasswordRoute();
                }elseif($_GET['action'] == 'disconnect'){
                    $this->disconnectRoute();
                }elseif($_GET['action'] == 'unregistration'){
                    $this->unregistrationRoute();
                }elseif($_GET['action'] == 'exclude_member'){
                    $this->excludeMemberRoute();
                }else{
                    http_response_code(404);
                    require '404.php';
                }
            }else{
                $this->showHomeRoute();
            }
    }

    private function registrationRoute(){
        if(isset($_POST['registration_pseudo'], $_POST['registration_password'], $_POST['passwordConfirm'], $_POST['mail'])){
            sleep(1);
            $memberController = new \p4\blog\controller\MemberController();
            $pseudo = htmlspecialchars($_POST['registration_pseudo']);
            $password = htmlspecialchars($_POST['registration_password']);
            $paswordConfirm = htmlspecialchars($_POST['passwordConfirm']);
            $mail = htmlspecialchars($_POST['mail']);
            $memberController->getMember($pseudo);
            $dataDb = $memberController->getMember($pseudo);
            $data = $dataDb->fetch();
            if($data != false){
                if($pseudo == $data['pseudo']){
                    throw new Exception('Ce pseudo est déja utilisé, merci d\'en choisir un autre.');
                }
                if($mail == $data['mail']){
                    throw new Exception('Cette adresse mail est déja utilisée, peut être êtes-vous déja membre !');
                }
            }
            if(!preg_match('#^[a-zA-Z0-9_]{3,16}$#', $pseudo)){
                throw new Exception('Le pseudo ne doit contenir que des lettres et des chiffres, et doit contenir entre 3 et 16 caractères.');
            }
            if($password == $paswordConfirm){
                if(preg_match('#^[a-zA-Z0-9]+$#', $password) !== 1){
                    throw new Exception('Le mot de passe ne peut contenir que des lettres minuscules, majuscules et des chiffres');
                }
            }else{
                throw new Exception('Les deux mots de passe doivent être identiques !');
            }
            if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $mail)){
                throw new Exception('L\'adresse ' . $mail . ' n\'est pas valide');
            }
            $_SESSION['admin'] = false;
            $memberController->newMember($pseudo, $mail, $password);
            $_SESSION['pseudo'] = $pseudo;
            $this->showHomeRoute();
        }else{
            throw new Exception('Merci de remplir tous les champs !');
        }
    }

    private function loginRoute(){
        $admin = null;
        if(isset($_POST['pseudo'], $_POST['password'])){
            sleep(1);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            $memberController = new \p4\blog\controller\MemberController();
            $memberController->getMember($pseudo);
            $dataDb = $memberController->getMember($pseudo);
            $data = $dataDb->fetch();
            if($data != false){
                if(password_verify($password, $data['passwordHache'])){
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
                setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
                setcookie('password', $password, time() + 365*24*3600, null, null, false, true);
            }
            $_SESSION['pseudo'] = $pseudo;
            if($admin == true){
                $_SESSION['admin'] = true;
                $this->showHomeRoute();
            }elseif($admin == false){
                $_SESSION['admin'] = false;
                $this->showHomeRoute();
            }elseif($admin == null){
                throw new Exception('Vous n\'êtes pas inscrit');
            }
        }else{
            throw new Exception('Merci de remplir tous les champs !');
        }
    }

    private function memberAreaRoute(){
        if(isset($_SESSION['pseudo'])){
            $pseudo = $_SESSION['pseudo'];
            $midOfficeController = new \p4\blog\controller\MidOfficeController();
            $midOfficeController->showMemberArea($pseudo);
        }
    }

    private function changePseudoRoute(){
        if(isset($_SESSION['pseudo'])){
            sleep(1);
            $pseudo = $_SESSION['pseudo'];
            $oldPseudo = $_SESSION['pseudo'];
            $newPseudo = htmlspecialchars($_POST['newPseudo']);
            $memberController = new \p4\blog\controller\MemberController();
            $memberController->getMember($pseudo);
            $dataDb = $memberController->getMember($pseudo);
            while($data = $dataDb->fetch()){
                if($newPseudo !== $data['pseudo']){
                    $midOfficeController = new \p4\blog\controller\MidOfficeController();
                    $midOfficeController->updatePseudo($oldPseudo, $newPseudo);
                    $pseudo = $newPseudo;
                    $midOfficeController->showMemberArea($pseudo);
                }else{
                    throw new Exception('Ce pseudo est déja utilisé, merci d\'en choisir un autre.');
                    
                }
            }
        }
    }

    private function changePasswordRoute(){
        $passwordCorrect = false;
        if(isset($_SESSION['pseudo'], $_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmPassword'])){
            sleep(1);
            $pseudo = $_SESSION['pseudo'];
            $currentPassword = htmlspecialchars($_POST['currentPassword']);
            $newPassword = htmlspecialchars($_POST['newPassword']);
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
            $memberController = new \p4\blog\controller\MemberController();
            $memberController->getMember($pseudo);
            $dataDb = $memberController->getMember($pseudo);
            while($data = $dataDb->fetch()){
                if(password_verify($currentPassword, $data['passwordHache'])){
                    if($newPassword == $confirmPassword){
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
            if($passwordCorrect == true){
                $midOfficeController = new \p4\blog\controller\MidOfficeController();
                $midOfficeController->changePassword($pseudo, $newPassword);
                $memberController->disconnectMember($pseudo);
                $this->showHomeRoute();
            }

        }else{
            throw new Exception('Merci de remplir tous les champs !');
        }
    }

    private function disconnectRoute(){
        $memberController = new \p4\blog\controller\MemberController();
        $memberController->disconnectMember();
        $this->showHomeRoute();
    }

    private function unregistrationRoute(){
        $pseudo = $_SESSION['pseudo'];
        $memberController = new \p4\blog\controller\MemberController();
        $memberController->deleteMember($pseudo);
        $memberController->disconnectMember();
        $this->showHomeRoute();
    }

    private function excludeMemberRoute(){
        if($_SESSION['admin'] == true){
            $memberController = new \p4\blog\controller\memberController();
            $pseudo = htmlspecialchars($_GET['pseudo']);
            $memberController->deleteMember($pseudo);
            $dashboardController = new \p4\blog\controller\DashboardController();
            $dashboardController->showDashboard();
        }
    }

    private function showHomeRoute(){
        $frontController = new \p4\blog\controller\FrontController();
        $frontController->showHome();
    }
}