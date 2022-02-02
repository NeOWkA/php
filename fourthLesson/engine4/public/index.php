<?php

require "../config/config.php";

$page = 'index';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = [];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalog_ssr':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog()['catalog'];
        break;

    case 'catalog_spa':
        $params['title'] = 'Каталог spa';
        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();

    case 'bux':
        //if ($_FILES) upload();
        $params['title'] = 'Бухи';
        $params['message'] = 'ok';
        $params['files'] = getFiles();
        _log($params, 'bux');
        break;

    default:
        die("404");
}



echo render($page, $params);

