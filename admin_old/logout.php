<?php
include_once("script/init.php");
unset($_SESSION['admin']);
session_destroy();
header("location:login.php");
