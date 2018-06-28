<?php include_once("script/init.php");  ?>
<?php
require("../script/connexiondb.php");
require("../class/AdminManager.class.php");

if(!isset($_SESSION["admin"])){
    header('location:login.php');
}

$admin = unserialize( $_SESSION["admin"]) ;

?>

<?php include_once("include/_header.php") ?>
<div class="ui grid container aligned">
    <div class="four wide column">
        <?php  include_once("include/_sidebar.php"); ?>
    </div>

    <div class="ten wide column">
        {% block second_content %}{% endblock %}
    </div>

</div>
<?php include_once("include/_end.php") ?>
