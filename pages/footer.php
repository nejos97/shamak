        <?php
        if(isset($_GET['newsletter'])){
            switch ($_GET['newsletter']) {
                case 'success':
                    $newsletter = "Your registration has been successful ..";
                    break;
                case 'already':
                    $newsletter = "You have already registered for the Newsletter ..";
                    break;
                case 'enter':
                    $newsletter = "You must enter an e-mail address ..";
                    break;
                case 'fill':
                    $newsletter = "You must fill all empty fields ..";
                break;
            }
        }
        ?>
        <div class="newsletter center" id="newsletter">
            <div class="container">
                <div class="input-field col s6 nleft">
                    <p>Subscribe to our newsletter</p>
                </div>
                <div class="input-field col s6 nright">
                    <form action="script/newsletter.php" method="post">
                        <div class="input-field col s12">
                            <input class="input-news" name="emailNewsLetter" placeholder="Your email adress..." required="" type="email">
                        </div>
                        <div class="input-field col s12">
                            <button class="btn-news" name="newsletterform" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="page-footer black">
            <div class="row">
                <div class="col l3 s12">
                    <h5 class="white-text">ABOUT</h5>
                    <p class="grey-text text-darken-1 thin">
                        This is and official site of shamak allharamadji
                    </p>
                    <div class="test">
                        <a href=""><li class="fa fa-facebook"></li></a> 
                        <a href=""><li class="fa fa-twitter"></li></a> 
                        <a href=""><li class="fa fa-linkedin"></li></a> 
                        <a href=""><li class="fa fa-instagram"></li></a>
                    </div>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">HELP</h5>
                    <ul>
                        <li><a class="grey-text text-darken-1" href="about.php">ABOUT US</a></li>
                        <li><a class="grey-text text-darken-1" href="contact.php">CONTACT US</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">LINKS</h5>
                    <ul>
                        <li><a class="grey-text text-darken-1" href="videos.php">VIDEOS</a></li>
                        <li><a class="grey-text text-darken-1" href="adversiting.php">ADVERSITING</a></li>
                        <li><a class="grey-text text-darken-1" href="films.php">FILMS</a></li>
                        <li><a class="grey-text text-darken-1" href="ourteam.php">OUR TEAM</a></li>
                    </ul>
                </div>
                
                <div class="col l3 s12">
                    <h5 class="white-text">CONTACT</h5>
                    <p class="grey-text text-darken-1">Adress,<br>Yaounde Cameroun</p>
                    <ul>
                        <li><a class="grey-text text-darken-1" href="tel://+237690327402">+237 690 327 402</a></li>
                        <li><a class="grey-text text-darken-1" href="mailto:email@email.com">email@email.com</a></li>
                        <li><a class="grey-text text-darken-1" href="monsitte.com">monsite.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container white-text center">
                Copyright ©2018 All rights reserved - Made with <i class="fa fa-heart pink-text"></i> by <a class="blue-text text-lighten-1" href="mailto:alladintroumba@gmail.com">#l@d!n$t@r#</a>
                </div>
            </div>
        </footer>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/init.js"></script>
        <script>
        $(document).ready(function(){
            $('.slider').slider();
                
            var options = [
            {selector: '#newsletter', offset: 0, callback: function(el) {
                Materialize.toast('<?php if(isset($newsletter)){ echo $newsletter; } ?>', 4000 );
            } }
            ];
            Materialize.scrollFire(options);
            $('.parallax').parallax();
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('.carousel').carousel({indicators:true,padding:500,dist:-200,shift:100});
        });
        </script>
        <script src="js/js.js"></script>
        <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;">
            <i class="fa fa-angle-up"></i>
        </a>