<div class="ui mini stackable menu" style="border-radius:0px; border-bottom: solid 2px teal;">

    <div class="item">
        <a href="./">
            <h4>SHAMAK ALLHARAMADJI</h4>
        </a>
    </div>

    <div class="item right">
        <?php if(isset($_SESSION["admin"])): ?>
        <div class="ui  labeled icon top right pointing dropdown button">
          <i class="user circle outline icon"></i>
          <span> Administrateur</span>
          <div class="menu">
            <div class="header">
              <i class="checkmark icon"></i>
              Signed in as Nom et prenom
            </div>
            <div class="item">
              <a href="/favorite">
                <i class="star icon"></i>
                Booksmark
              </a>
            </div>
            <div class="item">
              <a href="">
                <i class="user icon"></i>
                Profile
              </a>
            </div>
            <div class="item">
              <a href="">
                <i class="setting icon"></i>
                Parametre
              </a>
            </div>

            <div class="item">
              <a href=" {% url 'dashboard' %} ">
                <i class="handshake icon"></i>
                Tableau de bord
              </a>
            </div>

            <div class="divider"></div>
            <div class="item">
              <a href="logout.php">
                <i class="sign out icon"></i>
                Deconnexion
              </a>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="ui labeled icon top right button">
          <a href="/">
            <i class="user circle outline icon"></i>
            Go website
          </a>
        </div>
      <?php endif; ?>
      </div>

</div>
