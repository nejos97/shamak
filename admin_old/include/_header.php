<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title> <?= isset($title)? $title : "Home"  ?> | SHAMAK ALLHARAMADJI </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" media="screen" href="assets/library/semantic/semantic.min.css" />

        <script type="text/javascript" src="assets/library/sweetalert/sweetalert.min.js"></script>

    </head>

    <body>



        <?php include("_nav.php"); ?>


        <?php if(isset($message)): ?>
          <div class="ui two column centered grid">
            <div class="column">
              <div class="ui message">
                <div class="header">
                  Message important
                </div>
                <p><?= $message ?></p>
              </div>
              </center>
            </div>
          </div>
        <?php endif ; ?>
