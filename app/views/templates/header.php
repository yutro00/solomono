<?php

/* 
 * Solomono test1
 * site header
 */

function get_header() 
{
    $res = '';
    $style = get_style_path($domain_root);
    $script = '#';
    $script_link = "<script src=\"$script\"></script>";
            
    $res .= '<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8 X-Content-Type-Options=nosniff">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Solomono test</title>
        <meta name="Description" Content="Сайт тестового задания претендента">
        <meta name="robots" content="noindex, nofollow" >
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" href="/app/views/templates/css/style.css">
        ' . "\n<script src=\"$script_link\"></script>"  
        . '</head>';


//  $nm = __NAMESPACE__;
//  if ($nm === '') {
//    echo 'empty NAMESPACE from header.php' . '<br>';
//  } else {
//    echo $nm;
//  }
  
    return $res;
}


function get_style_path($root)
{
    $res = $root . '/app/views/templates/css/style.css';
echo '<br>' . $res;
    return $res;
}