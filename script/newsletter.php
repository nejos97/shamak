<?php
require_once "../script/connexiondb.php";
require_once "../class/NewsLetterManager.class.php";
$NewsLetterManager = New NewsLetterManager($db);
if(isset($_POST['newsletterform'])){
    if(isset($_POST['emailNewsLetter'])){
        if(!empty($_POST['emailNewsLetter'])){
            $emailNewsLetter = htmlspecialchars($_POST['emailNewsLetter']);
            if(filter_var($emailNewsLetter, FILTER_VALIDATE_EMAIL)) {
                $NewsLetter = New NewsLetter(array('emailNewsLetter'=>$emailNewsLetter));
                $new = $NewsLetterManager->get($_POST['emailNewsLetter']);
                var_dump($new);
                if(empty($new->emailNewsLetter())) {
                    $NewsLetterManager->add($NewsLetter);
                    $lien = $referer = getenv('HTTP_REFERER')."?newsletter=success#newsletter";
                    header("location:$lien");
                } else {
                    $lien = $referer = getenv('HTTP_REFERER')."?newsletter=already#newsletter"; 
                    header("location:$lien");
                    }
                } else {
                    $lien = $referer = getenv('HTTP_REFERER')."?newsletter=enter#newsletter"; 
                    header("location:$lien");
                }
            } else {
                $lien = $referer = getenv('HTTP_REFERER')."?newsletter=fill#newsletter"; 
                header("location:$lien");
        }
    }
}
?>