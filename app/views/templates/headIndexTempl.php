<?php

/*
 * Project Solomono test
 * Шаблон заголовка документа индексного файла
 */


function getHeadIndexTemplate($script_links)
{
$res = '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8 X-Content-Type-Options=nosniff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solomono test</title>
    <meta name="Description" Content="Сайт тестового задания претендента на вакансию PHP developer">
    <meta name="robots" content="noindex, nofollow" >
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/app/views/css/style.css">'
    . $script_links .
    "</head>";
return $res;
}
