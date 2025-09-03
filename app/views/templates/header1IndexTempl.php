<?php

/*
 * Project Solomono test
 * Шаблон 1-го уровня шапки индексного файла
 */


$noLink = 'javascript:void(0)';

$res = '<div class="header1">'
        . "\n"
        . '<span><a id="login" class="login">Log in</a></span>'
        . '<select id="lang_select" class="lang-select">'
        . "\n" . '<option value="en" selected>English</option>'
        . "\n" . '<option value="ua">Український</option>'
        . "\n" . '<option value="es">Español</option>'
        . "\n" . '/<select>'
        . "\n"
        . '<select id="currency_select"" class="currency-select">'
        . "\n" . '<option value="en" selected>US</option>'
        . "\n" . '<option value="ua">UAH</option>'
        . "\n" . '<option value="eur">EUR</option>'
        . "\n" . '/<select>'
        . "\n"
//  <li id="readme" title="some comments to project">README!</li>

    . '<ul id="nav-header" class="nav-header">
        <li id="readme" title="some comments to project">README!</li>
        <li><a href="/">Home</a></li>'
        . "<li><a href=\"index.php/about\">About</a></li>"
        . "<li><a href=\"index.php/brands\">Brands</a></li>"
        . "<li><a href=\"$noLink\">Payment and Shipping</a></li>"
        . "<li><a href=\"$noLink\">Warranty</a></li>"
        . "<li><a href=\"index.php/contacts\">Contacts</a></li>"
        . "\n"
        . '</ul>'
//        . '<span><a id="login" class="login">Log in</a></span>'
        . "\n</div>";

return $res;