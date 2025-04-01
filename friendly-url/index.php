<?php
// bout de code de parser d'url 

$activeApiVersion = "v1";

$path = trim($_SERVER['REQUEST_URI']);
// on supprime le leading slash  
if($path[0] === '/'){
    $path = substr($path, 1);
}
// on supprime le trailing slash s'il existe 
if(strlen($path) > 0 && $path[strlen($path)-1] === '/'){
    $path = substr($path,0 , strlen($path));
}

// on sépare les segment d'url dans le tableau 
$urlTable = explode("/", $path);
$l = count($urlTable);

// var_dump($urlTable);
if($path === 'api/v1/article/all'){
    include $activeApiVersion . '/read.php';
    exit;
}
if($path === 'api/v1/article/new'){
    include $activeApiVersion . '/create.php';
    exit;

}
if($path === 'api/v1/article/delete'){
    include $activeApiVersion . '/delete.php';
    exit;
}
if($path === 'api/v1/article/update'){
    include $activeApiVersion . '/update.php';
    exit;
}
include $activeApiVersion . '/not-found.php';