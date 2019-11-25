<?php

require '../App/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])){
    $p = $_GET['p'];
} else {
    $p = 'home';
}


ob_start();

if ($p === 'home') {
    require '../pages/home.php';
} elseif($p === 'user'){
    require '../pages/user.php';
} elseif($p === 'categorie'){
    require '../pages/categorie.php';
}else {
    echo "désolé la page demander n'existe pas";
}

$content = ob_get_clean();

require '../pages/templates/default.php';