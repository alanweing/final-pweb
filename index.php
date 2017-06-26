<?php
require_once dirname(__FILE__) . '/Controller/UserController.php';
$user_menu = UserController::get_user_menu();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Programação WEB</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="public/css/material.min.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link rel="stylesheet" href="public/css/master.css">
</head>

<body>
  <dialog class="mdl-dialog">
    <h4 id="dialog-title" class="mdl-dialog__title"></h4>
    <div id="dialog-content" class="mdl-dialog__content"></div>
    <div class="mdl-dialog__actions">
      <button id="dialog-positive-button" type="button" class="mdl-button close" data-button-action="">Ok</button>
      <button id="dialog-negative-button" data-button-action="" type="button" class="mdl-button close"></button>
    </div>
  </dialog>
  <div class="container">
    <div class="m-header mdl-layout mdl-js-layout">
      <header class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row">
          <div class="mdl-layout-spacer"></div>
          <nav class="mdl-navigation">
            <?php
            foreach ($user_menu as $menu_item => $url)
            {
              echo "<a class='m-menu-item mdl-navigation__link' href='#' data-menu-url='$url'>$menu_item</a>";
            }
            ?>
          </nav>
        </div>
        <div class="m-header-title">
          <img src="public/assets/engine.png" alt="Icone do site">
          <h1>Minha Peça Nova</h1>
        </div>
      </header>
    </div>
    <main class="mdl-layout__content .m-main">
      <div id="main-content" class="m-content-container">

    </main>



  </div>
  <!--CONTAINER-->
  <script src="public/js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="public/js/material.min.js" charset="utf-8"></script>
  <script src="public/js/jquery.mask.min.js" charset="utf-8"></script>
  <script src="public/js/master.js" charset="utf-8"></script>
</body>

</html>
