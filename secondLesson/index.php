<?php

$content = renderTemplate("content");
$menu = renderTemplate("menu");
echo renderTemplate("main", $content, $menu);

function renderTemplate($page, $content = "", $menu = "")
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

