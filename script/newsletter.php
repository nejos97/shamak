<?php
require_once "../script/connexiondb.php";
require_once "../class/NewsLetterManager.class.php";
require_once "../phpMailerTest.php";
$NewsLetterManager = New NewsLetterManager($db);
if(isset($_POST['newsletterform'])){
    if(isset($_POST['emailNewsLetter'])){
        if(!empty($_POST['emailNewsLetter'])){
            $emailNewsLetter = htmlspecialchars($_POST['emailNewsLetter']);
            if(filter_var($emailNewsLetter, FILTER_VALIDATE_EMAIL)) {
                $NewsLetter = New NewsLetter(array('emailNewsLetter'=>$emailNewsLetter));
                $new = $NewsLetterManager->get($_POST['emailNewsLetter']);
                if(empty($new->emailNewsLetter())) {
                    $NewsLetterManager->add($NewsLetter);
                    $lien = $referer = getenv('HTTP_REFERER')."?newsletter=success#newsletter";
                    $messsage = '
                    	<div style="background-color: #f4f4f4;font-family: Arial,Helvetica,sans-serif;max-width: 500px;color:black" align="center">
                    		<center>
                    			<div align="center" style="padding:20px 5px">
                    				<a href="http://www.allharamadji.com" style="text-decoration: underline;"><img src="http://via.placeholder.com/1920x1080" width="200" alt=""></a>
                    				<h2>Thank you for signing up to our Newsletter</h2>
                    				<div>
                    					<p>As a subscriber, you will be among the first to know our latest music, movies and adversitings.</p>
                    					<p>We are looking forward to seeing you again in our site</p>
                    				</div>
                    			</div>
                    			<footer style="padding:40px 0px;text-align: center;background-image: linear-gradient(to left,rgb(19, 17, 17), rgb(90, 84, 84))">
                    				<a style="text-decoration: underline;color:rgb(241, 241, 241);padding: 0px 5px;" href="http://allharamadji/videos.php">Vidéos </a>
                    				<a style="text-decoration: underline;color:rgb(241, 241, 241);padding: 0px 5px;" href="http://allharamadji/films.php">Films </a>
                    				<a style="text-decoration: underline;color:rgb(241, 241, 241);padding: 0px 5px;" href="http://allharamadji/adversiting.com">Adversiting </a>
                    				</ul>
                    			</footer>
                    			<p style="font-size: 12px;text-align: center;">
                    				If you would no like to receive fewer emails from shamak allharamadji, you can <a href="http://allharamdji/unsuscribe.php?email='.$emailNewsLetter.'&e='.sha1($emailNewsLetter).' style="color:black;text-decoration: underline;">unsubscribe</a> to stop receiving special offers. 
                    			</p>
                    		</center>
                    	</div>';
                    $result = smtpmailer( $emailNewsLetter,'allharamadji@gmail.com', 'Shamak Alharamadji', 'Welcome to our NewsLetter !!! :-D', $messsage);

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