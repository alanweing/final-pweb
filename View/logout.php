<?php

setcookie("username", "", time() - 3600);
setcookie("password", "", time() - 3600);
setcookie("phone", "", time() - 3600);
setcookie("user_type", "", time() - 3600);

// header('Refresh:0; url=index.php');
header('Location: ' . $_SERVER['PHP_SELF']);
