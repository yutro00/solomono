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
        . "<li><a href=\"$noLink\">Brands</a></li>"
        . "<li><a href=\"$noLink\">Payment and Shipping</a></li>"
        . "<li><a href=\"$noLink\">Warranty</a></li>"
        . "<li><a href=\"contact_us.php\">Contacts</a></li>"
//        . "\n"
//        . '<span class="phone">Phone:   +38 097 829-79-89'
//        . '</span>'
        . "\n"
        . '</ul>'
//        . '<span><a id="login" class="login">Log in</a></span>'
        . "\n</div>";

return $res;