<?php

include "scripts/HTMLRenderer.php";
$renderer = new HTMLRenderer();
$content = $renderer->render($_GET['p']);
$host = $renderer->getHostName();
echo $content;
